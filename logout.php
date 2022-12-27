<?php
$preTitle = "Logout";
include './parts/header.php';
session_destroy();
redirectTo("/");
//header("Location: /index.php");
include './parts/footer.php';
?>