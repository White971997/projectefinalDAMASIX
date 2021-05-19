<?php
editPacient();
    
    
function editPacient()
{

// Variables amb els camps del formulari
    $idPacient = $_POST['idP'];
    $nom = $_POST['nomP'];
    $cognoms = $_POST['cognomsP'];
    $dni = $_POST['dniP'];
    $direccio = $_POST['direccioP'];
    $codiPostal = $_POST['codiPostalP'];
    $dataNaixament = $_POST['dataNaixamentP'];
    $dataPrimeraDosi = $_POST['dPrimeraDosiP'];
    $dataSegonaDosi= $_POST['dSegonaDosiP'];
    $observacions = $_POST['obsP'];

// Variables connexió MySQL
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "projectefinal";
    $error = "";
// Realitzem la connexió amb la base de dades
    $connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
    
$sentenciasql = "UPDATE pacients SET NomPacient= '$nom', CognomsPacient = '$cognoms', DNI = '$dni', DataNaixament ='$dataNaixament', Direccio ='$direccio', CodiPostal = '$codiPostal',
DataPrimeraDosi ='$dataPrimeraDosi', DataSegonaDosi ='$dataSegonaDosi', Observacions = '$observacions'
WHERE pacients.idPacient = '$idPacient'; ";

$sql= mysqli_query($connect, $sentenciasql);        
header('Location: ../menuprincipal.html');
}
?>