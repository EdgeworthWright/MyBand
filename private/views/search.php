<?php

// ob_start();
// include("private/includes/templates/header.php");
// $buffer=ob_get_contents();
// ob_end_clean();
//
// $title = "Search";
// $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
//
// echo $buffer;
// include 'private/includes/templates/navigation.php';
// include 'private/includes/templates/underConstruction.php';
// include 'private/includes/templates/footer.php';
?>
<?php $this->layout( 'mainLayout' ) ?>

<?php $this->start( 'page_title' ) ?>
Search
<?php $this->stop( 'page_title' ) ?>

<?php $this->start('ok') ?>
<p>is this ok?</p>
<?php $this->stop('ok') ?>

<p>Is dit content?</p>
