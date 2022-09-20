<?php  
 function imgup()
{
  $url_img=basename($_FILES['photo']['photo']);
  $nom=htmlspecialchars($_POST['nom']);
  $postnom=htmlspecialchars($_POST['postnom']);
  $prenom=htmlspecialchars($_POST['prenom']);
  $sexe=htmlspecialchars($_POST['genre']);
  $datenaiss=htmlspecialchars($_POST['datenaiss']);
  $nompere=htmlspecialchars($_POST['nompere']);
  $nommere=htmlspecialchars($_POST['nommere']);
  $fonction=htmlspecialchars($_POST['fonction']);
  $adresse=htmlspecialchars($_POST['adresse']);
  $telephone=htmlspecialchars($_POST['telephone']);

$verif_img=getimagesize($_FILES['photo']['tmp_name']);

  if (isset($_FILES['photo']) AND $_FILES['photo']['error']== 0){
if ($_FILES['photo']['size'] <= 2000000){

$infosfichier = pathinfo($_FILES['photo']['photo']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG','JPEG','GIF','PNG');
// if (in_array($extension_upload,$extensions_autorisees)){
  if ($verif_img AND $verif_img[2] < 4){
if(move_uploaded_file($_FILES['photo']['tmp_name'],'./images/'.$url_img)){
    require('db/database.php');
            $req=$db->prepare('INSERT INTO `t_eleve`(`Nom`, `Postnom`, `Prenom`, `sexe`, `datenaiss`, 
            `nompere`, `nommere`, `fonction`, `adresse`, `telephone`, `photo`) VALUES (:nom, :postnom, 
            :prenom, :sexe, :datenaiss, :nompere, :nommere, :fonction, :adresse, :telephone, :photo)');
            $req->execute(array(
            'nom' => $nom,
            'postnom' => $postnom,
            'prenom' => $prenom,
            'sexe' => $sexe,
            'datenaiss' => $datenaiss,
            'nompere' => $nompere,
            'nommere'=>$nommere,
            'fonction' => $fonction,
            'adresse' => $adresse,
            'telephone'=>$telephone,
            'photo' => $_FILES['photo']['name']
             )); 
            // header('location:about.php');
return true;
}
}
      }

      else{

          unlink($_FILES['photo']['tmp_name']);
          unset($_FILES['photo']);
      }
    }
}
if(imgup()){
}
// var_dump($_FILES);

?>
