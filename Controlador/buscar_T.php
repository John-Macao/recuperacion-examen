<?php
    include "../conexion/conexionBD.php";
    $cedula = $_GET['cedula'];
    $placa = $_GET['placa']; 
    $senial = false;
    
    
    if($cedula!=''){
        $sql = "SELECT * FROM usuario WHERE usu_cedula='$cedula'";
        $result = $conn->query($sql);
        $senial = false;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $usu_id =  $row["usu_id"];
                $usu_cedula = $row["usu_cedula"];
                $usu_nombre = $row["usu_nombre"];
                $usu_direccion = $row['usu_direccion'];
                $usu_telefono = $row['usu_telefono'];
            }
            $senial = true;
        } else {
           echo "<p>usuario no existente</p>";
           $senial = false;
        }


        if($senial==true){

            echo " <table style='width:100%'>
            <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            </tr>

            <tr>
            <td> $usu_cedula  </td>
            <td> $usu_nombre  </td>
            <td> $usu_direccion </td>
            <td> $usu_telefono </td>
            </tr>

            <tr>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            </tr>";

            $sqlV = "SELECT * FROM vehiculo WHERE veh_usuario = $usu_id";
            $result = $conn->query($sqlV);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $veh_id = $row['veh_id'];
                    echo "<tr>";
                    echo "<td>" . $row['veh_placa'] ."</td>";
                    echo "<td>" . $row['veh_marca'] ."</td>";
                    echo "<td>".$row['veh_modelo']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo " <td colspan='7'> No existen vehiculos para este usuario </td>";
                echo "</tr>";
            }


            echo " 
            <tr>
            <th>Numero del Ticket</th>
            <th>Fecha Ingreso</th>
            <th>Hora Ingreso</th>
            <th>Fecha Salida</th>
            <th>Hora Salida</th>
            </tr>";

            $sqlT = "SELECT * FROM ticket WHERE tic_vehiculo = $veh_id";
            $result = $conn->query($sqlT);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['tic_numero'] ."</td>";
                    echo "<td>" . $row['tic_ingreso_fecha'] ."</td>";
                    echo "<td>" . $row['tic_ingreso_hora'] ."</td>";
                    echo "<td>" . $row['tic_salida_fecha'] ."</td>";
                    echo "<td>" . $row['tic_salida_hora'] ."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo " <td colspan='7'>No hay tickets relacionados </td>";
                echo "</tr>";
            }

            echo "</table>";
        }







    }elseif($placa!=''){
        $sql = "SELECT * FROM vehiculo WHERE veh_placa ='$placa'";
        $result = $conn->query($sql);
        $senial = false;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $veh_id =  $row["veh_id"];
                $veh_placa = $row["veh_placa"];
                $veh_marca = $row['veh_marca'];
                $veh_modelo = $row['veh_modelo'];
                $veh_usuario = $row['veh_usuario'];
            }
            $senial = true;
        } else {
           echo "<p>Placa no existente</p>";
           $senial = false;
        }

        if($senial==true){
            $sql = "SELECT * FROM usuario WHERE usu_id='$veh_usuario'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $usu_id =  $row["usu_id"];
                    $usu_cedula = $row["usu_cedula"];
                    $usu_nombre = $row["usu_nombre"];
                    $usu_direccion = $row['usu_direccion'];
                    $usu_telefono = $row['usu_telefono'];
                }
                $senial = true;
            } else {
               echo "<p>usuario no exitente</p>";
               $senial = false;
            }

            echo " <table style='width:100%'>
            <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            </tr>

            <tr>
            <td> $usu_cedula  </td>
            <td> $usu_nombre  </td>
            <td> $usu_direccion </td>
            <td> $usu_telefono </td>
            </tr>

            <tr>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            </tr>";

            $sqlV = "SELECT * FROM vehiculo WHERE veh_usuario = $usu_id";
            $result = $conn->query($sqlV);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $veh_id = $row['veh_id'];
                    echo "<tr>";
                    echo "<td>" . $row['veh_placa'] ."</td>";
                    echo "<td>" . $row['veh_marca'] ."</td>";
                    echo "<td>".$row['veh_modelo']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo " <td colspan='7'> No existen vehiculos para este usuario </td>";
                echo "</tr>";
            }


            echo " 
            <tr>
            <th>Numero del Ticket</th>
            <th>Fecha Ingreso</th>
            <th>Hora Ingreso</th>
            <th>Fecha Salida</th>
            <th>Hora Salida</th>
            </tr>";

            $sqlT = "SELECT * FROM ticket WHERE tic_vehiculo = $veh_id";
            $result = $conn->query($sqlT);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['tic_numero'] ."</td>";
                    echo "<td>" . $row['tic_ingreso_fecha'] ."</td>";
                    echo "<td>" . $row['tic_ingreso_hora'] ."</td>";
                    echo "<td>" . $row['tic_salida_fecha'] ."</td>";
                    echo "<td>" . $row['tic_salida_hora'] ."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo " <td colspan='7'>No hay tickets relacionados </td>";
                echo "</tr>";
            }

            echo "</table>";
        }

    }

    $conn->close();
?>