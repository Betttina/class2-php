<?php

function getConnection(){
$host = "localhost";
$port = 3306;
$database = "databas1";
$username = "root";
$password = "";

// mysqli är en klass, måste skrivas i en viss ordning. skapar instans av connection
$connection = new mysqli ($host, $username, $password, $database, $port);

// om det inte är tomt så är det fel
if($connection->connect_error != null){
    die("Anslutningen misslyckades: " . $connection->connect_error);
}else{
    // om det är tomt så lyckas den
    echo "Anslutningen lyckades.<br>";
    return $connection;
}


};