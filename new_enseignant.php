<?php
require('db/database.php');
if(isset($_POST['ajouterenseignant'])) {
	$valid = 1;
    $error_message='';
    $success_message='';
	
	if(empty($_POST['nom'])) {
		$valid = 0;
		$error_message.= 'Mettez le nom svp';
	}
	
	if(empty($_POST['postnom'])) {
		$valid = 0;
		$error_message.= 'Mettez le postnom';
	}
    if(empty($_POST['prenom'])) {
		$valid = 0;
		$error_message.= 'Mettez la date';
	}
	if(empty($_POST['genre'])) {
		$valid = 0;
		$error_message.= 'Mettez le prenom';
	} if(empty($_POST['fonction'])) {
		$valid = 0;
		$error_message.= 'Mettez la date de naissance';
	}if(empty($_POST['adresse'])) {
		$valid = 0;
		$error_message.= 'Mettez l\'adresse';
	}if(empty($_POST['telephone'])) {
		$valid = 0;
		$error_message.= 'Mettez le numero du telephone';
	}else {
		//Check si email existe
    	$statement = $db->prepare("SELECT * FROM `t_enseignant` WHERE nom=? and postnom=? and prenom=?");
		$statement->execute(array($_POST['nom'],$_POST['postnom'],$_POST['prenom']));
		$total = $statement->rowCount();							
    	if($total>=1) {
    		$valid = 0;
            echo "<div class='alert alert-warning' role='alert'>
            L\'enseignat existe deja dans la base de donnee
  </div>";
        	$error_message.= 'L\'eleve existe deja dans la base de donnee';
    	}
	}

	// PJ MAGIC HERE
	$photo_user = $_FILES['photo']['name'];
    $photo_user_tmp = $_FILES['photo']['tmp_name'];

	if($photo_user!='') {
        $ext = pathinfo( $photo_user, PATHINFO_EXTENSION );
        //$file_name = basename( $photo_user, '.' . $ext );
        $file_name = rand().'.'.$ext;
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message.= 'Format de photo incorrect<br>';
        }else{
		 move_uploaded_file( $photo_user_tmp, 'all/images/enseignant/'.$file_name );	
		}
    }else{
	$file_name='avatar.jpg';
	}

	if($valid == 1) {
	$sql = $db->prepare('INSERT INTO `t_enseignant`(nom, postnom, prenom, sexe, fonction, adresse, telephone, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
	$sql->execute(array($_POST['nom'], $_POST['postnom'],$_POST['prenom'],$_POST['genre'],$_POST['fonction'],
    $_POST['fonction'],$_POST['adresse'],$_POST['telephone'],$file_name));
    echo"
        <script>
            Swal.fire({
                title: 'Eleve Ajouté avec succes',
                showClass: {
                popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
                }
            })
          </script>
    ";
    // 	$success_message.= 'Eleve ajouté avec succes!';
//     echo "<div class='alert alert-success' role='alert'>
//     Eleve ajouté avec succes!
//   </div>";
   // echo"<script>window.open('index.php?ajouteagent', '_self')</script>";		
	}
}	
?>



<link rel="apple-touch-icon" sizes="180x180" href="/vendors/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/vendors/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/vendors/images/favicon-16x16.png">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="static/vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="static/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="static/vendors/styles/style.css">

<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel="stylesheet" href="static/style.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

<?php include'_aside.php' ?>

<div class="main-container">
    <div class="card-box mb-30">
        <div class="container overflow-hidden"> <br>
            <h2 class="content__title">Click on steps or 'Prev' and 'Next' buttons</h2>
            <!--multisteps-form-->
            <div class="multisteps-form">
                <!--progress bar-->
                <div class="row">
                    <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Enseignant Infos</button>
                            <!-- <button class="multisteps-form__progress-btn" type="button" title="Address">Addresse</button> -->
                            <button class="multisteps-form__progress-btn" type="button" title="Comments">Numero phone</button>
                        </div>
                    </div>
                </div>
                <!--form panels-->
                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">
                        <form class="multisteps-form__form" action="#" method="POST" enctype="multipart/form-data">
                            <!--single form panel-->
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Infos Enseignant</h3>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                        <div class="col-12 col-sm-6">
                                            <input class="multisteps-form__input form-control" type="text" name="nom" placeholder="saisir le nom" required/>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                            <input class="multisteps-form__input form-control" type="text" name="postnom"   placeholder="saisir le postnom" required/>
                                        </div>
                                    </div>
                                    <div class="form-row mt-4">
                                        <div class="col-12 col-sm-6">
                                            <input class="multisteps-form__input form-control" type="text" name="prenom" placeholder="saisir le prenom" required/>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                            <select class="multisteps-form__select form-control" name="genre" required>
                                                <option selected="selected">selectionnez le genre...</option>
                                                <option value="M">Masculin</option>
                                                <option value="F">Feminin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row mt-4">
                                        <div class="col-12 col-sm-6">
                                            <input class="multisteps-form__input form-control" type="text" name="fonction" placeholder="saisir la fonction" required/>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                            <input class="multisteps-form__input form-control" type="text" name="adresse" placeholder="Adresse Q/Comm" required/>
                                        </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Telephone number</h3>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                        <input class="multisteps-form__input form-control" type="tel" name="telephone" required placeholder="Numero telephone"/>
                                    </div>
                                    <div class="form-row mt-4">
                                        <input class="multisteps-form__input form-control" type="file" name="photo" />
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                        <input name="ajouterenseignant" type="submit" class="btn btn-success ml-auto"value="Send" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
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
