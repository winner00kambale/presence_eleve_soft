<?php
session_start();
require('db/database.php');
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}

$eleve=$db->query('SELECT * FROM carte_eleve');
$ann = $db->query('SELECT annee FROM AFF_ANEE');
$an=$ann->fetch();
$classe=$db->query('SELECT * FROM getClasse');  
$anne_scol=$db->query('SELECT * FROM `t_annee`');
?>

<link rel="apple-touch-icon" sizes="180x180" href="static/vendors/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="static/vendors/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="static/vendors/images/favicon-16x16.png">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="static/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="static/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="static/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="static/src/plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="static/vendors/styles/style.css">

<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="static/style.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

<?php include'_aside.php' ?>

<div class="main-container">
    <div class="card-box mb-30">
    <div class="pd-10">
            <form action="rapport_inscrit.php" method="POST" target="_blank">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="client">Classe et Option</label> 
                                <select class="custom-select2 form-control" name="classe" style="width: 100%; height: 38px;">
                                <optgroup>
                                    <option value=""></option>
                                        <?php while($class=$classe->fetch()){ ?>
                                            <option value="<?php echo($class['classe']); ?> "><?php echo($class['classe']); ?></option>
                                        <?php } ?>
                                </optgroup>
                                </select>  
                        </div>
                        <div class="col-lg-3">
                                <label for="client">Année Scolaire</label> 
                                <select class="custom-select2 form-control" name="annee" style="width: 100%; height: 38px;">
                                <optgroup>
                                    <option value=""></option>
                                        <?php while($a=$anne_scol->fetch()){ ?>
                                            <option value="<?php echo($a['designation']); ?> "><?php echo($a['designation']); ?></option>
                                        <?php } ?>
                                </optgroup>  
                                </select>
                        </div>
                    </div>
                </div>  
                    <h3 class="box-title">
                        <button type="submit" class="btn btn-primary" name="submit" target="_blank"><i class="fa fa-print"></i></button>
                    </h3>
            </form> 
        </div>

        <div class="container overflow-hidden">
            <h2 class="content__title"></h2>
            <!--multisteps-form-->
            <div class="multisteps-form">
                <!--progress bar-->
                <div class="row">
                    <div class="col-12 col-lg-8 ml-auto mr-auto">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Elèves Inscrits</button>
                        </div>
                    </div>
                </div>
                <!--form panels-->
                <div class="row">
                    <div class="col-12 col-lg-11 m-auto">
                    <form class="multisteps-form__form" action="#" method="POST" enctype="multipart/form-data">
                            <!--single form panel-->
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                <h5 class="multisteps-form__title">Année Scolaire 
                                    <h5 style="color: #e14e50;"><?= $an['annee']; ?> </h5></th>    
                                </h5>
                                <div class="multisteps-form__content">
                                <table class="data-table table hover multiple-select-row nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">#</th>
                                            <th>noms Elèves</th>
                                            <th>genre</th>
                                            <th>matricule</th>
                                            <th>classe</th>
                                            <th>option_</th>
                                            <th>année scolaire</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($g = $eleve->fetch()) { ?>
                                        <tr>
                                            <td><?= $g['id']; ?></td>
                                            <td><?= $g['Nom'].' '.$g['Postnom'].' '.$g['Prenom']; ?></td>
                                            <td><?= $g['sexe']; ?></td>
                                            <td><?= $g['matricule']; ?></td>
                                            <td><?= $g['classe']; ?></td>
                                            <td><?= $g['option_']; ?></td>
                                            <td><?= $g['annee']; ?></td>
                                            <td>
                                                <a href="card.php?matricule=<?php echo($g['matricule']) ?>" class="fa fa-print mr-3"  aria-hidden="true" target="_blank"></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                                    
                                    </tbody>
                                </table>                             
                                </div>
                            </div>
                    </form>
                    </div>
                </div>
                <br>
            </div>
<!--        </div>-->
<br><br><br>
    </div>
    </div>
</div>
<!-- js -->
<script  src="static/script.js"></script>
<script src="static/vendors/scripts/dashboard.js"></script>

<script src="static/vendors/scripts/core.js"></script>
<script src="static/vendors/scripts/script.min.js"></script>
<script src="static/vendors/scripts/process.js"></script>
<script src="static/vendors/scripts/layout-settings.js"></script>
<script src="static/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="static/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="static/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="static/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="static/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="static/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="static/src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="static/src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="static/src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="static/src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="static/src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="static/vendors/scripts/datatable-setting.js"></script></body>

