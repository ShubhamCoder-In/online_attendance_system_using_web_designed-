<section class="main_sect1">
     <?php
     if (!isset($_GET['value'])) {
          $_SESSION['value'] = "";
     }
     if (!isset($_GET['show'])) {
          $_SESSION['ViewAttendance'] = "";
     }
     if (isset($_GET['page'])) {
          if ($_GET['page'] == $sidebar_iterm[0]) {
               require_once("./php_configue/font_page_student.php");
          }
          if ($_GET['page'] == $sidebar_iterm[1]) { 
              require_once('./php_configue/attendence_view_student.php');
          }
          if ($_GET['page'] == $sidebar_iterm[2] && !isset($_GET['edit'])) {
              require_once('./php_configue/student_profile.php');
          }
          else if(isset($_GET['edit'])){
               require_once('./php_configue/student_profile_edit.php');
          }
         
     } else {
          require_once("./php_configue/font_page_student.php");
     }

     ?>
</section>