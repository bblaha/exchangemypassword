<?php
function db_connect() {
static $connection;
    
    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
        require_once "../config.php";
        // Try and connect to the database
        $connection = mysqli_connect("localhost",username,password,dbname);
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        //phpinfo();
        return mysqli_connect_error();
    }
    
    return $connection;
}

function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection,$query);

    return $result;
}


?>