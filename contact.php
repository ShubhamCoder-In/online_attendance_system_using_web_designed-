<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> College List</title>
  <?php require_once('css/css_style.php'); ?>
  <link rel="stylesheet" href="./css/contact.css">
</head>

<body>
  <?php
  require_once('main/header.php');
  ?>
  <?php
  if ($_SESSION['login']) {
    $email = $_SESSION['email'];
  } else {
    $email = "";
  }
  $error = "";
  if (isset($_GET['failed'])) {
    $error = "~ please login website with email and password ";
  } else if (isset($_GET['nofound'])) {
    $error = "~ please enter valid register email ";
  } else if (isset($_GET['erorr'])) {
    $error = "~ please try again your response not submit by server issue ";
  }
  ?>

  <div class="container">
    <div class="image-slider">
    </div>
    <div class="content">
      <div class="left-content">
        <h2> Locations </h2>
        <ul>
          <li><i class="fas fa-map-marker-alt"></i> <span>New York: 123 Stylist St, New York, NY 10001</span></li>
          <li><i class="fas fa-map-marker-alt"></i> <span>Los Angeles: 456 Fashion Ave, Los Angeles, CA 90001</span></li>
          <li><i class="fas fa-map-marker-alt"></i> <span>London: 789 Trendy Rd, London W1J 7NT, UK</span></li>
      </div>
      <div class="right-content">
        <h2>Contact from </h2>

        <?php
        if($error != "")
          echo '<p class="error">' . $error . '</p>';
        ?>
        <form action="./php_from/contact_from.php" method="post">
          <div class="form-group">
            <label for="name"><i class="fas fa-user"></i> Name:</label>
            <input type="text" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email"><i class="fas fa-envelope"></i> Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
          </div>
          <div class="form-group">
            <label for="message"><i class="fas fa-comment"></i> Message:</label>
            <textarea id="message" name="message" required></textarea>
          </div>
          <button type="submit" class="btn-primary"><i class="fas fa-paper-plane"></i> Send</button>
        </form>
      </div>
    </div>
  </div>
  <?php
  require_once('main/footer.php');
  ?>
  <script src="js/main.js"></script>
</body>

</html>