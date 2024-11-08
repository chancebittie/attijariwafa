<?php
session_start();
require_once('header.php');


define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'attijariwafa_bank');

try {
    $bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}



if (isset($_POST['submit'])) {
    if (!empty($_POST["name"]) AND !empty($_POST["email"]) AND !empty($_POST["password"]) AND !empty($_POST["password_confirmation"])) {

        $name=htmlspecialchars($_POST["name"]);
        // $identifiant=$_POST["identifiant"]
        $email=htmlspecialchars($_POST["email"]);
        $password=sha1($_POST["password"]);
        $password_confirmation=sha1($_POST["password_confirmation"]);

        if ( $password== $password_confirmation) {
            $insertmembre=$bdd->prepare("INSERT INTO users(name, email, password) VALUES (?,?,?)" );
            $insertmembre->execute(array($name,$email,$password));

       
            $requsert=$bdd->prepare("SELECT * FROM users WHERE email=? AND password=?");
					$requsert->execute(array($email, $password));
					$usertexiste=$requsert->rowCount();

					if ($usertexiste==1) {
						$userinfos=$requsert->fetch();
						$_SESSION["id"]=$userinfos["id"];
						$_SESSION["name"]=$userinfo["name"];
						// $_SESSION["prenom"]=$userinfo["prenom"];
						$_SESSION["email"]=$userinfo["email"];
						// petit blem sur chancebook
						// header("Location:chancebook.php?id=".$_SESSION["id"]."/".$_SESSION["prenom"]);
							header("Location:account.php");


					}else {
						$erreure="adresse email deja utilisé";
					}
        } else {
            $erreure="vos mots de passe saisir ne correspondent pas";
        }
        
        
				
    } else {
        $erreure="veuillez remplir tout les champs";
    }
    
    
}



?>


<div class="row justify-content-center">
    <div class="col-md-6 mt-5">
        <div class="card shadow">
            <div class="card-header">Inscription</div>

            <div class="card-body">
                <form method="POST" action="">
                

                    <div class="col-md-12 mt-3  mx-auto">
                        <div class="input-group">
                            <span class="input-group-text fs-3"> <i class="bi bi-person"></i> </span>
                            <div class="form-floating ">
                              <input type="text" id='name' class="form-control " name="name" minlength="4"   autocomplete="name" autofocus id="floatingInputGroup2" placeholder="Nom complet" required>
                              <label for="floatingInputGroup2">Nom complet</label>
                            </div>
                          </div>
                    </div>

                    <div class="col-md-12 mt-3  mx-auto">
                        <div class="input-group">
                            <span class="input-group-text  fs-3"> <i class="bi bi-envelope-at-fill"></i> </span>
                            <div class="form-floating ">
                              <input type="email" id='email' class="form-control" name="email"   autocomplete="email"  id="floatingInputGroup2" placeholder="Email" required>
                              <label for="floatingInputGroup2">Email</label>
                            </div>
                          </div>
                    </div>

                    <div  x-data="{ eye: false }" class="col-md-12 mt-3  mx-auto">
                        <div class="input-group">
                            <button class="input-group-text fs-3" x-on:click=" eye =! eye "> <i x-bind:class=" eye ? 'bi bi-eye-fill' : 'bi bi-eye-slash-fill'"></i> </button>
                            <div class="form-floating ">
                              <input x-bind:type=" eye ? 'text' : 'password'"  id='password_confirmation' minlength="4" class="form-control" name="password_confirmation" autocomplete="password_confirmation"  required>
                              <label for="floatingInputGroup2">Mots de passe</label>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ eye: false }" class="col-md-12 mt-3  mx-auto">
                        <div class="input-group">
                            <button class="input-group-text fs-3" x-on:click=" eye =! eye "> <i x-bind:class=" eye ? 'bi bi-eye-fill' : 'bi bi-eye-slash-fill'"></i> </button>
                            <div class="form-floating ">
                              <input x-bind:type=" eye ? 'text' : 'password'" id='password' minlength="4" class="form-control " name="password"   placeholder="password" required>
                              <label for="floatingInputGroup3">Comfirmation</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 mx-auto">
                        <?php 
                        if (isset($erreure)) {
                            echo '<font color="red">'. $erreure ."!!".'</font>' ;
                        } ?>
                    </div>

                    <div class="row mb-3 mx-auto">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="s'inscrire" name="submit">
                            <a href="/register">Deja un compte</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

