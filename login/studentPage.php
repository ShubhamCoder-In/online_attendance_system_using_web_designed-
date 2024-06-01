<?php session_start(); $email =  $_SESSION["email"];
$promt = "value=".$email." required disabled";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/studentform-style.css">
    <title>Document</title>
</head>

<body>
    <form action="../php_from/studentdetail.php" method="POST" onsubmit="return Tosubmit()" >
        <h1>student detail</h1>
        <br>
        <p>Attention Students: Complete Your Profile for a Seamless Experience!</p>
        <br>
        <div class="column-div">
            <label for="name">name<span>*</span></label>
            <input type="text" name="student-name" id="student-name" required>
        </div>
        <div class="flex-div">
            <div class="column-div">
                <label for="">date of birth<span>*</span></label>
                <input type="date" name="student-dob" id="student-dob" required>
            </div>
            <div class="column-div">
                <label for="">gender<span>*</span></label>
                <div class="flex-div">
                    <input type="radio" name="student-gender" id="male" value="male" required>
                    <label for="male">male</label>
                    <input type="radio" name="student-gender" id="female" value="female" required>
                    <label for="female">female</label>
                    <input type="radio" name="student-gender" id="other" value="other" required>
                    <label for="other">other</label>
                </div>
            </div>
        </div>
        </div>
        <div class="flex-div">
            <div class="column-div">
                <label for="">state<span>*</span></label>
                <select name="state" id="state" required></select>
            </div>
            <div class="column-div">
                <label for="">city<span>*</span></label>
                <select name="city" id="city">
                    <option value="">-- select --</option>
                </select>
            </div>
        </div>
        <div class="column-div">
            <label for="course">course<span>*</span></label>
            <select name="course" id="course" required>
                <option value="">-- select --</option>
            </select>
        </div>
        <div class="flex-div">
            <div class="column-div">
                <label for="branch">brance<span>*</span></label>
                <select name="branch" id="branch" required>
                    <option value="">-- select --</option>
                </select>
            </div>
            <div class="column-div">
                <label for="semester">semester<span>*</span></label>
                <select name="semester" id="semester" required>
                    <option value="">-- select --</option>
                </select>
            </div>
        </div>
        <div class="column-div">
            <label for="">contact<span>*</span></label>
            <input type="text" maxlength="10" name="contact" id="contact" required>
        </div>
        <div class="column-div">
            <div class="flex-div">
                <label for="">email<span>*</span></label>
                <code class="error_text">Email is verified for contact us...</code>
            </div>
            <input type="email" name="student-email" id="student-email" <?php echo $promt?>>
        </div>
        <div class="flex-div" style="padding: 20px; gap: 20px;">
            <label for="">session<span>*</span></label>
            <select name="college-session" id="session-college" required>
                <option value="">select-session</option>
                <option value="2020-2024">2020-2024</option>
                <option value="2021-2025">2021-2025</option>
                <option value="2022-2026">2022-2026</option>
                <option value="2023-2027">2023-2027</option>
                <option value="2021-2024">2021-2026</option>
                <option value="2022-2025">2022-2024</option>
                <option value="2023-2026">2023-2027</option>
                <option value="other">other</option>
            </select>

        </div>
        <br><br>
        <div class="flex-div group-btn"><button type="reset">reset</button>
            <button type="submit" name="student-detail" value="submit">submit</button>
        </div>
    </form>
    <script src="../js/studentfrom.js"></script>
</body>

</html>