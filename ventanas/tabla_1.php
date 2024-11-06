
<div class="titulos" >
    <h1>Iventario de Herramientas </h1>
</div>

<div class="tablas">
<table>
    <thead>
        <tr>
        <th>herramienta</th>
        <th>medida</th>
        <th>precio compra</th>
        <th>estado herramienta</th>
        <th>mecanico</th>
        <th>taller</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include_once './includes/bd_con/cone.php';
            $query= "Select * from VistaHerramientasMecanico;"; // select (VISTA)
            $consulta = mysqli_query($conexion, $query); // REALIZA LA CONSULTA
            while ($reg = mysqli_fetch_array($consulta, MYSQLI_NUM)) {
                //id nombre_herramienta medida precio_compra estado_herramienta nombre_completo_mecanico nombre_taller 	
                echo '
                    <tr style="cursor: pointer;" class="'.$reg[4].'"> 
                    <td scope="row">'.$reg[1].'</td>
                    <td scope="row">'.$reg[2].'</td>
                    <td scope="row">'.$reg[3].'</td>
                    <td scope="row">'.$reg[4].'</td>
                    <td scope="row">'.$reg[5].'</td>
                    <td scope="row">'.$reg[6].'</td>
                </tr> ';
            }
        ?>
    </tbody>
</table>
</div>

