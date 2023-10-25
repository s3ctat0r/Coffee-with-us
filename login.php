<?php
$username = filter_input(INPUT_POST, 'username' );
$password = filter_input(INPUT_POST, 'password' );

if(!empty($username) || !empty($password))
{
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "phpmyadmin";


// create connection
$conn = new mysqli ($dbhost, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_error()){
    die('Connect Error(' .mysqli_connect_errno().')'.mysqli_connect_error());
}
else
{
    $sql = "INSERT INTO logindata (username,password)
    values ('$username','$password')";
    if($conn->query($sql))
    {
        echo "NEW RECORD INSERTED SUCCESSFULLY";
    }
    else{
        echo "ERROR : ". $sql ."<br>". $conn->error;
    }
    $conn->close();

}
}
?>