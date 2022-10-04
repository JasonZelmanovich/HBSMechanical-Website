<?php
date_default_timezone_set('America/New_York');

$host =  // removed for github
$username = // removed for github
$password =  // removed for github
$db = // removed for github
$secretKey =  // removed for github



$conn = mysqli_connect($host, $username, $password, $db) or die("cannot connect");

$name = $_POST["modal-name"];
$email = $_POST["modal-email"];
$message = $_POST["modal-message"];
$time = date('Y/m/d H:i:s');
$captcha = $_POST['g-recaptcha-response'];

if (!$captcha) {
    echo "Fill out the captcha";
    exit();
}

$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey .  '&response=' . $captcha;
$response = file_get_contents($url);
$responsekeys = json_decode($response, true);
if ($responsekeys['success']) {
    $query = "Insert into messages (name, email, message,time) VALUES ( '$name', '$email', '$message','$time' )";
    mysqli_query($conn, $query);
    header("Location: http://hbsmechanical.com");
} else {
    header("Location: http://hbsmechanical.com");
}












// header("Location: http://hbsmechanical.com");
