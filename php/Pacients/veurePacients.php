<?php

echo '
            
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- implementacio de css amb bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <!-- el meu css -->
    <link rel="stylesheet" type="text/css" href="../../css/stylepopup.css">
    <!--el meu js-->
    <script src="../../js/popup.js"></script>
    <title>Pacients</title>
</head>
<body>
<div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../menuprincipal.php">Inici</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Veure
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Usuaris/veureUsuari.php">Veure Usuaris</a>
                            <a class="dropdown-item" href="../menuprincipal.php">Veure Pacients</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Afegir
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Usuaris/formUsuaris/afegirUsuariForm.html">Afegir Usuaris</a>
                            <a class="dropdown-item" href="../Pacients/formularisPacients/afegirPacientForm.php">Afegir Pacients</a>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
';

    veurepacients();
    
    
    function veurepacients()
    {
        $cBarri = $_GET['CodiPostalBarri'];

        
        // Variables connexi?? MySQL
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "projectefinal";
    $error = "";
    // Realitzem la connexi?? amb la base de dades
    $connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexi??");
            
    // Sentencia SQL a executar
    $sentenciasql = "SELECT * FROM pacients INNER JOIN vacunes ON pacients.idVacuna = vacunes.idVacuna WHERE codiPostal = '$cBarri'; ";
    
    $sql= mysqli_query($connect, $sentenciasql);

    $rowCount = mysqli_num_rows($sql);
    
    echo'<div style="margin-left: 2%; margin-right: 2%;">
        <table class="table">
                <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom Pacient </th>
                <th scope="col">DNI</th>
                <th scope="col">Data Naixament</th>
                <th scope="col">Edat</th>
                <th scope="col">Direcci??</th>
                <th scope="col">Codi Postal</th>
                <th scope="col">Primera Dosi</th>
                <th scope="col">Segona Dosi</th>
                <th scope="col">Vacuna</th>
                <th scope="col">Observacions</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>';
    while($mostrar=mysqli_fetch_array($sql)){
        $date1 = new DateTime($mostrar['DataNaixament']);
        $date2 = new DateTime("now");
        $diff = $date1->diff($date2);
        $edat = get_format($diff);
                echo '
                <tr>
                        <th scope="row">'.$mostrar['idPacient'].'</th>
                        <td>'.$mostrar['NomPacient'].' '.$mostrar['CognomsPacient'].'</td>
                        <td>'.$mostrar['DNI'].'</td>
                        <td>'.$mostrar['DataNaixament'].'</td>
                        <td>'.$edat.'</td>
                        <td>'.$mostrar['Direccio'].'</td>
                        <td>'.$mostrar['CodiPostal'].'</td>
                        <td>'.$mostrar['DataPrimeraDosi'].'</td>
                        <td>'.$mostrar['DataSegonaDosi'].'</td>
                        <td>'.$mostrar['NomVacuna'].'</td>
                        <td>'.$mostrar['Observacions'].'</td>
                        <td style="color: blue;" >
                            <a href="formularisPacients/editPacientsForm.php?idPacient='.$mostrar['idPacient'].'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                        </td> 
                        <td style="color: red;" >
                        
                            <a href="deletePacients.php?idPacient='.$mostrar['idPacient'].'&coPostal='.$mostrar['CodiPostal'].'" style="color:red;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        
                      </td>                        
                </tr>
                   
                ';

    }

}

function get_format($df) {

    $str = '';
    $str .= ($df->invert == 1) ? ' - ' : '';
    if ($df->y > 0) {
        // years
        $str .= ($df->y > 1) ? $df->y . '' : $df->y . ' Year ';
    return $str;
    }

    
}
echo '

<div class="popup-wrapper">
<div class="popup">
    <div onclick="cerrarPopUp()" class="popup-close">x</div>
    <div class="popup-content">
        <h5>Segur que vols eliminar aquest pacient?</div></h5>
        <button type="button" class="btn btn-success">Si</button>                          
        <button onclick="cerrarPopUp()" type="button" class="btn btn-danger">No</button>
    </div>
</div>
</div>
</body>
</html>
';
    
    
    
    

?>