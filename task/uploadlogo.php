<?php
//All data is entered into the DB here.
session_start();
if(!(isset($_SESSION["reg"]) && $_SESSION["reg"])){
	header("Location: ../index.php");
}
sleep(1);
if(isset($_POST["upload"])){
	if( $_FILES['logo']['error'] == 0 ){
		include "../sharedlibs/DBMS.class.php";
		//include "../sharedlibs/SimpleImage.php";
		
		$type = $_FILES['logo']['type'];
		$size = $_FILES['logo']['size'];
		if(($type == "image/jpeg" || $type == "image/pjpeg" || $type == "image/png" || $type == "image/gif") && $size <= 235520){
			
			$db = new DBMS();
			
			$store = $db->escape($_SESSION["form_data"]["name"]);
			$email = $db->escape($_SESSION["form_data"]["email"]);
			$phone = $db->escape($_SESSION["form_data"]["phone"]);
			$pass = $db->escape($_SESSION["form_data"]["pass"]);
			$path = '../images/stores/'.$_FILES['logo']['name'];
			$path2 = 'images/stores/'.$_FILES['logo']['name'];
			
			if(!move_uploaded_file($_FILES['logo']['tmp_name'], $path)){die('<script language="javascript" type="text/javascript">top.stopUpload("Error saving file on server!");</script>');}
			
			$db->do_query("INSERT INTO stores (id, name, logo, phone, email, password) VALUES(NULL,'".$store."','".$path2."','".$phone."','".$email."','".$pass."')");
			
			if($db->db_query){
				$id = $db->insert_id;
				
				$db->do_query("INSERT INTO account_state (id, supp_id, state) VALUES(NULL,".$id.",'not confirmed')");
				
				if($db->db_query){
					$_SESSION['phone'] = $phone;
					$_SESSION['id'] = $id;
					$_SESSION['name'] = $store;
					echo '<script language="javascript" type="text/javascript">
						top.stopUpload(1);
					</script>';
					exit();
				}else{
					echo '<script language="javascript" type="text/javascript">
						top.stopUpload(0);
					</script>';
					exit();
				}
			}
			else{
				echo '<script language="javascript" type="text/javascript">
					top.stopUpload(0);
				</script>';
				exit();
			}
		}
		else{
			echo '<script language="javascript" type="text/javascript">
			top.stopUpload("kuna noma mahali!");
			</script>';
			exit();
		}
	}
	else{
		echo '<script language="javascript" type="text/javascript">
		top.stopUpload(0);
	</script>';
	exit();
	}
}
else{
	 echo '<script language="javascript" type="text/javascript">
		top.stopUpload(0);
	</script>';
}
?>