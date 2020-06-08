<?php
    include "../conexion/conexionBD.php";
    $cedula = $_GET['cedula'];
    
    if($cedula!=''){
        $sql = "SELECT usu_id, usu_cedula, usu_nombre, usu_direccion, usu_telefono FROM usuario WHERE usu_cedula='$cedula'";
        $result = $conn->query($sql);

        echo " <table style='width:100%'>
        <tr>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        </tr>";


        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['usu_cedula'] .       "</td>";
                echo "<td>" . $row['usu_nombre'] .   "</td>";
                echo "<td>" . $row['usu_direccion']. "</td>";
                echo "<td>" . $row['usu_telefono']. "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existe un usuario con esa cedula </td>";
            echo "</tr>";
        }
        echo "</table>";
    }

        
    $conn->close();
?>