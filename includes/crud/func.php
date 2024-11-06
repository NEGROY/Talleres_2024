<?php
    include_once '../../includes/bd_con/cone.php';
    mysqli_set_charset($conexion, 'utf8');

$hoyHora = date("Y-m-d H:i:s");
$hoy = date("Y-m-d");

$condi = $_POST['condi'];

switch ($condi) {

    case "reciclarHerramienta":
        $extra = $_POST['extra'];
        $query1= "UPDATE Inventario_Obsoleto
        SET estado = 'Reciclada'
        WHERE id_herramienta = '".$extra."' ";
        
        $query2= "INSERT INTO Historial_Reciclaje (id_herramienta, fecha_reciclaje, valor_reciclaje)
        VALUES ('".$extra."', '".$hoy."', 0);";

        //$consulta = mysqli_query($conexion, $query1); 

        if (mysqli_query($conexion, $query1)) {
            $mjs= "El estado de la herramienta se cambió a 'Reciclada' y se registró en el historial de reciclaje correctamente.";
            $consulta = mysqli_query($conexion, $query2);
            $results = array(
                "0" => $mjs, //info para datatables
                "1" => 1,
                "2" => "vw_tool",
                "3" => 2 
            );
        } else {
            $mjs= "Error al insertar en el historial de reciclaje: " . mysqli_error($conexion);
            $results = array(
                "0" => $mjs, //info para datatables
                "1" => 0
            );
        }
        echo json_encode($results ); 
    break;

    case "BodegaTool":
        $extra = $_POST['extra'];
        
        //Actualizar el estado de la herramienta a "Obsoleta
        $query1= "UPDATE asignacion_herramienta
        SET estado = 'Obsoleta' 
        WHERE id_herramienta = '".$extra."' ";
        // Insertar Inventario_Obsoleto
        $query2= "INSERT INTO inventario_obsoleto (id_herramienta, fecha_registro, estado)
        VALUES ('".$extra."', '".$hoy."', 'En bodega');";

        if (mysqli_query($conexion, $query1)) {
            $mjs= "Cambio estado de la herramienta a Obsoleta y desasignarla del mecánico";
            $consulta = mysqli_query($conexion, $query2);
            $results = array(
                "0" => $mjs, //info para datatables
                "1" => 1,
                "2" => "tb_tmpl",
                "3" => 1 
            );
        } else {
            $mjs= "Error : " . mysqli_error($conexion);
            $results = array(
                "0" => $mjs, //info para datatables
                "1" => 0
            );
        }
        echo json_encode($results ); 
    break;
}