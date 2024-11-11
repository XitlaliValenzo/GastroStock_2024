<?php 
header('Content-Type: text/html; charset=utf-8'); //Maneje UTF-8 vía PHP
//Biblioteca FPDF
require('fpdf.php');

//Extension de la clase FPDF para crear cabeceras y pies de pagina necesarios
class PDF extends FPDF {
	//Metodo para crear la cabecera de cada pagina
	function Header(){
		//Imagen de cabecera
		$this->Image('img/header.png', 10,10,190); //Inserta la imagen de encabezado en las coordenadas x=10,y=10 con un ancho de 190
		$this->SetY($this->GetY() + 25); //Establece la posicion Y debajo de la imagen de cabecera
		$this->SetFont('Arial', 'B', 12); //Establece el tipo de letra para el titulo
		$this->Cell(0, 6, utf8_decode('Formato de Requisición'), 0, 1, 'C'); //Agrega el titulo centrado
	}

	//Método para crear el pie de pagina de cada pagina
	function Footer() {
		//Establece la posicion del pie de pagina
		$this->SetY(-15); // Posiciona el footer 15 mm desde el final de la pagina
		//Establece la fuente para el pie de pagina
		$this->SetFont('Arial','I', 8);
		//Añade una linea de pie de pagina con el numero de pagina
		$this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'C');
	}

	//Método para crear una tabla en el PDF
	function ImprovedTable($data) {
		//Establece la fuente para el folio de caso
		$this->SetFont('Arial', 'B', 10);
		$this->Ln(0); //Crea una nueva linea
		//Establece la fuente para los datos de la tabla
		$this->SetFont('Arial','', 10);
		//Anchuras de las columnas
		$leftColumnWidth = 45; //Columna de etiquetas 
		$rightColumnWidth = 150; //Columna de datos 
		//Itera sobre cada fila de datos y genera la tabla
		$first = true;
		foreach ($data as $row) {
			if (!$first) {
				$this->AddPage(); //Añade una nueva pagina para la proxima solicitud
			}
			foreach ($row as $key => $value) {
                if ($key === 'Articulos') {
                    //Maneja la celda de artículos con saltos de línea
                    $this->Cell($leftColumnWidth, 10, utf8_decode(ucfirst($key)) . ':', 1); //Celda para la etiqueta
                    $this->MultiCell($rightColumnWidth, 10, utf8_decode($value), 1);
                } else {
                    //Conversión de codificación a cada valor
                    $this->Cell($leftColumnWidth, 10, utf8_decode(ucfirst($key)) . ':', 1); //Celda para la etiqueta
                    $this->Cell($rightColumnWidth, 10, utf8_decode($value), 1); //Celda para el valor
                    $this->Ln(); //Salto de línea para la siguiente fila 
                }
			}
			$first = false;
		}
	}
}

//Funcion para cargar datos desde la base de datos basandose en un ID especifico
function LoadData($id_alumno) {
	include_once("../../conf/config.php"); //Conf. BD.
	$con->set_charset("utf8"); //Asegura que la conexion a la base use UTF-8
	//Consulta SQL
	$query = "
		SELECT solicitud.fecha AS Fecha,
        usuarios.nombre AS 'Alumno solicitante',
        usuarios.grupo AS Grupo,
        solicitud.asignatura AS Asignatura,
        solicitud.profesor AS Profesor,
        solicitud.total AS 'Total de Articulos',
        GROUP_CONCAT(CONCAT(articulos_solicitud.cantidad_articulo, ' - ', articulos.nombre) SEPARATOR ', ') AS Articulos,
        solicitud.fecha_solicitud AS 'Fecha de Requisición',
        solicitud.observaciones AS Observaciones,
        IFNULL(solicitud.faltantes, 0) AS Faltantes
        FROM solicitud
        JOIN usuarios ON solicitud.solicitante = usuarios.id
        JOIN articulos_solicitud ON articulos_solicitud.solicitud = solicitud.id
        JOIN articulos ON articulos_solicitud.articulo = articulos.id_articulo
        WHERE usuarios.id = ?
        GROUP BY solicitud.id
        ORDER BY solicitud.fecha ";

			$stmt = $con->prepare($query); // Prepara la consulta SQL en la bd.
			$stmt->bind_param("i", $id_alumno); //Vincula el ID del alumno como parametro entero a la consulta SQL.
			$stmt->execute(); //Ejecuta la consulta.
			$result = $stmt->get_result(); // Obtiene el resultado de la consulta
			$data = []; //Inicializa un array para almacenar los datos del registro
			while ($row = $result->fetch_assoc()) {
				$data[] = $row; //Almacena cada fila de datos en el array.
			}
			$con->close(); //Cierra la conexion a la bd.
			return $data; // Devuelve el array de datos.
}

//Verifica si el parametro 'id' esta presente en la URL
if (isset($_GET['id'])) {
	$id_alumno = intval($_GET['id']); //Convierte el id obtenido de la URL a un entero para asegurar la seguridad.
	$data = LoadData($id_alumno); //Carga los datos del registro con el ID especificado
	$pdf = new PDF('P', 'mm', 'Letter'); //Crea una nueva instancia de la clase PDF, especificando el formato de pagina
	$pdf->AliasNbPages(); //Alias para el numero total de paginas
	$pdf->SetMargins(10, 10, 10); //Establece los margenes del documento PDF.
	$pdf->SetFont('Arial', '', 12); //Establece la fuente predeterminada del documento.
	$pdf->AddPage(); //Añade una nueva página al documento pdf.
	$pdf->ImprovedTable($data); //Llama a la funcion para generar una tabla en el PDF con los datos cargados.
	$pdf->Output(); //Envia el documento PDF generado al navegador para su descarga o visualizacion.
}
?>