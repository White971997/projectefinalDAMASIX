<?php
addPacient();
    
    
function addPacient()
{
// Variables amb els camps del formulari
$idVacuna = $_POST['idVacunaP'];
    
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
    
$sentenciasql = "INSERT INTO `pacients` (`idPacient`, `NomPacient`, `CognomsPacient`, `DNI`, `DataNaixament`, `Direccio`, `CodiPostal`, `DataPrimeraDosi`, `DataSegonaDosi`, `idVacuna`, `Observacions`)
VALUES (NULL, '$nom', '$cognoms', '$dni', '$dataNaixament', '$direccio', '$codiPostal', '$dataPrimeraDosi', '$dataSegonaDosi', $idVacuna, '$observacions');";

$sql= mysqli_query($connect, $sentenciasql);        
header('Location: ../menuprincipal.php');

}
?>