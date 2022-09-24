<?php
require('db/database.php');

$matricule = $_GET['matricule'];
$stmt=$db->prepare("SELECT * FROM carte_eleve WHERE matricule=:matricule");
$stmt->execute([
'matricule'=>$matricule
]);
$query=$stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion des presences</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body id="homeSection" onload="window.print();">

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main">
            <!-- Hero Section -->

            <div class="container">
                <div class="col-md-12">

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <br>
                                                <div class="row" style="border: 4px solid black; border-radius: 20px;">

                                                    <div class="col-sm-12" style="text-align: center;">
                                                        <div class="row">
                                                            <div class="col-xs-3 ml-5">
                                                                <img src="static/img/drapeau.gif" class="img-responsive img-thumbnail" style="border-color: white; width: 70px; height: 50px; float: left;">
                                                            </div>
                                                            <div class="col-xs-6 pl-2">
                                                                REPUBLIQUE DEMOCRATIQUE DU CONGO <br>
                                                                <span>CARTE D'ELEVE</span>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <img src="static/img/drapeau.gif" class="img-responsive img-thumbnail" style="border-color: white; width: 70px; height: 50px; float: left;">
                                                            </div>
                                                        </div>
                                                         
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-xs-3 ml-5">
                                                        <img src="all/images/eleve/<?= $query['photo']; ?>" style="margin-top: 10px; margin-left: 10px; margin-rigth: 0px;  weigth: 200px; height: 120px;" class="img-responsive img-thumbnail">
                                                        </div>

                                                        <div class="col-xs-9 ml-5">
                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-map-marker"></i>&nbsp;Ecole : </strong> C.S MAMA YETU
                                                            </span> <br>
                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-user"></i>&nbsp;</i>Noms :</strong> <?php echo $query['Nom'].'  '.$query['Postnom'].'  '.$query['Prenom'] ?>
                                                            </span> <br>

                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-user"></i>&nbsp;Genre :</strong> <?= $query['sexe'] ?>
                                                            </span><br>

                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-user">&nbsp;</i>Matricule :</strong> <?= $query['matricule'] ?>
                                                            </span> <br>

                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-male">&nbsp;</i>Niveau :</strong> <?= $query['classe'] ?>
                                                            </span><br>
                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-phone"></i>&nbsp;Option :</strong> <?= $query['option_'] ?>
                                                            </span><br>

                                                            <span class="text-muted form-group">
                                                                <strong><i class="fa fa-phone"></i>&nbsp;Année Scolaire :</strong> <?= $query['annee'] ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <div class="row text-center text-danger">
                                                            les autorités tant civiles que militaires et
                                                            celles de la police nationale sont priées d'apporter leur secours
                                                            au porteur de la présente en cas de nécessité.
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="row" style="border: 4px solid black; border-radius: 20px;">
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-xs-3 ml-5 mt-2">
                                                            <?php
                                                                require_once 'phpqrcode/qrlib.php';
                                                                $path = 'qrimages/';
                                                                $qrcode = $path.time().".png";
                                                                QRcode::png($id, $qrcode, 'H', 4, 4);
                                                                echo "<img src ='".$qrcode."'>";
                                                            ?>
                                                        </div>
                                                        <div class="col-xs-9 ml-2">

                                                            <h5 style="text-align: center;">REPUBLIQUE DEMOCRATIQUE DU CONGO</h5>
                                                            <div class="col-xs-4">
                                                            <h4 style="text-align: center; font-weight: bold;">PRESENCE SCAN-SOFT</h4>
                                                            </div>
                                                            <div class="col-xs-4 text-center">
                                                                <img src="static/img/drapeau.gif"  alt="" style="width: 100px; height: 120px; padding: 10px 10px auto; ">
                                                                
                                                                <h2 style="text-align: center; font-weight: bold;">NOTE</h2>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <div class="row text-center text-danger"> 
                                                                Si tu ramasse cette carte, svp, rendez-la au Bureau de l'institution.
                                                                La contrefaction de la dite carte est punie de servitude pénale
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- ========== END MAIN CONTENT ========== -->
    </body>



</html>