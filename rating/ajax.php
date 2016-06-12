<?php
require_once 'config.php';
$xc = conectar();

//echo "holaaaaaaaa";
    if($_POST['act'] == 'rate'){
    	//search if the user(ip) has already gave a note
    	$ip = $_SERVER["REMOTE_ADDR"];
    	$therate = $_POST['rate'];
    	$thepost = $_POST['post_id'];
		$sql ="SELECT * FROM wcd_rate where ip= '$ip'  ";
    	$query = mysqli_query($xc,$sql); 
		
		echo $ip;
		
    	while($data = mysqli_fetch_assoc($query)){
    		$rate_db[] = $data;
    	}

    	if(@count($rate_db) == 0 ){
			$sql1 = "INSERT INTO dbcine.wcd_rate (id_post, ip, rate)VALUES('$thepost', '$ip', '$therate')";
    		
			$hwllow = mysqli_query($xc,$sql1);
			//echo $sql1;
    	}else{
			$sql2 = "UPDATE dbcine.wcd_rate SET rate= '$therate' WHERE ip = '$ip'";
    		mysqli_query($xc,$sql2);
    	}
    } 
?>