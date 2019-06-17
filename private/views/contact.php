<?php
//
// ob_start();
// include("private/includes/templates/header.php");
// $buffer=ob_get_contents();
// ob_end_clean();
//
// $title = "Contact";
// $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
//
// echo $buffer;
// include 'private/includes/templates/navigation.php';
// include 'private/includes/templates/contactContent.php';
// include 'private/includes/templates/footer.php';
?>

<?php $this->layout( 'mainLayout' ) ?>

<?php $this->start( 'title' ) ?>
Contact
<?php $this->stop( 'title' ) ?>

<?php $this->start( 'content_div' ) ?>
contactPage
<?php $this->stop( 'content_div' ) ?>

<h1>Contact</h1>
<div class="contactForm">
  <form class="contact" method="post" action="/MyBand/contact">
    <label for="type">Type</label> <br>
    <select name="type" id="type">
      <option value="question">Question</option>
      <option value="feedback">Feedback</option>
      <option value="other">Other</option>
    </select> <br>
    <input type="text" name="specify" placeholder="specify if other"> <br>
    <label for="email">E-Mail</label> <br>
    <input type="email" name="email" id="email" placeholder="example@email.com"> <br>
    <label for="subject">Subject</label> <br>
    <input type="text" name="subject" id="subject" placeholder="subject"> <br>
    <label for="message">Message</label> <br>
    <textarea name="message" id="message" rows="5" cols="30" placeholder="Your message here..."></textarea> <br>
    <input type="submit" name="sendMail" value="Send">
  </form>

<?php
if (isset($_POST['sendMail'])) {
  $type = $_POST['type'];
  if ($_POST['type'] == 'other') {
    $type = $_POST['specify'];
  }

  $thesubject = $type;
  $thesubject .= " | " . $_POST['subject'];

  $themessage = $_POST['email'];
  $themessage .= "\r\n" . $_POST['message'];

  // E-mail
  $email_to = '25890@ma-web.nl';
  $email_from = '25890@ma-web.nl';
  $subject = $thesubject;

  // Hier maken we een heel kort email bericht
  $message = $themessage;

  // Het afzender en reply-to adres moeten we in een speciale $headers string zetten
  $headers = 'From:' .  $email_from . "\r\n";
  $headers .= 'Reply-To:' .  $email_from . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

  $result = mail (
    $email_to,
    $subject,
    $message,
    $headers
  );

  if(!$result){
    echo 'Er ging iets fout bij het versturen van de verificatie e-mail';
    exit;
  } else{
    echo 'Klik de link in de verificatie email om je account te bevestigen';
    header('Location: /MyBand/contact');
    exit;
  }

}
?>
