<?php
function fetch_data($sql, $conn)
{
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0 && $num < 2) {
        return mysqli_fetch_assoc($result);
    } else {
        return NULL;
    }
}
function isfetch($req, $conn)
{
    $result = mysqli_query($conn, $req);
    $num = mysqli_num_rows($result);
    for ($i = 0; $i < $num; $i++) {
        $row = mysqli_fetch_assoc($result);
        $res[$i] = $row;
    }

    $conn = null;
    return $res;
}

function dropdwn($sql, $conn, $def)
{   
    $result = isfetch($sql, $conn);
    foreach ($result as $key => $row) {
        $id = $row['id'];
        $nameOption = $row['name'];
        echo '<option value="'.$id.'"';
        if ($def == $id) {
            echo ' selected';
                echo '> '. $nameOption . ' (Selected)';
        } else {
            echo '>'. $nameOption;
        }
        echo '</option>';
    }
    return null;
}
function showTable($conn, $sql, $tableHeaders) {
    // Execute query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display table if there are results
        echo "<table class='custom-table'>";
        echo $tableHeaders; // Output table headers
        
        // Output data of each row using foreach loop
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                if ($key !== 'id') {
                    echo "<td>" . $value . "</td>";
                }
            }
            // Add a link in the last column with row ID as GET parameter
            echo "<td><a href='?page=customization&edit=" . $row['id'] . "'>Link</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
