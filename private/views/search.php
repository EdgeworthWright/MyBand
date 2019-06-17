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

<?php $this->start('content_div') ?>
searchPage
<?php $this->stop('content_div') ?>

<form class="" method="GET" id="searchBox">
  <input type="text" name="txt" id="keyword"> <input type="submit" name="" value="search">
</form>

<ul>
  <?php foreach ($searchResults as $searchResult): ?>
    <li class="<?php echo $searchResult['type']; ?>">
      <?php
        if ($searchResult['type'] == 'video') { ?>
          <h3><?php echo $searchResult['videoTitle']; ?></h3>
          <img src="<?php echo $searchResult['videoThumbnail'] ?>" alt="<?php echo $searchResult['videoTitle']; ?>">
          <h3><?php echo date("jS F Y",strtotime($searchResult['videoUploadDate'])); ?></h3>
        <?php } else if ($searchResult['type'] == 'tour') { ?>
          <div class="tourdate">
            <span class="tourMonth"><?php echo date("F",strtotime($searchResult['tourDate'])); ?></span>
            <br>
            <span class="tourDay"><?php echo date("j",strtotime($searchResult['tourDate'])); ?></span>
          </div>
          <div class="tourlocation">
            <h5><?php echo $searchResult['tourLocation']; ?></5>
            <p><?php echo $searchResult['tourLocation2']; ?></p>
          </div>
          <div class="tourtickets">
            <?php if ($searchResult['tourAvailability'] == 'Sold Out') { ?>
              <p><b><?php echo $searchResult['tourAvailability']; ?></b></p>
            <?php } else if ($searchResult['tourAvailability'] == 'Buy Now') { ?>
              <a href="<?php echo $searchResult['tourTicketLink']; ?>" target="_blank"><?php echo $searchResult['tourAvailability']; ?></a>
            <?php } ?>
          </div>
        <?php } ?>
    </li>
  <?php endforeach; ?>
</ul>
