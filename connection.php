<?php
error_reporting(E_ALL);

$con = mysqli_connect('localhost', 'root', 'Kim180105ani', 'login_system_db');
If(!$con)
{
    echo 'Failed to Connect';
}
?>