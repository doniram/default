<?php

session_start();
session_unset();
$_session=[];

session_destroy();
header("Location:login.php");
setcookie('id','', - 3600);
setcookie('sex', '', -3600);

?>