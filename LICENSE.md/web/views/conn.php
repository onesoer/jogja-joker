<?php 

$host = "localhost";
$port = "5432";
$dbname = "dummy";
$user = "postgres";
$password = "pass";
$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} options='{$pg_options}'";
$dbconn = pg_connect($connection_string);


if($dbconn){
    echo "Connected to ". pg_host($dbconn); 
}else{
    echo "Error in connecting to database.";
}

$sql = "CREATE TABLE jokerUser
      (idUser  SERIAL PRIMARY KEY,
      nama     TEXT   NOT NULL,
      umur     INT    NOT NULL,
      alamat   TEXT   NOT NULL,
      password TEXT   NOT NULL, 
      noKontak char   NOT NULL(12), 
      foto     text)";

$result = pg_query($dbconn, $sql);
if(!$result){
  echo pg_last_error($dbconn);
} else {
  echo "Table created successfully";
}

?>