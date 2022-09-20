
<?php
require('db/database.php');
$annnee = $db->query('SELECT * FROM `t_annee`');
$option = $db->query('SELECT * FROM `t_option`');
$option1 = $db->query('SELECT * FROM `t_option`');
$classe = $db->query('SELECT * FROM aff_classe');
$ann = $db->query('SELECT annee FROM AFF_ANEE');
$an=$ann->fetch();
if(isset($_POST['annee'])) {
  $anne = $_POST['annee'];
  $stmt=$db->prepare("CALL sp_annee(:designation)");
$stmt->execute([
    'designation'=>$anne
]);
header('location:configuration.php');
}
if(isset($_POST['option'])){
  $option = $_POST['option'];
  $stmt=$db->prepare("CALL sp_option(:option)");
  $stmt->execute([
    'option'=>$option
]);
header('location:configuration.php');
}
if(isset($_POST['classe']) && isset($_POST['option_'])){
  $classe = $_POST['classe'];
  $option_ = $_POST['option_'];
  $stmt=$db->prepare("INSERT INTO `t_classe`(`designation`, `ref_option`) VALUES (:classe,:option_)");
  $stmt->execute([
    'classe'=>$classe,
    'option_'=>$option_
]);
header('location:configuration.php');
}
?>

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
<link rel="stylesheet" href="tabs.css">


<?php include'_aside.php' ?>
<div class="main-container">
    
    <div class="card-box mb-30">
        <div class="pd-10">
        </div><br>
        <div class="pb-20 m-5 mt-5">
                    <h2 style="text-align:center;color:#07132B;">Configuration</h2>
                    <p>Cliquez sur les boutons dans le menu à onglets :</p>
                    <div class="tab">
                      <button class="tablinks" onclick="openCity(event, 'Annee')">Année Scolaire</button>
                      <button class="tablinks" onclick="openCity(event, 'Options')">Options</button>
                      <button class="tablinks" onclick="openCity(event, 'Classes')">Classes</button>
                      <button class="tablinks" onclick="openCity(event, 'Utilisateurs')">Utilisateurs</button>
                    </div>
                      <div id="Annee" class="tabcontent">
                      <h3>Année Scolaire</h3>
                              <div class="multisteps-form">
                              <!--progress bar-->
                              <div class="row">
                              </div>
                              <!--form panels-->
                              <div class="row">
                                  <div class="col-12 col-lg-6 m-auto">
                                  <form class="multisteps-form__form" action="#" method="POST">
                                          <!--single form panel-->
                                          <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                              <div class="multisteps-form__content">
                                              <table class="table table-hoher table-striped table-bordered table-sm">
                                                    <thead>
                                                      <th>id</th>
                                                      <th>designation</th>
                                                      <th>actions</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php while ($g = $annnee->fetch()) { ?>
                                                      <tr>
                                                          <td><?= $g['id']; ?></td>
                                                          <td><?= $g['designation']; ?></td>
                                                          <td>
                                                              <a href="" class="fa fa-pencil mr-3" aria-hidden="true"></a>
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
                                <h3 class="box-title">
                                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#small-modal" type="button">+ Année</a>
                                </h3>
                          </div>
                      </div>

                            <div class="modal fade" id="small-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myLargeModalLabel">Ajouter Année</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                  <form action="#" method="POST">
                                    <div class="form-group">
                                      <label for="designation">Designation</label>
                                      <input type="text" name="annee" id="annee" value="<?php echo($an['annee']) ?>" class="form-control btn-round" readonly>
                                    </div>
                                    <input name="ajouterAnne" class="btn btn-primary" type="submit" value="Ajouter">
                                  </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                              </div>
                            </div>
                          </div>

                      <div id="Options" class="tabcontent">
                      <h3>Options</h3>
                              <div class="multisteps-form">
                              <!--progress bar-->
                              <div class="row">
                              </div>
                              <!--form panels-->
                              <div class="row">
                                  <div class="col-12 col-lg-6 m-auto">
                                  <form class="multisteps-form__form" action="" method="" >
                                          <!--single form panel-->
                                          <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                              <div class="multisteps-form__content">
                                              <table class="table table-hoher table-striped table-bordered table-sm">
                                                    <thead>
                                                      <th>id</th>
                                                      <th>designation</th>
                                                      <th>actions</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php while ($g = $option->fetch()) { ?>
                                                      <tr>
                                                          <td><?= $g['id']; ?></td>
                                                          <td><?= $g['designation']; ?></td>
                                                          <td>
                                                              <a href="" class="fa fa-pencil mr-3" aria-hidden="true"></a>
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
                                <h3 class="box-title">
                                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#small-modal2" type="button">+ Option</a>
                                </h3>
                          </div>
                      </div>

                      <div class="modal fade" id="small-modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myLargeModalLabel">Options</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                  <form action="#" method="POST">
                                    <div class="form-group">
                                      <label for="designation">Designation</label>
                                      <input type="text" name="option" id="option" class="form-control btn-round">
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Ajouter">
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  
                                </div>
                              </div>
                            </div>
                          </div>

                      <div id="Classes" class="tabcontent">
                      <h3>Classes</h3>
                              <div class="multisteps-form">
                              <!--progress bar-->
                              <div class="row">
                              </div>
                              <!--form panels-->
                              <div class="row">
                                  <div class="col-12 col-lg-8 m-auto">
                                  <form class="multisteps-form__form" action="#" method="POST" enctype="multipart/form-data">
                                          <!--single form panel-->
                                          <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                              <div class="multisteps-form__content">
                                              <table class="table table-hoher table-striped table-bordered table-sm">
                                                    <thead>
                                                      <th>id</th>
                                                      <th>designation</th>
                                                      <th>option</th>
                                                      <th>actions</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php while ($g = $classe->fetch()) { ?>
                                                      <tr>
                                                          <td><?= $g['id']; ?></td>
                                                          <td><?= $g['designation']; ?></td>
                                                          <td><?= $g['_option']; ?></td>
                                                          <td>
                                                              <a href="" class="fa fa-pencil mr-3" aria-hidden="true"></a>
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
                                <h3 class="box-title">
                                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#small-modal3" type="button">+ Classe</a>
                                </h3>
                          </div>
                      </div>

                      <div class="modal fade" id="small-modal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myLargeModalLabel">Classe</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                  <form action="#" method="POST">
                                    <div class="form-group">
                                      <label for="classe">Designation</label>
                                      <input type="text" name="classe" id="classe" class="form-control btn-round">
                                      <label for="option_">Option</label>
                                          <select name="option_" id="option_" class="form-control btn-round">
                                            <option value=""></option>
                                              <?php while($opt=$option1->fetch()){ ?>
                                            <option value="<?php echo($opt['id']); ?> "><?php echo($opt['designation']); ?></option>
                                                <?php } ?>
                                          </select>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Ajouter">
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  
                                </div>
                              </div>
                            </div>
                          </div>

                      <div id="Utilisateurs" class="tabcontent">
                      <h3>Utilisateurs</h3>
                              <div class="multisteps-form">
                              <!--progress bar-->
                              <div class="row">
                              </div>
                              <!--form panels-->
                              <div class="row">
                                  <div class="col-12 col-lg-8 m-auto">
                                  <form class="multisteps-form__form" action="#" method="POST" enctype="multipart/form-data">
                                          <!--single form panel-->
                                          <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                              <div class="multisteps-form__content">
                                              <table class="table table-hoher table-striped table-bordered table-sm">
                                                    <thead>
                                                      <th>id</th>
                                                      <th>nom</th>
                                                      <th>username</th>
                                                      <th>password</th>
                                                      <th>actions</th>
                                                    </thead>
                                                    <tbody>
                                                      
                                                    </tbody>
                                              </table>
                                              </div>
                                          </div>
                                  </form>
                                  </div>
                              </div>
                                <h3 class="box-title">
                                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#small-modal4" type="button">+ Utilisateurs</a>
                                </h3>
                          </div>
                      </div>  
                      <div class="modal fade" id="small-modal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myLargeModalLabel">Utilisateurs</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                  <form action="">
                                    <div class="form-group">
                                      <label for="nom">Nom</label>
                                      <input type="text" name="nom" id="nom" class="form-control btn-round">
                                      <label for="username">Username</label>
                                      <input type="text" name="username" id="username" class="form-control btn-round">
                                      <label for="password">Password</label>
                                      <input type="password" name="password" id="password" class="form-control btn-round">
                                    </div>
                                    <input class="btn btn-primary" type="button" value="Ajouter">
                                  </form>
                                </div>
                                <div class="modal-footer">  
                            </div>
                          </div>
                      </div>
                  </div>  
          </div>
    </div>
</div>
<!-- js -->
<script src="static/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="static/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="static/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="static/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

<script src="static/vendors/scripts/core.js"></script>
	<script src="static/vendors/scripts/script.min.js"></script>
	<script src="static/vendors/scripts/process.js"></script>
	<script src="static/vendors/scripts/layout-settings.js"></script>
<script src="static/vendors/scripts/datatable-setting.js"></script></body>
<script src="tabs.js"></script>