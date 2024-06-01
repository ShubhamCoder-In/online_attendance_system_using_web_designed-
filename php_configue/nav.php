<div class="header">
  <div class="top-menu">
    <div class="site-name">
      attendance class
    </div>
  </div> 
  <div class="main-header">
    <div class="menubar" onclick="mobile_menu()">=</div>
    <nav class="main-menu">
      <div class="close-menu" onclick="mobile_menu_close()">x</div>
      <li class=""><a href="/collegeproject">home</a></li>
      <!-- <li class=""><a href="college_list.php">college list</a></li> -->
      <li class=""><a href="contact.php">contact</a></li>
      <li class=""><a href="about.php">about</a></li>
      
      <?php
      if (isset($_SESSION['login']) && $_SESSION['login']==true) {
        if($_SESSION['user_type'] == "teacher"){
          echo' <li class=""><a href="teacher_panel.php">Dashboard</a></li>';
        }
        if($_SESSION['user_type'] == "student"){
          echo' <li class=""><a href="student_panel.php">Dashboard</a></li>';
        }
        

        if ($_SESSION['status'] == 1) {
          $name = $_SESSION['user'];
          if($_SESSION['user_type'] == "teacher"){
            echo' 
            <div class="register-panel">
            <li class="profile_icon"><i></i> <a href="/collegeproject/teacher_panel.php?page=profile">'.$name.'</a></li>
            ';
          }
          else if($_SESSION['user_type'] == "student"){
            echo' 
            <div class="register-panel">
            <li class="profile_icon"><i></i> <a href="/collegeproject/student_panel.php?page=profile">'.$name.'</a></li>
            ';
          }
          echo "
          <li class='logout-btr'><a href='php_configue/logout.php'> log out</a></li>
          ";
        }
      } 
      else {
        echo '
        <div class="register-panel">
        <li class="signup-btr" onclick="signu()">sign up</li>
        <li class="login-btr" onclick="log_in()">log in</li>';
      }
      ?>
      </div>  
    </nav>
  </div>
</div>