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
               require_once("./php_configue/font_page.php");
          }
          if ($_GET['page'] == $sidebar_iterm[1]) {
               require_once("./php_configue/class_list.php");
          }
          if ($_GET['page'] == $sidebar_iterm[2]) {
               require_once("./php_configue/attedance_markig.php");
          }
          if ($_GET['page'] == $sidebar_iterm[3]) {
               if (isset($_GET['show'])) {
                    $_SESSION['ViewAttendance'] = $_GET['show'];
                    require_once("./php_configue/attendanceView.php");
               } else {
                    require_once("./php_configue/attendance_record.php");
               }
          }
          if ($_GET['page'] == $sidebar_iterm[4]) {
               if (isset($_GET['value'])) {
                    $_SESSION['value'] = $_GET['value'];
                    require_once("./php_configue/view_student.php");
               } else {
                    require_once("./php_configue/student_recorde.php");
               }
          }
          if ($_GET['page'] == $sidebar_iterm[5]) {
               require_once("./php_configue/customize.php");
          }
          if ($_GET['page'] == $sidebar_iterm[6]&&!isset($_GET['edit'])) {
               require_once("./php_configue/teacher_profile.php");
          }
          else if(isset($_GET['edit'])){
               require_once("./php_configue/teacher_profile_edit.php");
          }
     } else {
          require_once("./php_configue/font_page.php");
     }

     ?>
</section>