<?php

echo '
            
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- implementacio de css amb bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Barris</title>
</head>
<body>
<div class="row">
';

    totselsbarris();
    
    
    function totselsbarris()
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
    $sentenciasql = "SELECT * FROM barris";
    $sql= mysqli_query($connect, $sentenciasql);

    $rowCount = mysqli_num_rows($sql);
    
    
    if($rowCount>0){

    while($mostrar=mysqli_fetch_array($sql)){
           
            echo '
            
            <div class="col-sm-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">'.$mostrar['nomBarri'].'</h5>
                    <p class="card-text">'.$mostrar['codiPostal'].' - '.$mostrar['Poblacio'].' </p>
                    
                    <a href="veurePacients.php?CodiPostalBarri='.$mostrar['codiPostal'].'" class="btn btn-primary">Veure llistat</a>
                </div>
            </div>
            </div>
            
            ';

        }

    }

    else{

        echo "No s'ha trobat cap registre";
    }
    
    }
    echo '
            
        
        </body>
        </html>
        ';

?>