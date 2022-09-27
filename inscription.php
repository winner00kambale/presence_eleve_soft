<?php
require('db/database.php');
session_start();
$eleve=$db->query('SELECT * FROM `t_eleve`');
$annee=$db->query('SELECT * FROM `t_annee` order by id DESC');
$classe=$db->query('SELECT * FROM getClasse'); 

if(isset($_POST['state']) && isset($_POST['classe']) && isset($_POST['nom'])){
    $el = $_POST['nom'];
    $ann = $_POST['state'];
    $cla = $_POST['classe'];
    $stmt=$db->prepare("INSERT INTO t_inscription(datejour, ref_classe, ref_annee, ref_et) 
    VALUES (CURDATE(), :cla, :ann, :el)");
    $stmt->execute([
      'cla'=>$cla,
      'ann'=>$ann,
      'el'=>$el
  ]);
  header('location:show_inscription.php');
//   echo '
//   swal({
//     title: "Auto close alert!",
//     text: "I will close in 2 seconds.",
//     timer: 2000
//   });
//   ';
}

if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}

?>

<link rel="apple-touch-icon" sizes="180x180" href="static/vendors/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="static/vendors/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="static/vendors/images/favicon-16x16.png">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="static/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="static/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="static/vendors/styles/style.css">

<!-- <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'> -->
<link rel="stylesheet" href="static/style.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

<?php include'_aside.php' ?>

<div class="main-container">
    <div class="card-box mb-30">
        <div class="container overflow-hidden"> <br>
            <h2 class="content__title"></h2>
            <!--multisteps-form-->
            <div class="multisteps-form">
                <!--progress bar-->
                <div class="row">
                    <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Incription Infos</button>
                        </div>
                    </div>
                </div>
                <!--form panels-->
                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">
                        <form class="multisteps-form__form" action="#" method="POST">
                            <!--single form panel-->
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Inscription</h3>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                        <div class="col-12 col-sm-6">
                                        <label for="eleve">Noms elève</label>
                                        <select class="custom-select2 form-control" name="nom" style="width: 100%; height: 38px;">
                                            <optgroup >
                                                <option value=""></option>
                                                <?php while($elev=$eleve->fetch()){ ?>
                                                    <option value="<?php echo($elev['id']); ?> "><?php echo($elev['Nom'].'   '.$elev['Postnom'].'   '.$elev['Prenom']) ?></option>
                                                <?php } ?>
                                            </optgroup>
                                          </select> 
                                        </div>
                                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <label for="client">Année Scolaire</label>
                                        <select class="custom-select2 form-control" name="state" style="width: 100%; height: 38px;">
                                            <optgroup >
                                                <option value=""></option>
                                                <?php while($ann=$annee->fetch()){ ?>
                                                    <option value="<?php echo($ann['id']); ?> "><?php echo($ann['designation']); ?></option>
                                                <?php } ?>
                                            </optgroup>
                                          </select> 
                                        </div>
                                    </div>
                                    <div class="form-row mt-4">
                                        <div class="col-12 col-sm-6">
                                        <label for="client">Classe et Option</label> 
                                          <select class="custom-select2 form-control" name="classe" style="width: 100%; height: 38px;">
                                            <optgroup >
                                            <option value=""></option>
                                                <?php while($class=$classe->fetch()){ ?>
                                                    <option value="<?php echo($class['id']); ?> "><?php echo($class['classe']); ?></option>
                                                <?php } ?>
                                            </optgroup>
                                          </select>                                         
                                        </div>
                                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                        <label for="client">Date jour</label>
                                        <input class="multisteps-form__input form-control" type="date" name="datejour" required/>  
                                       </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <a class="btn btn-primary" href="show_inscription.php">Annuler</a>
                                        <input type="submit" class="btn btn-success ml-auto"value="Inscrir" />
                                    </div>
                                                        
                                </div>
                            </div>
                            <!--single form panel-->
                        </form>
                    </div>
                </div>
                <br>
            </div>
<!--        </div>-->
    </div>
    </div>
</div>
<!-- js -->
<script src="static/vendors/scripts/core.js"></script>
<script src="static/vendors/scripts/script.min.js"></script>
<script src="static/vendors/scripts/process.js"></script>
<script src="static/vendors/scripts/layout-settings.js"></script>
<script  src="static/script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="static/vendors/scripts/dashboard.js"></script>
