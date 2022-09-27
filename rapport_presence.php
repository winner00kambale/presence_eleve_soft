<?php 
require('db/database.php');
session_start();
// $date = date('Y-m-d');
$rep=$db->query("SELECT * FROM rapport_presenec");
$classe=$db->query('SELECT * FROM getClasse');

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="static/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="static/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="static/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="static/src/plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="static/vendors/styles/style.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
<?php include'_aside.php' ?>
<div class="main-container">
    
    <div class="card-box mb-30">
        <div class="pd-10">
            <form action="journalier.php" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for=""> Date jour</label>
                            <input type="date" name="date" id="date" class="form-control btn-round">
                        </div>
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
                    </div>
                </div>  
                    <h3 class="box-title">
                        <button type="submit" class="btn btn-primary" name="submit" target="_blank"><i class="fa fa-print"></i></button>
                    </h3>
            </form> 
        </div>
        <div class="pb-20 m-3">
            <table class="data-table table hover multiple-select-row nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">#</th>
                        <th>noms Elèves</th>
                        <th>niveau</th>
                        <th>option</th>
                        <th>annee</th>
                        <th>date du jour</th>
                        <th>statut</th>
                        <th>heure d'arrivé</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($g = $rep->fetch()) { ?>
                    <tr>
                        <td><?= $g['id']; ?></td>
                        <td><?= $g['noms']?></td>
                        <td><?= $g['classe']; ?></td>
                        <td><?= $g['option_']; ?></td>
                        <td><?= $g['annee']; ?></td>
                        <td><?= $g['LOGDATE']; ?></td>
                        <td><?= $g['statut']; ?></td>
                        <td><?= $g['heure']; ?></td>
                    </tr>
                <?php } ?>
                
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- js -->
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
