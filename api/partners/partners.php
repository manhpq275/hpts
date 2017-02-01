<?php
	$arrayResult = array();	
	$error = '404';
	$success = '200';
	
	function insertPartner(){
			$result = mysql_query("INSERT INTO `hpts`.`Users` (`ID`, `Name`, `Address`, `Lat`, `Long`, `PhoneNumber`, `Birthday`, `Avatar`, `ID_Jobs`, `Partner`, `ActivePartner`) VALUES (NULL, 'PHẠM QUANG MẠNH', 'CHUNG CƯ THANH HÀ - HÀ ĐÔNG', '100.25', '12.235', '0987327997', '1989-05-27', '', '', '1', '0'); ") or die('Could not query');
			echo '1';
			break;
	}
	
	function updatePartner(){
		$ID = $_POST['ID'];
		$Name   =$_POST['Name'];
		$Address   =$_POST['Address'];
		$Lat   =$_POST['Lat'];
		$Long   =$_POST['Long'];
		$PhoneNumber   =$_POST['PhoneNumber'];
		$Birthday   =$_POST['Birthday'];
		$Avatar   =$_POST['Avatar'];
		$ID_Jobs   =$_POST['ID_Jobs'];
		$Partner   =$_POST['Partner'];
		$ActivePartner   =$_POST['ActivePartner'];
		
		$result = mysql_query("UPDATE `hpts`.`Users` set  `Name` =  '$Name', `Address`=  '$Address', `Lat`=  '$Lat', `Long`=  '$Long', `PhoneNumber`=  '$PhoneNumber', `Birthday`=  '$Birthday', `Avatar`=  '$Avatar', `ID_Jobs`=  '$ID_Jobs', `Partner`=  '$Partner', `ActivePartner`=  '$ActivePartner' WHERE  `ID`= '$ID';") or die('Could not query');
		echo $action;
	}
	
	function updateLatLongUser(){
		$ID = $_POST['ID'];
		$Lat   =$_POST['Lat'];
		$Long   =$_POST['Long'];
		$result = mysql_query("UPDATE `hpts`.`Users` set  `Lat`=  '$Lat', `Long`=  '$Long' WHERE  `ID`= '$ID';") or die('Could not query');
		
	}
	
	function getlistUsers(){
		global $data,$success,$error;
		$result = mysql_query("SELECT `ID`, `Name`, `Address`, `Lat`, `Long`, `PhoneNumber`, `Birthday`, `Avatar` FROM `hpts`.`Users` WHERE `Partner`='0' ") or die('Could not query');
		 if(mysql_num_rows($result)){
            while($row=mysql_fetch_assoc($result)){
				$arrayResult['Data'][] =  $row;
            }
			$arrayResult['Status'] = $success;
			 echo json_encode($arrayResult);
        } else {
			$arrayResult['Status'] = $error;
            echo json_encode($arrayResult);
        }
	}
	
	
?>