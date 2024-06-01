<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile</title>
    <link rel="stylesheet" href="./css/teacherprofile.css">
</head>
<body>
<div class="container_teacher_profile">
    <?php
    // Include necessary files
    require_once("./php_function/fun.php");
    require_once("./php_configue/mysql2.php");

    // Fetch teacher details
    $sql = "SELECT tl.name, tl.date_of_birth, tl.gender, tl.qualification, tl.city, ca.city_name, tl.state, sa.state_name, tl.contact, tl.email FROM teacher_list tl JOIN all_states sa ON tl.state = sa.state_code JOIN all_cities ca ON tl.city = ca.city_key WHERE tl.teacher_key = 3";
    $result = fetch_data($sql, $conn);

    if (!empty($result)) {
        $row = $result;
    ?>
    <div class="grid-container">
        <div class="grid-item">
            <img src="./image/teacher.png" alt="Profile Picture">
            <div class="details">
                <h2>Personal Details</h2>
                <p><span class="field-name">Name:</span> <?php echo $row['name']; ?></p>
                <p><span class="field-name">Date of Birth:</span> <?php echo $row['date_of_birth']; ?></p>
                <p><span class="field-name">Gender:</span> <?php echo $row['gender']; ?></p>
            </div>
        </div>
        <div class="grid-item">
            <div class="details">
                <h2>Teacher Details</h2>
                <p><span class="field-name">Qualification:</span> <?php echo $row['qualification']; ?></p>
                <p><span class="field-name">City:</span> <?php echo $row['city_name']; ?></p>
                <p><span class="field-name">State:</span> <?php echo $row['state_name']; ?></p>
                <p><span class="field-name">Contact:</span> <?php echo $row['contact']; ?></p>
                <p><span class="field-name">Email:</span> <?php echo $row['email']; ?></p>
            </div>
        </div>
    </div>
    <button class="edit-btn" onclick="location.href='?page=profile&edit=true'">Edit</button>
    <?php
    } else {
        echo "No results found.";
    }

    // Close connection (not needed since $conn is closed automatically in mysql2.php)
    // $conn->close();
    ?>
</div>
</body>
</html>
