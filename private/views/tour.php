<?php
//
// ob_start();
// include("private/includes/templates/header.php");
// $buffer=ob_get_contents();
// ob_end_clean();
//
// $title = "Tour";
// $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
//
// echo $buffer;
// include 'private/includes/templates/navigation.php';
// include 'private/includes/templates/tourContent.php';
// include 'private/includes/templates/footer.php';
?>

<?php $this->layout('mainLayout') ?>

<?php $this->start('title') ?>
Tour
<?php $this->stop('title') ?>

<?php $this->start('content_div') ?>
tourpage
<?php $this->stop('content_div') ?>

<h1>The Final Party</h1>
<ul>
  <?php foreach ($tours as $tour): ?>
    <li>
      <div class="tourdate">
        <span class="tourMonth"><?php echo date("F",strtotime($tour['tourDate'])); ?></span>
        <br>
        <span class="tourDay"><?php echo date("j",strtotime($tour['tourDate'])); ?></span>
      </div>
      <div class="tourlocation">
        <h5><?php echo $tour['tourLocation']; ?></5>
        <p><?php echo $tour['tourLocation2']; ?></p>
      </div>
      <div class="tourtickets">
        <?php if ($tour['tourAvailability'] == 'Sold Out') { ?>
          <p><b><?php echo $tour['tourAvailability']; ?></b></p>
        <?php } else if ($tour['tourAvailability'] == 'Buy Now') { ?>
          <a href="<?php echo $tour['tourTicketLink']; ?>" target="_blank"><?php echo $tour['tourAvailability']; ?></a>
        <?php } ?>
      </div>
    </li>
  <?php endforeach; ?>
</ul>
