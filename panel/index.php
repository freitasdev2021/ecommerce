
<?php
require"../configs/class.php";
if($_SESSION['login'] != 1 && !isset($_SESSION['login'])){
    header("location:login.html");
}

if(isset($_GET['sair'])){
    session_destroy();
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FR Tecnologia</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/fricon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/libs/styles.css" rel="stylesheet" />
        <link href="css/libs/scrollable-tabs.css" rel="stylesheet" />
        <link href="css/libs/scrollable-tabs.min.css" rel="stylesheet" />
         <!--jQuery-->
         <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
         <!--LOAD-->
         <link rel="stylesheet" href="css/libs/load.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         <link rel="stylesheet" href="css/libs/responsive.bootstrap4.min.css">
         <link rel="stylesheet" href="css/libs/Responsive-Table.css">
    </head>
    <body>
        <style>
            thead{
                background:#234D9D;
                color:white;
            }
            textarea{
                resize:none;
            }
        </style>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end" id="sidebar-wrapper" style="background:#234D9D;">
                <div class="sidebar-heading text-white" style="background:#234D9D;">Painel de controle</div>
                <div class="list-group list-group-flush navegacao">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 produtos border-bottom white" data-value="leads.php" style="cursor:pointer;"><i class="fa-solid fa-users"></i>&nbsp;Leads</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background:#234D9D;">
                    <div class="container-fluid" >
                        <button class="btn btn-light" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link text-white" href="../index.php">Voltar para o Site</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CRM</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item " href="index.php?sair">Sair</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <br>
                <div class="logoCentral">
                    <img src="img/logo.png" width="250px" height="250px">
                </div>
                
                <div class="carregamento">
                <div class="loader"></div>
                </div>
                <div class="container-fluid conteudo">
                    
                </div>
                
            </div>
            
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="js/libs/pagination.js"></script>
        <script src="js/libs/scrollable-tabs.js"></script>
        <script src="js/libs/scrollable-tabs.min.js"></script>
        <script src="js/libs/responsive.bootstrap4.min.js"></script>
    </body>
</html>
