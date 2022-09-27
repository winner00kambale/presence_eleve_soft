<?php
session_start();
include 'db/database.php';

if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
?>
<?php
if(isset($_POST['annee']) and isset($_POST['classe'])){
    $annee = $_POST['annee'];
    $classe = $_POST['classe'];
    $pres=$db->prepare("SELECT ROW_NUMBER() OVER (ORDER BY NOM DESC) AS nbr,matricule,Nom,Postnom,Prenom,sexe,classe,option_,annee FROM carte_eleve WHERE annee='$annee' AND CONCAT(classe,'  ',option_)='$classe' ");
    $pres->execute();
    $pres1=$db->query("SELECT CONCAT(classe,'  ',option_) AS class,annee FROM carte_eleve WHERE annee='$annee' AND CONCAT(classe,'  ',option_)='$classe' ");
    $rs = $pres1->fetch();
}else{

}
$date=date('Y-m-d');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion des presences</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body onload="window.print();">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 style="text-align: center;">REPUBLIQUE DEMOCRATIQUE DU CONGO</h3>
                        <h5 style="text-align: center;">Enseignement Primaire Sécondaire et innitiation <br> à la nouvelle citoyenneté</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <img src="static/img/ii.jpg" alt="" width="50%">
                    </div>
                    <div class="col-xs-6">
                        <h2 class="page-header">
                        <i class="fa fa-globe"></i> CS. MAMA YETU , DRC. <br>
                        <small class="pull-right">BP : 00290/389</small> <br>
                        
                        <small class="pull-right">Année Scolaire : <?=$rs['annee'] ?> </small>
                        </h2>
                    </div>
                    <div class="col-xs-3"></div>
                    
                </div>
                    <hr>
                    <h4 style="text-align: center;">BUREAU DU DIRECTEUR</h4>
                        <h4 style="text-align: center;">Liste des eleves incrits en <?=$rs['class'] ?>  </h4>
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>matricule</th>
                                    <th>nom</th>
                                    <th>postnom</th>
                                    <th>prenom</th>
                                    <th>genre</th>
                                    <th>classe</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($electeur=$pres->fetch()): ?>
                                <tr>
                                    <td><?=$electeur['nbr'];?></td>
                                    <td><?=$electeur['matricule'];?></td>
                                    <td><?=$electeur['Nom'];?></td>
                                    <td><?=$electeur['Postnom'];?></td>
                                    <td><?=$electeur['Prenom'];?></td>
                                    <td><?=$electeur['sexe'];?></td>
                                    <td><?=$electeur['classe'].' '.$electeur['classe'];?></td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2"></div>
                        <div class="col-xs-6">  
                        </div>
                    <div class="col-xs-4">
                        <p class="lead">Fait à Goma,<?=$date;?></p>
                        <p>   Par : <br><br><br><b>  <?php echo($_SESSION['user_name']) ?></b></p> 
                    </div>
                </div>
            </div>
</body>
</html>
