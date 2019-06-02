<?php
//
// ob_start();
// include("private/includes/templates/header.php");
// $buffer=ob_get_contents();
// ob_end_clean();
//
// $title = "About Grumps";
// $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
//
// echo $buffer;
// include 'private/includes/templates/navigation.php';
// include 'private/includes/templates/aboutGrumpsContent.php';
// include 'private/includes/templates/footer.php';
?>

<?php $this->layout( 'mainLayout' ) ?>

<?php $this->start( 'title' ) ?>
About Grumps
<?php $this->stop( 'title' ) ?>

<?php $this->start( 'content_div' ) ?>
aboutPage
<?php $this->stop( 'content_div' ) ?>

<h1>About Grumps</h1>
<div class="aboutContent">
  <?php
  $i = 0;
  foreach ($abouts as $about): ?>
    <div class="aboutText">
      <p><?php echo $about['aboutText']; ?></p>
    </div>
    <div class="aboutImage">
      <img src="<?php echo $about['aboutPicture']; ?>" alt="Arin and Dan">
    </div>
  <?php
  if (++$i == 1) break;
  endforeach; ?>
</div>
