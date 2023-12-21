<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; 
    $password = $_POST['password'];

    if ($email === 'reza@email.com' && $password === '123') {
        header("Location: success.php"); 
        exit();
    } else {
        echo "Invalid email or password. Please try again.";
    }
}
?>