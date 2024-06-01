<?php session_start();
$email =  $_SESSION["email"];
require_once("../php_configue/mysql.php");
$sql = "select * FROM admin_data WHERE email = '$email'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num){
    $action = '';
}
else $action = "disabled";

$promt = "value=" . $email . " required $action";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/teacherForm-style.css">
    <title>Document</title>
</head>

<body>
    <div id="main">
        <div class="container">
            <h1>Teacher detalis</h1>
            <p>Empower Education: Fill Up Your Teacher Details Today!</p>
            <form action="../php_from/teacherdetalis.php" method="post">
                <div class="column1 flex-row">
                    <div class="row1 flex-column">
                        <label for="name-teacher">Name</label>
                        <input type="text" name="teacher-name" maxlength="40" id="name-teacher" required>
                    </div>
                    <div class="row2 flex-column">
                        <label for="date-of-birth">Date of birth</label>
                        <input type="date" name="dob" id="date-of-birth" value="" required>
                    </div>
                </div>
                <div class="column2 flex-column">
                    <div class="row1 flex-column">
                        <label for="">Gender</label>
                        <div class="flex-row">
                            <input type="radio" name="gender" id="male" value="male" required>
                            <label for="male">male</label>
                            <input type="radio" name="gender" id="female" value="female" required>
                            <label for="female">female</label>
                            <input type="radio" name="gender" id="other" value="other" required>
                            <label for="other">other</label>
                        </div>
                    </div>
                    <div class="row2 flex-column">
                        <label for="quality">Qualification</label>
                        <input type="text" name="quality" id="quailty" required>
                    </div>
                </div>
                <div class="column3 flex-row">
                    <div class="row2 flex-column">
                        <label for="state">state</label>
                        <select name="state" id="state" required></select>
                    </div>
                    <div class="row1 flex-column">
                        <label for="city">city</label>
                        <select name="city" id="city" required></select>
                    </div>
                </div>
                <div class="column4">
                    <div class="row2 flex-column">
                        <label for="contact flex-column">contact</label>
                        <input type="text" name="contact" id="contact" maxlength="10" required>
                    </div>
                    <div class="row1 flex-column">
                        <div class="flex-row">
                            <label for="email">email</label>
                            <code class="error_text">Email is verified for contact us...</code>
                        </div>
                        <input type="email" name="email" id="email" <?php echo $promt ?>>
                    </div>
                </div>
                <div class="btn-group flex-row">
                    <input type="reset" value="reset">
                    <input type="submit" name="teacher-detail" value="submit">
                </div>
            </form>
        </div>
    </div>
    <script src="../js/teacherfrom.js"></script>
</body>

</html>