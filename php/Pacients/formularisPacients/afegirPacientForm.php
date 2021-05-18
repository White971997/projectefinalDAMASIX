<?php

echo '
<html>            
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- implementacio de css amb bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- el meu css -->
    <link rel="stylesheet" type="text/css" href="../css/stylepopup.css">
    <!--el meu js
    <script src="../js/popup.js"></script>-->
    <title>Editar Pacients</title>
</head>
<body>
<div>
<br>
';

recollirDades();
    
function recollirDades()
{
    

    
// Variables connexió MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db = "projectefinal";
$error = "";
// Realitzem la connexió amb la base de dades
$connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
        
// Sentencia SQL a executar
$sentenciasql = "SELECT * FROM vacunes; ";

$sql= mysqli_query($connect, $sentenciasql);

$rowCount = mysqli_num_rows($sql);

    echo '
    <div class="container">
    <form action="../afegirPacient.php" method="POST" name="editpacient">
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">ID Pacient</label>
                <input type="text" readonly="readonly" class="form-control" name= "idP" style="width: 30%";>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Nom del Pacient</label>
                <input type="text" class="form-control" name="nomP" style="width: 70%";>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Cognoms del pacient</label>
                <input type="text" class="form-control" name = "cognomsP" >
            </div>
            <div class="col">
                <label for="exampleInputEmail1">DNI/NIE</label>
                <input type="text" class="form-control" name = "dniP" >
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">Data de naixament</label>
                <input type="date" class="form-control" name = "dataNaixamentP"  style="width: 60%;">
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Direcció</label>
                <input type="text" class="form-control" name = "direccioP" >
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Codi Postal</label>
                <input type="text" class="form-control" name = " codiPostalP">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">Vacuna</label>
                <select class="form-select" aria-label="Default select example">
                <option selected>Selecciona una vacuna...</option>';
                
                while($mostrar=mysqli_fetch_array($sql)){
                    echo '<option name = "idVacunaP" value="'.$mostrar['idVacuna'].'">'.$mostrar['NomVacuna'].'</option>';
                }
                echo '  
                </select>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Data 1ª dosis</label>
                <input type="date" class="form-control" name = "dPrimeraDosiP" style="width: 60%;">
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Data 2ª Dosis</label>
                <input type="date" class="form-control" name = "dSegonaDosiP"  style="width: 60%;">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleFormControlTextarea1">Observacions</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name = "obsP"  rows="3"></textarea>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Afegeix</button>
    </form>
    </div>
    
    ';


}
echo '
</div>
</body>
</html>
';

?>