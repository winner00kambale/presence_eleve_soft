<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="qrcodedb";

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['studentID'])){
        
        $studentID =$_POST['studentID'];
		$date = date('Y-m-d');
		$time = date('H:i:s A');

		$sql = "SELECT * FROM `t_eleve` WHERE matricule = '$studentID'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = ' Code Qr invalide '.$studentID;
		}else{
				$row = $query->fetch_assoc();
				$id = $row['STUDENTID'];
				$sql ="SELECT * FROM `t_presence` WHERE matriculle_elev='$studentID' AND LOGDATE='$date' AND status='1'";
				$query=$conn->query($sql);
				if($query->num_rows>0){
				$sql = "UPDATE t_presence SET status='1' WHERE matriculle_eleve='$studentID' AND LOGDATE='$date'";
				$query=$conn->query($sql);

				$myAudioFile = "audio/am.wav";
                            echo '<audio autoplay="true" style="display:none;">
                                <source src="'.$myAudioFile.'" type="audio/wav">
                            </audio>';
				
				$_SESSION['success'] = 'Au revoir: '.$row['Nom'].' '.$row['Postnom'];
			}else{
					// $sql = "INSERT INTO `t_presence`(`matriculle_eleve`, `TIMEIN`, `LOGDATE`, `status`) VALUES('$studentID','$time','$date','1')";
					$sql = "CALL sp_presence('$studentID','$time','$date')";
					if($conn->query($sql) ===TRUE){

                      $myAudioFile = "audio/ess.wav";
                            echo '<audio autoplay="true" style="display:none;">
                                <source src="'.$myAudioFile.'" type="audio/wav">
                            </audio>';

					 $_SESSION['success'] = 'Bienvenue: '.$row['Nom'].' '.$row['Postnom'];
			 }else{
			  $_SESSION['error'] = $conn->error;
		   }	
		}
	}
	}else{
		$_SESSION['error'] = 'Please scan your QR Code number';
}
header("location: index.php");
	   
$conn->close();
?>