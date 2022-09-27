<?php

include 'db/database.php';
?>
<?php
if(isset($_POST['date']) and isset($_POST['classe'])){
    $date = $_POST['date'];
    $classe = $_POST['classe'];
    $pres=$db->prepare("SELECT * FROM rapport_presenec WHERE LOGDATE= '$date' AND CONCAT(classe,'  ',option_)='$classe' ");
    $pres->execute();
    $pres1=$db->query("SELECT CONCAT(classe,'  ',option_) AS class,LOGDATE FROM rapport_presenec WHERE LOGDATE= '$date' AND CONCAT(classe,'  ',option_)='$classe' ");
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
                        
                        <small class="pull-right">Date: <?=$rs['LOGDATE'] ?> </small>
                        </h2>
                    </div>
                    <div class="col-xs-3"></div>
                    
                </div>
                    <hr>
                    <h4 style="text-align: center;">BUREAU DU DIRECTEUR</h4>
                        <h4 style="text-align: center;">Liste des eleves présent en <?=$rs['class'] ?>  </h4>
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>noms</th>
                                    <th>classe</th>
                                    <th>option</th>
                                    <th>statut</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($electeur=$pres->fetch()): ?>
                                <tr>
                                    <td><?=$electeur['id'];?></td>
                                    <td><?=$electeur['noms'];?></td>
                                    <td><?=$electeur['classe'];?></td>
                                    <td><?=$electeur['option_'];?></td>
                                    <td><?=$electeur['statut'];?></td>
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
                        <p>   Directeur <br><br><br><b>  Winner Kambale</b></p> 
                    </div>
                </div>
            </div>
</body>
</html>
