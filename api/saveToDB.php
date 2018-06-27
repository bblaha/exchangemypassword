<?php
require_once "db_functions.php";
if($_GET["pw"]!=""){
    saveToDB($_GET["pw"], $_GET["pk"]);
}
else{
        $arr = array('error' => 'Missing value for DB');
        echo json_encode($arr);
}
function setPoints($pw, $pk){
    $result = db_query("INSERT INTO passwords VALUES(password = '".$pw."', publickey='".$pk."');");
    if($result){
		echo $result;
        $arr = array('result' => 'password entered');
    }else{
        $arr = array('result' => 'error');
    }
    echo json_encode($arr);
}
?>
