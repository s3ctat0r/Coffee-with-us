<?php
$card_number = filter_input(INPUT_POST, 'card_number' );
$card_holder = filter_input(INPUT_POST, 'card_holder' );
$exp_month = filter_input(INPUT_POST, 'exp_month' );
$exp_year = filter_input(INPUT_POST, 'exp_year' );
$cvv = filter_input(INPUT_POST, 'cvv' );


if(!empty($card_number) || !empty($card_holder) || !empty($exp_month) || !empty($exp_year) || !empty($cvv))
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
    $sql = "INSERT INTO  paymentdata (card_number,card_holder,exp_month,exp_year,cvv)
    values ('$card_number','$card_holder','$exp_month','$exp_year','$cvv')";
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