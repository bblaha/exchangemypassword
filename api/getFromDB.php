<?php
require_once "db_functions.php";
if($_GET["pk"]!=""){
    getFromDB($_GET["pk"]);
}
else{
        $arr = array('error' => 'No name given');
        echo json_encode($arr);
}
function getFromDB($pk){
    
    $result = db_query("SELECT publickey, password FROM passwords WHERE publickey LIKE '".$pk."';");

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
		echo $row;
    }
    
    echo $rows;
    if($rows == ""){
        $arr = array('error' => 'No match');
        echo json_encode($arr);
        return;
    }
    
    if(count($rows)==1){
        echo json_encode($rows[0]);
    }
    elseif(count($rows)>1){
		$result = db_query("DELETE FROM passwords WHERE publickey LIKE '".$pk."';");
        $arr = array('error' => 'Multiple passwords found, previous passwords deleted');
        echo json_encode($arr);
    }elseif(count($rows<1)){
        $arr = array('error' => 'No match');
        echo json_encode($arr);
    }
}
?>
