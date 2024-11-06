<?php
    include_once '../../includes/bd_con/cone.php';
    mysqli_set_charset($conexion, 'utf8');

$hoyHora = date("Y-m-d H:i:s");
$hoy = date("Y-m-d");
$condi = $_POST['condi'];

$ctrlMenu = array(
    "Usuarios",    "Control herramienta asignadas a mecánico",
    "Control herramienta obsoleta", "Control herramienta reciclada",
    "Control de mecánicos" 
);

$Query = array(
    'SELECT * FROM `vw_meca`',
    'SELECT * FROM ctrl_herr_mec',
    'SELECT * FROM vw_tool',
    'SELECT * FROM vw_RecTool'
);

    /* MENU PARA FUTURO */
switch ($condi) {
    
/* tABLA DE Control herramienta asignadas a mecánico */
case "tb_tmpl":
    $xtr = $_POST['extra'];
    echo '
    <div class="titulos" >
        <h1> '.$ctrlMenu[$xtr].' </h1>
    </div>
    
    <div class="tablas">
        <table>
            <thead>
            <tr>
            <th>Nombre</th>
            <th>Herramienta</th>
            <th>Medidda</th>
            <th>Fecha Asignación</th>
            <th>Estado </th>
            <th>Opciones</th>
            </tr>
        </thead>
    <tbody>';
        
        $query= "Select * from ctrl_herr_mec WHERE `Estado de la Herramienta` = 'Activa';"; // select (VISTA)
        $consulta = mysqli_query($conexion, $query); // REALIZA LA CONSULTA
    while ($reg = mysqli_fetch_array($consulta, MYSQLI_NUM)) {
        /* NOMBRE Herramienta 	Medida 	Fecha de Asignación 	Estado de la Herramienta 	 */
        echo '
            <tr style="cursor: pointer;"> 
            <td scope="row">'.$reg[2].'</td>
            <td scope="row">'.$reg[3].'</td>
            <td scope="row">'.$reg[4].'</td>
            <td scope="row">'.$reg[5].'</td>
            <td scope="row">'.$reg[6].'</td>
            <td scope="row">
                <button type="button" onclick="reciclarHerramienta(`BodegaTool`, '.$reg[7].')">DAR DE BAJA</button> 
            </td>
            </tr> ';
    }
    echo 
        '</tbody>
        </table>
    </div> ';
    
break;

/* tABLA DE Usuarios */
case "tb_usu":
    $xtr = $_POST['extra'];
    echo '
    <div class="titulos" >
        <h1> '.$ctrlMenu[$xtr].' </h1>
    </div>
    
    <div class="tablas">
        <table>
        <thead>
            <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th> Nombre del Taller </th>
            <th> Ubicación del Taller</th>
            <th>Opciones</th>
            </tr>
        </thead>
    <tbody>';
        $query= "Select * from vw_meca"; // select (VISTA)
        $consulta = mysqli_query($conexion, $query); // REALIZA LA CONSULTA
    while ($reg = mysqli_fetch_array($consulta, MYSQLI_NUM)) {
        /* NOMBRE Herramienta 	Medida 	Fecha de Asignación 	Estado de la Herramienta 	 */
        echo '
            <tr style="cursor: pointer;"> 
            <td scope="row">'.$reg[0].'</td>
            <td scope="row">'.$reg[1].'</td>
            <td scope="row">'.$reg[2].'</td>
            <td scope="row">'.$reg[3].'</td>
            <td scope="row"> <button type="button" class="btn btn-success"  
            cerrar_modal(`#modal_acteconomica`, `hide`, `#id_modal_hidden`);" >Aceptar</button> </td>
            </tr> ';
    }
    echo '</tbody>
        </table>
    </div> ';
    
break;

/* tABLA DE vw_meca */
case "vw_tool":
    $xtr = $_POST['extra'];
    echo '
    <div class="titulos" >
        <h1> '.$ctrlMenu[$xtr].' </h1>
    </div>
	
    <div class="tablas">
        <table>
        <thead>
            <tr>
            <th>Nombre Herramienta</th>
            <th>Medida</th>
            <th> Precio Compra </th>
            <th> Fecha Registro</th>
            <th>Estado</th>
            <th>Opciones</th>
            </tr>
        </thead>
    <tbody>';
        $query= "Select * from vw_tool";// select (VISTA)
        $consulta = mysqli_query($conexion, $query); // REALIZA LA CONSULTA
    while ($reg = mysqli_fetch_array($consulta, MYSQLI_NUM)) {
        /* NOMBRE Herramienta 	Medida 	Fecha de Asignación 	Estado de la Herramienta 	 */
        echo '
            <tr style="cursor: pointer;"  class='.$reg[4].'> 
            <td scope="row">'.$reg[0].'</td>
            <td scope="row">'.$reg[1].'</td>
            <td scope="row">'.$reg[2].'</td>
            <td scope="row">'.$reg[3].'</td>
            <td scope="row">'.$reg[4].'</td>
            <td scope="row"> 
            ';
            if ($reg[4] == 'Reciclada') {
                echo "<p>Herramienta en reciclaje.</p>";
            } else {
                echo "<button onclick=\"reciclarHerramienta( 'reciclarHerramienta', ".$reg[5].")\">Reciclar</button>";
            }            
            echo '</button> </td>
            </tr> ';
    }
    echo '</tbody>
        </table>
    </div> ';
    
break;

/* tABLA DE vw_RecTool  */
case "vw_RecTool":
    $xtr = $_POST['extra'];
    echo '
    <div class="titulos" >
        <h1> '.$ctrlMenu[$xtr].' </h1>
    </div>
	
    <div class="tablas">
        <table>
        <thead>
            <tr>
            <th>Nombre Herramienta</th>
            <th>Medida</th>
            <th> Precio Compra </th>
            <th> Fecha Registro</th>
            <th>Estado</th>
            <th>Opciones</th>
            </tr>
        </thead>
    <tbody>';
        $query= "Select * from vw_RecTool"; // select (VISTA)
        $consulta = mysqli_query($conexion, $query); // REALIZA LA CONSULTA
    while ($reg = mysqli_fetch_array($consulta, MYSQLI_NUM)) {
        /* NOMBRE Herramienta 	Medida 	Fecha de Asignación 	Estado de la Herramienta 	 */
        echo '
            <tr style="cursor: pointer;"> 
            <td scope="row">'.$reg[0].'</td>
            <td scope="row">'.$reg[1].'</td>
            <td scope="row">'.$reg[2].'</td>
            <td scope="row">'.$reg[3].'</td>
            <td scope="row">'.$reg[4].'</td>
            <td scope="row"> <button type="button" class="btn btn-success"  
            cerrar_modal(`#modal_acteconomica`, `hide`, `#id_modal_hidden`);" >Bodega?</button> </td>
            </tr> ';
    }
    echo '</tbody>
        </table>
    </div> ';
    
break;


} // FIN DEL CASE 

function BuscaQuery()
{
    include_once '../../includes/bd_con/cone.php';
    mysqli_set_charset($conexion, 'utf8');
    $query= "Select * from ctrl_herr_mec"; // select (VISTA)
    $consulta = mysqli_query($conexion, $query); // REALIZA LA CONSULTA

    /*while ($field = mysqli_fetch_fields($consulta, MYSQLI_ASSOC)){
        echo'
        <th>'.$field[0].'</th>
        <th>'.$field[1].'</th>
        <th>'.$field[2].'</th>
        <th>'.$field[3].'</th>
        <th>'.$field[4].'</th>';
    }*/

    while ($reg = mysqli_fetch_array($consulta, MYSQLI_NUM)) {
        /* NOMBRE Herramienta 	Medida 	Fecha de Asignación 	Estado de la Herramienta 	 */
        echo '
            <tr style="cursor: pointer;"> 
            <td scope="row">'.$reg[2].'</td>
            <td scope="row">'.$reg[3].'</td>
            <td scope="row">'.$reg[4].'</td>
            <td scope="row">'.$reg[5].'</td>
            <td scope="row">'.$reg[6].'</td>
            <td scope="row"> <button type="button" class="btn btn-success"  
            cerrar_modal(`#modal_acteconomica`, `hide`, `#id_modal_hidden`);" >Aceptar</button> </td>
            </tr> ';
    }
}

?>