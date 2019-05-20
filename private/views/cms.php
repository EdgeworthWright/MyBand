<?php
ob_start();
include("private/includes/templates/header.php");
$buffer=ob_get_contents();
ob_end_clean();

$title = "CMS";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);

echo $buffer;

include 'private/includes/templates/cmsContent.php';
?>
