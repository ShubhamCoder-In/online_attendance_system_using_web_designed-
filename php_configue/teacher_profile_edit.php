<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher Profile</title>
    <style>
        .container-div {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .container-div input[type="date"],
        .container-div input[type="text"],
        .container-div input[type="email"],
        .container-div select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .container-div [type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
         .container-div label{
            display: inline-block;
            padding-bottom: 10px;
         }
         .container-div h2{
            padding: 10px;
         }
        .container-div input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container-div">
        <h2>Edit Teacher Profile</h2>
        <?php
        // Include necessary files
        require_once("./php_configue/mysql2.php");
        require_once("./php_function/fun.php");
        // Fetch teacher details
        $teacher_key = $_SESSION['id']; // Change this to the teacher's key you want to edit
        $sql = "SELECT * FROM teacher_list WHERE teacher_key = $teacher_key";
        $result = fetch_data($sql, $conn);
        if (!empty($result)) {
            $row = $result;
        ?>
            <form action="./php_from/teache_querry_update.php" method="post">
                <input type="hidden" name="teacher_key" value="<?php echo $teacher_key; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo $row['date_of_birth']; ?>" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                    <option value="Other" <?php echo ($row['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                </select>

                <label for="qualification">Qualification:</label>
                <input type="text" id="qualification" name="qualification" value="<?php echo $row['qualification']; ?>" required>

                <label for="state">State:</label>
                <select id="state" name="state" required onchange="fetchCities(this.value)">
                    <?php
                    $state_sql = "SELECT s.state_code as id, s.state_name as name FROM `all_states` s ";
                    dropdwn($state_sql, $conn, $row['state']);
                    ?>
                </select>

                <label for="city">City:</label>
                <select id="city" name="city" required">
                    <?php
                    $state =  $row['state'];
                    $city_sql = "SELECT c.city_key as id, c.city_name as name FROM `all_cities` c WHERE c.state_code = $state";
                    dropdwn($city_sql, $conn, $row['city']);
                    ?>
                </select>

                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" value="<?php echo $row['contact']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" disabled>

                <input type="submit" value="Update">
            </form>
        <?php
        } else {
            echo "Teacher not found.";
        }
        ?>
    </div>
    <script>
        document.getElementById("state").addEventListener("change", function() {
            var selectedState = this.value;
            fetch("./php_configue/state2.php?state=" + selectedState)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then((data1) => {
                    var citySelect = document.getElementById("city");
                    citySelect.innerHTML = '<option value="">Select City</option>';
                    data1.forEach((city) => {
                        var option = document.createElement("option");
                        option.text = city.city;
                        option.setAttribute("value", city.code);
                        citySelect.add(option);
                    });
                })
                .catch(() => {
                    console.log("Something went wrong");
                });
        });
    </script>
</body>

</html>