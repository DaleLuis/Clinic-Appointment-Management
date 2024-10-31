<?php
session_start();
require_once("includes.html");
$conn = mysqli_connect('localhost', 'root', '', 'appointment');

// Check database connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['signup'])) {
    // Retrieve and sanitize form data
    $name = mysqli_real_escape_string($conn, $_POST['name1']);
    $dob = mysqli_real_escape_string($conn, $_POST['DOB']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $username = mysqli_real_escape_string($conn, $_POST['username1']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['pwd1'], PASSWORD_DEFAULT); // Hash the password

    // Check if email already exists in the database
    $query = "SELECT * FROM PATIENT WHERE EMAIL='$email'";
    $data = mysqli_query($conn, $query);
    if (!$data) {
        die("Error in select query: " . mysqli_error($conn));
    }

    $num = mysqli_num_rows($data);

    if ($num == 1) {
        // If email exists, show an error message
        echo "<script>
            swal({ 
                title: 'Email already exists!',
                text: 'Please register using another email ID.',
                type: 'error' 
            }, function(){
                window.location.href = 'InsertSgnup.php';
            });
        </script>";
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO patient(name, gender, dob, phone, username, password, email) 
                VALUES ('$name', '$gender', '$dob', '$contact', '$username', '$password', '$email')";
        $data = mysqli_query($conn, $sql);

        if ($data) {
            // Success message after inserting data
            echo "<script>
                swal({ 
                    title: 'Sign Up Successful!',
                    text: 'Welcome!',
                    type: 'success' 
                }, function(){
                    window.location.href = 'Login.php';
                });
            </script>";
        } else {
            // Error message if insertion fails
            die("Error in insert query: " . mysqli_error($conn));
        }
    }
}
?>