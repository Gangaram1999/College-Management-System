<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Display</title>
    <style>
        body{
            background-color: antiquewhite;
            text-align: center;
            font-size: x-large;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 2px solid black;
            text-align: center;
            padding: 8px;
            background-color: aqua;
            font-size: x-large;
        }
        th {
            background-color: aqua;
            font-size: x-large;
        }
    </style>
</head>
<body>

<h2>ALL THE RECORDS OF  REGISTER STUDENTS</h2>
<hr style="height:4px;width:100%;padding-left: 1px; border-width:0;color:red;background-color:red"><br>

<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>District</th>
        </tr>
    </thead>
    <tbody>

    <?php
    // Replace with your database connection details
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "college";

    // Create connection
    $conn = new mysqli($servername, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch records from the database
    $sql = "SELECT * FROM register";
    $result = $conn->query($sql);

    // Display records in the table
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['fname']}</td><td>{$row['lname']}</td><td>{$row['address']}</td><td>{$row['email']}</td><td>{$row['phone']}</td><td>{$row['district']}</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }

    // Close the connection
    $conn->close();
    ?>

    </tbody>
</table>

</body>
</html>
