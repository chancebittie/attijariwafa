<?php
session_start();
// require_once('db.php');
$bdd= new PDO("mysql: host=127.0.0.1;dbname=attijariwafa_bank","root","");  
require_once('header.php');

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit;
}

$user_id = $_SESSION['user_id'];
if (isset($_SESSION["user_id"]) and $_SESSION["user_id"] > 0) {
	$requser = $bdd->prepare("SELECT * FROM users WHERE id=?");
	$requser->execute(array($_SESSION["user_id"]));
	$userinfo = $requser->fetch();

}

?>

<!-- <div class="container-fluid"> -->
 
        <!-- <h1 class="text-center">BIENVENUE</h1> -->
  

    <div class="container-fluid ">
    <h1 class="text-center">BIENVENUE</h1>
        <x-adminlte-modal id="modalMin" title="Minimal"/>
        <h1 class="text-center">Sur votre espace compte</h1>
        <div class="col-10 mx-auto">
             <p class="text-center text-light binks  rounded-pill" style="font-size: 30px;font-weight:bold;">compte bloqué !!!</p> 
        </div>

        <div class="col-md-10 mx-auto mt-1">
            <div class="row">
                <div class="col-md-6 mt-2 ">
                    <div class="row tp mx-1 shadow py-3">
                        <div class="col-4 px-3 pt-2 text-center" >
                            <h1 class="py-2" style="background-color: rgb(236, 121, 121);border-radius:10px;"><i class="bi bi-credit-card-2-front text-light"></i></h1>
                        </div>
                        <div class="col">
                            <div class="row" >
                                Numero De Compte
                            </div>
                            <div class="row" style="font-size: 25px;">
                                <strong > 123456789000</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2 ">
                    <div class="row tp  mx-1 shadow py-3">
                        <div class="col-4 px-3 pt-2 text-center" >
                            <h1 class="py-2" style="background-color: rgb(236, 121, 165);border-radius:10px;"><i class="bi bi-wallet text-light"></i></h1>
                        </div>
                        <div class="col">
                            <div class="row" >
                                Solde disponible
                            </div>
                            <div class="row" style="font-size: 25px;">
                                <strong >  46.983.200</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-2 ">
                    <div class="row tp shadow mx-1 py-3">
                        <div class="col-4 px-3  pt-2 text-center">
                            <h1 class="py-2" style="background-color: rgb(165, 121, 236);border-radius:10px;"><i class="bi bi-arrow-clockwise text-light"></i></h1>
                        </div>
                        <div class="col">
                            <div class="row" style="font-size: 25px;">
                                <strong > 53.016.800</strong>
                            </div>
                            <div class="row">
                                Retrait
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2 ">
                    <div class="row tp shadow mx-1 py-3">
                        <div class="col-4  px-3  pt-2 text-center">
                            <h1 class="py-2" style="background-color: rgb(121, 199, 236);border-radius:10px;"><i class="bi bi-repeat  text-light"></i></h1>
                        </div>
                        <div class="col">
                            <div class="row" style="font-size: 25px;">
                                <strong >315</strong>
                            </div>
                            <div class="row">
                                Transaction
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6 ">
                    <div class="row tp shadow py-3 mr-1">
                        <div class="col-4 px-3  pt-2 text-center">
                            <h1 class="py-2" style="background-color: rgb(243, 131, 111);border-radius:10px;"><i class="bi bi-ticket text-light"></i></h1>
                        </div>
                        <div class="col">
                            <div class="row" style="font-size: 25px;">
                                <strong >100.256</strong>
                            </div>
                            <div class="row">
                                DPS
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="row tp shadow py-3 ml-1">
                        <div class="col-4  px-3  pt-2 text-center">
                            <h1 class="py-2" style="background-color: rgb(163, 236, 121);border-radius:10px;"><i class="bi bi-textarea-resize text-light"></i></h1>
                        </div>
                        <div class="col">
                            <div class="row" style="font-size: 25px;">
                                <strong >315.500</strong>
                            </div>
                            <div class="row">
                            RAD
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <style>
            .tp{
                background-color: white;
                /* border-radius: 5px;
                border: solid rgb(112, 110, 110); */
            }
            .binks{
                padding: 20px;
                /* display: table-cell; */
                vertical-align: middle;
                background-color: red;
                color: aliceblue;
                animation: allblink 2s infinite;
                transition: none;
            }
            @keyframes allblink{
                /* 0%{}
                50%{color: green;background-color:lightgreen; */
                /* } */
                0%   { opacity:1; }
                40%   {opacity:0; }
                100% { opacity:1; }
            }
        </style>
    </div>
    
<!-- </div> -->

<?php require_once('footer.php'); ?> 