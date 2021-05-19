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
    $idUser = $_GET['idUser'];

    
// Variables connexió MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db = "projectefinal";
$error = "";
// Realitzem la connexió amb la base de dades
$connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
        
// Sentencia SQL a executar
$sentenciasql = "SELECT * FROM users WHERE idUser = '$idUser'; ";

$sql= mysqli_query($connect, $sentenciasql);

$rowCount = mysqli_num_rows($sql);
while($mostrar=mysqli_fetch_array($sql)){
    echo '
    <div class="container">
    <form action="../editUsuari.php" method="POST" name="editusuari">
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">ID Usuari</label>
                <input type="text" readonly="readonly" class="form-control" name="idU" value = '.$mostrar['idUser'].' style="width: 30%" >
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Nom Usuari</label>
                <input type="text" class="form-control" name="nomU" value = '.$mostrar['Nom'].'>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Cognoms Usuari</label>
                <input type="text" class="form-control" name="cognomsU" value = '.$mostrar['Cognoms'].'>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">DNI/NIE</label>
                <input type="text" class="form-control" name="dniU" value = '.$mostrar['DNI'].'>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Data de naixament</label>
                <input type="date" class="form-control" name="dataNaixamentU" style="width: 60%;" value = '.$mostrar['DataNaixament'].'>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Data de Registre</label>
                <input type="date" class="form-control" name="dataRegistreU" style="width: 60%;" value = '.$mostrar['DataRegistro'].'>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="emailU" value = '.$mostrar['Email'].'>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Nom usuari</label>
                <input type="text" class="form-control" name="usernameU" value = '.$mostrar['Username'].' >
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Contrasenya Usuari</label>
                <input type="password" class="form-control" name="contrasenyaU" value = '.$mostrar['Contrasenya'].' >
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Modifica</button>
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