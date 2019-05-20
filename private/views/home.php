<?php

ob_start();
include("private/includes/templates/header.php");
$buffer=ob_get_contents();
ob_end_clean();

$title = "Home";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);

echo $buffer;
include 'private/includes/templates/navigation.php';
include 'private/includes/templates/homeContent.php';
include 'private/includes/templates/sidebar.php';
include 'private/includes/templates/footer.php';
?>
