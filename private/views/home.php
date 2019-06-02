<?php
//
// ob_start();
// include("private/includes/templates/header.php");
// $buffer=ob_get_contents();
// ob_end_clean();
//
// $title = "Home";
// $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
//
// echo $buffer;
// include 'private/includes/templates/navigation.php';
// include 'private/includes/templates/homeContent.php';
// include 'private/includes/templates/sidebar.php';
// include 'private/includes/templates/footer.php';
?>

<?php $this->layout( 'mainLayout' ) ?>

<?php $this->start( 'title' ) ?>
Home
<?php $this->stop( 'title' ) ?>

<?php $this->start( 'content_div' ) ?>
homepage
<?php $this->stop( 'content_div' ) ?>

<div class="latestVideos">
  <h1>Latest videos</h1>

  <table border="1" class="hideOnSmall">
    <?php foreach ( $videos as $video ): ?>
      <tr>
        <td><?php echo $video['videoTitle']; ?></td>
        <td><img src="<?php echo $video['videoThumbnail']; ?>" alt="<?php echo $video['videoTitle']; ?>"></td>
        <td><?php echo date("jS F Y",strtotime($video['videoUploadDate'])); ?></td>
      </tr>
    <?php endforeach;?>
  </table>

  <div class="hideOnBig">
    <?php foreach ( $videos as $video ): ?>
      <div class="video">
        <h3><?php echo $video['videoTitle']; ?></h3>
        <img src="<?php echo $video['videoThumbnail']; ?>" alt="<?php echo $video['videoTitle']; ?>">
        <h3><?php echo date("jS F Y",strtotime($video['videoUploadDate'])); ?></h3>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="sidebar hideOnSmall">
  <a class="twitter-timeline" data-width="280" data-height="400" data-theme="light" href="https://twitter.com/GameGrumps?ref_src=twsrc%5Etfw">Latest Tweets</a>
</div>
