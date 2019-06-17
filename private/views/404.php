<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>404</title>
  <link rel="stylesheet" href="style/main.css">
  <script src="node_modules\jquery\dist\jquery.js" charset="utf-8"></script>

  <link rel="apple-touch-icon" sizes="180x180" href="images/icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">
  <link rel="manifest" href="images/icon/site.webmanifest">
  <link rel="mask-icon" href="images/icon/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="images/icon/favicon.ico">
  <meta name="msapplication-TileColor" content="#9f00a7">
  <meta name="msapplication-config" content="images/icon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

</head>

<body>
  <div class="container">
    <div class="header">
      <img class="headerImage" src="images/ggbanner.jpg" alt="">

      <nav>
        <ul class="leftNav">
          <li><a href="/MyBand/">Home</a></li>
          <li><a href="/MyBand/tour">Tour</a></li>
          <li><a href="/MyBand/about-grumps">About Grumps</a></li>
        </ul>

        <img class="navImage hideOnSmall" src="images/ggpfp.jpg" alt="">

        <ul class="rightNav">
          <li><a href="/MyBand/about-me">About Me</a></li>
          <li><a href="/MyBand/contact">Contact</a></li>
          <li><a class="searchLink" href="/MyBand/search?txt=">Search</a></li>
        </ul>
      </nav>
    </div>

    <div class="fourofour">
      <h1>Whoa there buddy!</h1>
      <h3>It seems that this page does not exist!</h3>
    </div>

    <div class="footer">
      <p>&copy; Damien Hensen & Game Grumps</p>
    </div>
  </div>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="script/main.js" charset="utf-8"></script>
</body>
</html>
