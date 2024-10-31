<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
<style>
    table
    {
        width:80%;
        border-collapse:separate;
        border: 5px black;
        padding: 2px;
        font-size: 30px;
        font-family: "Roboto Condensed", sans-serif;
    }
    th
    {
        border: 2px black;
        background-color:peru ;
        color: white;
        text-align: left;
    }
    tr,td
    {
        border: 2px black;
        background-color: whitesmoke;
        color:black;
    }
</style>
</head>
<body>
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'appointment');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

    $sql = "SELECT * FROM booking";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<br><h2>Total Appointments=<b>" . mysqli_num_rows($result) . "</b></h2><br>";
        echo "<table>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>CID</th>
            <th>DID</th>
            <th>DOV</th>
            <th>Timestamp</th>
            <th>Status</th>
        </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['Fname'] . "</td>";
            echo "<td>" . $row['CID'] . "</td>";
            echo "<td>" . $row['DID'] . "</td>";
            echo "<td>" . $row['DOV'] . "</td>";
            echo "<td>" . $row['Timestamp'] . "</td>";
            echo "<td>" . $row['Status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } 
    else {
        echo "Error retrieving appointments: " . mysqli_error($conn);
    }

mysqli_close($conn);
?>
</body>
</html>
