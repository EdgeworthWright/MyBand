</div>

<div class="contactPage">
  <h1>Contact</h1>
  <div class="contactForm">
    <form class="contact" method="post">
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
</div>
