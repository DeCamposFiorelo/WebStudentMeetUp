<?php
// DATABASE CONNECTION
$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="student_meetup";

foreach($db as $key => $value){
    define(strtoupper($key),$value);
}
$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(!$connection){
    echo "Sorry,we are not connected with the database.";
}

?> 