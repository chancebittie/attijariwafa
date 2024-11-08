<?php
session_start();

require_once('header.php');



// $bdd= new PDO("mysql: host=127.0.0.1;dbname=attijariwafa_bank","root","");  
if (isset($_POST["submit"])) {
    // if (!empty($_POST["email"]) AND !empty($_POST["password"]) ) {
    if (!empty($_POST["identifiant"]) AND !empty($_POST["password"]) ) {
		$identifiant=$_POST["identifiant"];
		$password=sha1($_POST["password"]);

		if (filter_var($email,FILTER_VALIDATE_EMAIL)) {

				// $requser=$bdd->prepare("SELECT * FROM users WHERE email=? AND password=?");
				// $requser->execute(array($email, $password));
				// $userexiste=$requser->rowCount();

					if ($userexiste == 1) {
						// $userinfo=$requser->fetch();
						// $_SESSION["user_id"]=$userinfo["id"];
						// $_SESSION["name"]=$userinfo["name"];
						$_SESSION["identifiant"]=$identifiant;
						// $_SESSION["email"]=$userinfo["email"];
						// header("Location:chancebook.php?id=".$_SESSION["id"]."/".$_SESSION["prenom"]);
						header("Location:dashboard.php?identifiant=".$_SESSION["identifiant"]);
						// il ya aussi location :chanceprof.php?


					}else {
						$msg="adresse email et/ou mots de passe incorrecte";
					}
        
		}else {
			$msg="mauvais mail";
		}


    }else {
        $msg="veuillez remplir tout les champs";
    }
}


?>


<div class="row justify-content-center mt-4">
        <div class="col-md-6  col-sm-10 ">
            <div class="card mt-5 shadow">
                <div class="card-header text-center "><strong>Attijariwafa_bank</strong></div>

                <div class="card-body">
                        <form method="POST">
                            <div class="col-md-12 mt-3  mx-auto">
                                <strong class="fs-5">IDENTIFIANT</strong>

                                <div class="input-group ">
                                    <span class="input-group-text fs-3"> <i class="bi bi-person"></i> </span>
                                    <div class="form-floating ">
                                    <!-- <input type="text" minlength="11" maxlength="11" class="form-control " name="name"  autocomplete="identifiant" autofocus id="floatingInputGroup2" placeholder="Identifiant" required> -->
                                    <input type="email" class="form-control " name="email"  autocomplete="email" autofocus id="floatingInputGroup2" placeholder="email" required>
                                    <label for="floatingInputGroup2"> Saisir votre identifiant à 11 chiffres </label>
                                    </div>
                                </div>
                            </div>
                      

                        <div  x-data="{ eye: false }" class="col-md-12 mt-3  mx-auto">
                            <strong class="fs-5">CODE PERSONNEL</strong>
                            <div class="input-group">
                                <button class="input-group-text fs-3" x-on:click=" eye =! eye "> <i x-bind:class=" eye ? 'bi bi-eye-fill' : 'bi bi-eye-slash-fill'"></i> </button>
                                <div class="form-floating ">
                                  <input x-bind:type=" eye ? 'text' : 'password'" minlength="4" class="form-control" name="password"   autocomplete="password"  id="floatingInputGroup3" placeholder="password" required>
                                  <label for="floatingInputGroup3">Saisir votre code personnel</label>
                                </div>
                              </div>
                        </div>

                        
                                <?php if (isset($msg)) {
                                     echo " <div class='row mb-3 alert alert-danger'>
                                                <p class='text-center'>$msg 
                                                </p>
                                            </div>"; } 
                                            ?>
                                
                      

                        <div class="row mt-3 mb-3 text-center justify-content-center">
                            <!-- {{-- <div class="col-md-8 offset-md-4"> --}} -->
                                <input type="submit" class="btn btn-primary col-4" name="submit" value="Connexion">
                                   
                                 <a href="/register">inscription</a> 
                                
                        </div>
                        <!-- <div class="row mb-3 text-center text-primary">
                           <a  wire:click='changeMode' class="btn text-primary" style="text-decoration: underline;">compte creé mais pas encore verifié !</a>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php require_once('footer.php'); ?>
