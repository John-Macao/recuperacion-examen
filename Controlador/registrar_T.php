<?php 
    include "../conexion/conexionBD.php";

    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]): null;
    
    $placa = isset($_POST["placa"]) ? mb_strtoupper(trim($_POST["placa"]), 'UTF-8') : null;
    $marca = isset($_POST["marca"]) ? mb_strtoupper(trim($_POST["marca"]), 'UTF-8') : null;
    $modelo = isset($_POST["modelo"]) ? mb_strtoupper(trim($_POST["modelo"]), 'UTF-8') : null;

    $numeroT = isset($_POST["numeroT"]) ? trim($_POST["numeroT"]): null;
    $fechaI = isset($_POST["fechaI"]) ? trim($_POST["fechaI"]): null;
    $horaI = isset($_POST["horaI"]) ? trim($_POST["horaI"]): null;
    $fechaS = isset($_POST["fechaS"]) ? trim($_POST["fechaS"]): null;
    $horaS = isset($_POST["horaS"]) ? trim($_POST["horaS"]): null;


    

    
    $sqlCli = "SELECT * FROM usuario WHERE usu_cedula = '$cedula';";
    $resultCl = $conn->query($sqlCli);

    if ($resultCl) {
        
        if ($resultCl->num_rows > 0) {
            $rowCl = $resultCl->fetch_assoc();

            $sqlVeh = "INSERT INTO vehiculo (veh_id, veh_placa, veh_marca, veh_modelo, veh_usuario)
            VALUES
            (NULL, '$placa', '$marca', '$modelo', '". $rowCl['usu_id'] ."');";

            if ($conn->query($sqlVeh) === TRUE) {

                $sqlVehi = "SELECT * FROM vehiculo WHERE veh_placa = '$placa';";
                $resultVeh = $conn->query($sqlVehi);
                
                if ($resultVeh) {
                    
                    if ($resultVeh->num_rows > 0) {
                        $rowVeh = $resultVeh->fetch_assoc();

                        $sqlTic= "INSERT INTO ticket (tic_id, tic_numero, tic_ingreso_fecha, tic_ingreso_hora, tic_salida_fecha, tic_salida_hora, tic_vehiculo)
                        VALUES
                        (NULL, '$numeroT', '$fechaI', '$horaI', '$fechaS', '$horaS', '". $rowVeh['veh_id'] ."');";

                        if ($conn->query($sqlTic) === TRUE) {
                            echo "<p class='e_notice e_notice_sucess'>Se ha registrado el ticket correctamente.</p>";
                            $conn->commit();
                            header ("Location: ../Html/index.html");
                        } else {
                            echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
                            $conn->rollback();
                        }
                        
                    } else {
                        echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
                        $conn->rollback();
                    }

                } else {
                    echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
                    $conn->rollback();
                }
                
            } else {
                echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
                $conn->rollback();
            }
            
        } else {
            echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
            $conn->rollback();
        }
        
    } else {
        echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
        $conn->rollback();
    }

    $conn->close();
?>