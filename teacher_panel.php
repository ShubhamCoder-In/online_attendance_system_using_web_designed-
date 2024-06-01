<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teacher Panel</title>
  <?php require_once('css/css_style.php'); ?>
  <link rel="stylesheet" href="css/teacher_panel.css">
</head>

<body>
  <?php
  if(!isset($_SESSION['id'])){
    header('location: ./php_configue/state2.php?teacher_id=true');
  }
  require_once('main/header.php');
  ?>
  <!-- primary menu with search bar -->
  <section class="primary_menu">
    <div class="row">
      <div class="header_heading">
        <h3>
          dashboard: teacher panel
        </h3>
      </div>
    </div>
  </section>

  <!-- main section with sidebar -->
  <section class="main_section">

    <!-- leftside section -->

    <div class="side_section">
      <h3>dashboard</h3>
      <?php
      $sidebar_iterm = ['home','course and class', 'marking attendence', 'attendance record', 'student recorde', 'customization','profile'];
      // echo sizeof($dashboard);
      $count = 0;
      for ($i = 0; $i < sizeof($sidebar_iterm); $i++) {
        echo " <li class='list_iterm'><a href='./teacher_panel.php?page=$sidebar_iterm[$i]'>$sidebar_iterm[$i]</a></li> ";
      }
      ?>
    </div>

    <!-- main_div section -->

    <div class="main_container">
      <?php require_once("./teacher/class_list.php");?>
    </div>
  </section>
  <?php require_once('main/footer.php') ?>
  <script src="js/main.js"></script>
  <script src="js/teacher_panel.js"></script>
</body>
</html>