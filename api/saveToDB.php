﻿﻿<?php
require_once "db_functions.php";
if($_GET["pw"]!=""){
    saveToDB($_GET["pw"], $_GET["pk"]);
}
else{
        $arr = array('error' => 'Missing value for DB');
        echo json_encode($arr);
}
function saveToDB($pw, $pk){
	$connection = db_connect();
	$query = "INSERT INTO passwords(password,publickey) VALUES('".mysqli_real_escape_string($connection,$pw)."', '".mysqli_real_escape_string($connection,$pk)."');";
    $result = db_query($query);
    if($result){
		echo $result;
        $arr = array('result' => 'password entered');
    }else{
        $arr = array('result' => 'error');
    }
    echo json_encode($arr);
}
?>
