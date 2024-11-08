
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application Bancaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <div class="mx-3">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm sticky-top " style="background-color: #f8fafc">
            <a class="navbar-brand" href="index.php">
                <img src="logoA.png" style="max-height: 100px;" class="d-block w-100" alt="...">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <!-- // Vérifie si l'utilisateur est connecté -->
                <?php if (!isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item  btn btn-danger rounded-pill ">
                            <!-- <a class="nav-link text-light" href="login.php">Accéder à mon compte</a> -->
                            <a class="nav-link text-light" href="connexion.php">Accéder à mon compte</a>
                        </li>
                        <li class="nav-item btn mx-2 btn-light rounded-pill register" style="background-color: white">
                            <!-- <a class="nav-link text-dark" href="register.php">Devenir un client</a> -->
                            <a class="nav-link text-dark" href="inscription.php">Devenir un client</a>
                        </li>
                <?php } else  { ?>  
                            <li class="nav-item btn mx-2 btn-light rounded-pill  " >
                                <a class="nav-link text-dark" href="dashboard.php">Acceuil</a>
                            </li>
                            <li class="nav-item btn mx-2 btn-success rounded-pill  " >
                                <a class="nav-link text-light" href="virement.php">Faire un virement</a>
                            </li>
                            <li class="nav-item btn mx-2 btn-danger rounded-pill  " >
                                <a class="nav-link text-light" href="transaction.php">Voir les transactions</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php $_SESSION["name"] ?>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="account.php">
                                        Mon compte
                                    </a>
                                    <a class="dropdown-item" href="virement.php">
                                        Faire un virement
                                    </a>
                                    <a class="dropdown-item" href="transaction.php">
                                        Les transactions
                                    </a>
                                    <!-- <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Deconnexion
                                    </a> -->
                                    <a href="deconnexion.php" class="dropdown-item">Se déconnecter</a> <!-- Bouton de déconnexion -->

                                    
                                </div>
                            </li>

                    <?php }  ?> 
                </ul>
            </div>
        </nav>
      
   
