<?php ob_start();

session_start();

session_destroy();

unset($_SESSION['user_deatils']);

header("Location: index");

exit;

?>