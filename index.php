<?php
$psname = filter_input(INPUT_POST, 'psname' );
$email = filter_input(INPUT_POST, 'email' );
$phone = filter_input(INPUT_POST, 'phone' );
$address = filter_input(INPUT_POST, 'address' );
$review = filter_input(INPUT_POST, 'review' );


if(!empty($psname) || !empty($email) || !empty($phone) || !empty($address) || !empty($review))
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
    $sql = "INSERT INTO  coffeewebpageuserdetails (psname,email,phone,address,review)
    values ('$psname','$email','$phone','$address','$review')";
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