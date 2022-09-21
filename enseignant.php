<?php require('db/database.php');
// $date = date('Y-m-d');
$rep=$db->query("SELECT * FROM `t_enseignant`");
?>

<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="static/vendors/styles/style.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
</script>
<?php include'_aside.php' ?>
<div class="main-container">
    
    <div class="card-box mb-30">
        <div class="pd-10">
            <!-- <a href="#" class="btn btn-info" style="border-radius: 15px;">+ Nouveau Elève</a> -->
            <h3 class="box-title">
                <a class="btn btn-primary" href="new_enseignant.php"><span
                    class="glyphicon glyphicon-add"></span>
                    + Nouveau</a>
            </h3>
        </div>
        <div class="pb-20 m-3">
            <table class="data-table table hover multiple-select-row nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">#</th>
                        <th>noms Enseignant</th>
                        <th>genre</th>
                        <th>adresse</th>
                        <th>telephone</th>
                        <th>fonction</th>
                        <th>photo</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($g = $rep->fetch()) { ?>
                    <tr>
                        <td><?= $g['id']; ?></td>
                        <td><?= $g['nom'].' '.$g['postnom'].' '.$g['prenom']; ?></td>
                        <td><?= $g['sexe']; ?></td>
                        <td><?= $g['adresse']; ?></td>
                        <td><?= $g['telephone']; ?></td>
                        <td><?= $g['fonction']; ?></td>
                        <td><img class="img-circle" src="all/images/enseignant/<?= $g['photo']; ?>" alt="" width=50></td>
                        <td>
                            <a href="" class="fa fa-pencil mr-3" aria-hidden="true"></a>
                        </td>
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
