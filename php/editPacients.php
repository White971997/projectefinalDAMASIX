<?php

echo '
            
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
';

editarpacient();
    
function editarpacient()
{
    $idPacient = $_GET['idPacient'];

    
    // Variables connexió MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db = "projectefinal";
$error = "";
// Realitzem la connexió amb la base de dades
$connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
        
// Sentencia SQL a executar
$sentenciasql = "SELECT * FROM pacients INNER JOIN vacunes ON pacients.idVacuna = vacunes.idVacuna WHERE idPacient = '$idPacient'; ";

$sql= mysqli_query($connect, $sentenciasql);

$rowCount = mysqli_num_rows($sql);
while($mostrar=mysqli_fetch_array($sql)){
    echo '
    <div>
    <form>
        <div class="row">
            <div class="col">
            <label for="exampleInputEmail1">Nom del Pacient</label>
            <input type="text" class="form-control" value =" '.$mostrar['NomPacient'].'"style="width: 70%";>
            </div>
            <div class="col">
            <label for="exampleInputEmail1">Cognoms del pacient</label>
            <input type="text" class="form-control" value = "'. $mostrar['CognomsPacient'] .'">
            </div>
            <div class="col">
            <label for="exampleInputEmail1">DNI/NIE</label>
            <input type="text" class="form-control" value = "'.$mostrar['DNI'].'">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
            <label for="exampleInputEmail1">Data de naixament</label>
            <input type="date" class="form-control" value = '.$mostrar['DataNaixament'].' style="width: 60%;">
            </div>
            <div class="col">
            <label for="exampleInputEmail1">Direcció</label>
            <input type="text" class="form-control" value = "'.$mostrar['Direccio'].'">
            </div>
            <div class="col">
            <label for="exampleInputEmail1">Codi Postal</label>
            <input type="text" class="form-control" value = "'.$mostrar['CodiPostal'].'">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
            <label for="exampleInputEmail1">Vacuna</label>
            <select class="form-select" aria-label="Default select example">
                <option >Open this select menu</option>
                <option value="'.$mostrar['idVacuna'].'">'.$mostrar['NomVacuna'].'</option>
                
            </select>
            </div>
            <div class="col">
            <label for="exampleInputEmail1">Data 1ª dosis</label>
            <input type="date" class="form-control" value = '.$mostrar['DataPrimeraDosi'].' style="width: 60%;">
            </div>
            
            <div class="col">
            <label for="exampleInputEmail1">Data 2ª Dosis</label>
            <input type="date" class="form-control" value = '.$mostrar['DataSegonaDosi'].' style="width: 60%;">
            </div>
        </div>
    </form>
    </div>
    
    ';


}
}
echo '
</div>
</body>
</html>
';

?>