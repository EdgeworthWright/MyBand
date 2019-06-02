<?php
// ob_start();
// include("private/includes/templates/header.php");
// $buffer=ob_get_contents();
// ob_end_clean();
//
// $title = "CMS";
// $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
//
// echo $buffer;
//
// include 'private/includes/templates/cmsContent.php';
// include 'private/includes/templates/footer.php';
?>

<?php $this->layout( 'cmsLayout' ) ?>

<?php $this->start( 'title' ) ?>
CMS
<?php $this->stop( 'title' ) ?>

<?php $this->start( 'content_div' ) ?>
main
<?php $this->stop( 'content_div' ) ?>

<?php if (!empty($_SESSION['account_type'])) { echo "logged in";?>
<a href="/cms?logout=true">Log out</a>
<style>
.cmsLogin {
  display: none;
}
.upload {
  display: block;
}
</style>
<?php } else { echo "not logged in"; ?>
<style>
  .upload {
    display: none;
  }
</style>
<?php } ?>

<form method="POST" class="cmsLogin" action="/cms-form">
  <h1>Log in</h1>
  <label for="username">Username</label> <br>
  <input type="text" name="username" id="username"> <br>
  <label for="password">Password</label> <br>
  <input type="password" name="password" id="password"> <br>
  <!-- <input type="submit" name="register" value="Register"> -->
  <input type="submit" name="login" value="login">
</form>

<form class="upload" action="/cms-form" method="POST">
  <h1>Upload Video</h1>
  <label for="videoTitle">Video Title</label> <br>
  <input type="text" name="videoTitle" id="videoTitle" placeholder="BEST OF Game Grumps - 2019!"> <br>

  <label for="videoDescription">Video Description</label> <br>
  <input type="text" name="videoDescription" id="videoDescription" placeholder="BEST OF Game Grumps in the year 2019!!!"> <br>

  <label for="videoLink">Video Link</label> <br>
  <input type="text" name="videoLink" id="videoLink" placeholder="https://www.youtube.com/embed/[video link]"> <br>

  <label for="videoThumbnail">Video Thumbnail</label> <br>
  <input type="text" name="videoThumbnail" id="videoThumbnail" placeholder="https://i.ytimg.com/vi/[thumbnail]"> <br>

  <label for="videoUploadDate">Video Upload Date</label> <br>
  <input type="text" name="videoUploadDate" id="videoUploadDate" placeholder="2019-05-31"> <br>

  <input type="submit" name="newVideo" value="Upload Video!">
</form>

<div class="upload">
  <h1>Edit Video</h1>
  <form action="/cms-form" method="POST">
    <input type="text" name="id" placeholder="ID" required>
    <table border="1">
      <tr>
        <td>Title</td>
        <td>Description</td>
        <td>Link</td>
        <td>Thumbnail</td>
        <td>Upload Date</td>
        <td>ID</td>
      </tr>
      <?php foreach ($updates as $update): ?>
        <tr>
          <td><input type="text" name="videoTitle<?php echo $update['id']; ?>" value="<?php echo $update['videoTitle']; ?>"></td>
          <td><input type="text" name="videoDescription<?php echo $update['id']; ?>" value="<?php echo $update['videoDescription']; ?>"></td>
          <td><input type="text" name="videoLink<?php echo $update['id']; ?>" value="<?php echo $update['videoLink']; ?>"></td>
          <td><input type="text" name="videoThumbnail<?php echo $update['id']; ?>" value="<?php echo $update['videoThumbnail']; ?>"></td>
          <td><input type="text" name="videoUploadDate<?php echo $update['id']; ?>" value="<?php echo $update['videoUploadDate']; ?>"></td>
          <td><?php echo $update['id']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <input type="submit" name="editVideo" value="Edit!">
  </form>
</div>

<div class="upload">
  <h1>Delete Video</h1>
  <form action="/cms-form" method="POST">
    <input type="text" name="id" placeholder="ID" required>
    <table border="1">
      <tr>
        <td>Title</td>
        <td>Description</td>
        <td>Link</td>
        <td>Thumbnail</td>
        <td>Upload Date</td>
        <td>ID</td>
      </tr>
      <?php foreach ($updates as $update): ?>
        <tr>
          <td><?php echo $update['videoTitle']; ?></td>
          <td><?php echo $update['videoDescription']; ?></td>
          <td><?php echo $update['videoLink']; ?></td>
          <td><?php echo $update['videoThumbnail']; ?></td>
          <td><?php echo $update['videoUploadDate']; ?></td>
          <td><?php echo $update['id']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <input type="submit" name="deleteVideo" value="Delete">
  </form>
</div>

<form class="upload" action="/cms-form" method="POST">
  <h1>Add Tour</h1>
  <label for="tourDate">Tour Date</label> <br>
  <input type="text" name="tourDate" id="tourDate" placeholder="2019-06-02"> <br>

  <label for="tourLocation">Tour City</label> <br>
  <input type="text" name="tourLocation" id="tourLocation" placeholder="Seattle, WA"> <br>

  <label for="tourLocation2">Tour Building</label> <br>
  <input type="text" name="tourLocation2" id="tourLocation2" placeholder="Paramount Theater"> <br>

  <label for="tourAvailability">Tour Availability</label> <br>
  <input type="text" name="tourAvailability" id="tourAvailability" placeholder="sold out - buy now"> <br>

  <label for="tourTicketLink">Tour Ticket Link</label> <br>
  <input type="text" name="tourTicketLink" id="tourTicketLink" placeholder="Link on gg site"> <br>

  <input type="submit" name="newTour" value="Add Tour">
</form>

<div class="upload">
  <h1>Edit Tour</h1>
  <form action="/cms-form" method="POST">
    <input type="text" name="id" placeholder="ID" required>
    <table border="1">
      <tr>
        <td>Tour Date</td>
        <td>Tour City</td>
        <td>Tour Building</td>
        <td>Tour Availability</td>
        <td>Tour Ticket Link</td>
        <td>ID</td>
      </tr>
      <?php foreach ($updates2 as $update): ?>
        <tr>
          <td><input type="text" name="tourDate<?php echo $update['id']; ?>" value="<?php echo $update['tourDate']; ?>"></td>
          <td><input type="text" name="tourLocation<?php echo $update['id']; ?>" value="<?php echo $update['tourLocation']; ?>"></td>
          <td><input type="text" name="tourLocation2<?php echo $update['id']; ?>" value="<?php echo $update['tourLocation2']; ?>"></td>
          <td><input type="text" name="tourAvailability<?php echo $update['id']; ?>" value="<?php echo $update['tourAvailability']; ?>"></td>
          <td><input type="text" name="tourTicketLink<?php echo $update['id']; ?>" value="<?php echo $update['tourTicketLink']; ?>"></td>
          <td><?php echo $update['id']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <input type="submit" name="editTour" value="Edit Tour">
  </form>
</div>

<div class="upload">
  <h1>Delete Tour</h1>
  <form action="/cms-form" method="POST">
    <input type="text" name="id" placeholder="ID" required>
    <table border="1">
      <tr>
        <td>Tour Date</td>
        <td>Tour City</td>
        <td>Tour Building</td>
        <td>Tour Availability</td>
        <td>Tour Ticket Link</td>
        <td>ID</td>
      </tr>
      <?php foreach ($updates2 as $update): ?>
        <tr>
          <td><?php echo $update['tourDate']; ?></td>
          <td><?php echo $update['tourLocation']; ?></td>
          <td><?php echo $update['tourLocation2']; ?></td>
          <td><?php echo $update['tourAvailability']; ?></td>
          <td><?php echo $update['tourTicketLink']; ?></td>
          <td><?php echo $update['id']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <input type="submit" name="deleteTour" value="Delete">
  </form>
</div>

<form class="upload" action="/cms-form" method="POST">
  <h1>Add About</h1>
  <label for="aboutText">About Text</label> <br>
  <textarea name="aboutText" id="aboutText" placeholder="I am..."></textarea> <br>

  <label for="aboutPicture">About Picture</label> <br>
  <input type="text" name="aboutPicture" id="aboutPicture" placeholder="link/to/picture"> <br>

  <input type="submit" name="newAbout" value="Add About">
</form>

<div class="upload">
  <h1>Edit About</h1>
  <form action="/cms-form" method="POST">
    <input type="text" name="id" placeholder="ID" required>
    <table border="1">
      <tr>
        <td>About Text</td>
        <td>About Picture</td>
        <td>ID</td>
      </tr>
      <?php foreach ($updates3 as $update): ?>
        <tr>
          <td><textarea name="aboutText<?php echo $update['id']; ?>"><?php echo $update['aboutText']; ?></textarea></td>
          <td><input type="text" name="aboutPicture<?php echo $update['id']; ?>" value="<?php echo $update['aboutPicture']; ?>"></td>
          <td><?php echo $update['id']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <input type="submit" name="editAbout" value="Edit About">
  </form>
</div>

<div class="upload">
  <h1>Delete About</h1>
  <form action="/cms-form" method="POST">
    <input type="text" name="id" placeholder="ID" required>
    <table border="1">
      <tr>
        <td>About Text</td>
        <td>About Picture</td>
        <td>ID</td>
      </tr>
      <?php foreach ($updates3 as $update): ?>
        <tr>
          <td><?php echo $update['aboutText']; ?></td>
          <td><?php echo $update['aboutPicture']; ?></td>
          <td><?php echo $update['id']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <input type="submit" name="deleteAbout" value="Delete">
  </form>
</div>
