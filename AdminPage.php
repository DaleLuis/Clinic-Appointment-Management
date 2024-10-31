<html>
    <head>
        <link rel="stylesheet" href="adminmain.css">
    </head>
    <body style="background-image: url(Images/hand.png);">
        <ul>
            <li class="dropdown"><p style="font-size: 40px;color: white;">ADMIN MODE</p></li>
            <br>
            <h2>
                <li class="dropdown">
                    <br><br>
                    <a class="dropbtn">DOCTOR</a>
                    <div class="dropdown-content">
                        <a href="NewDoctor.php">Add new Doctor</a>
                        <a href="DeleteDoctor.php">Delete Doctor</a>
                        <a href="DoctorSchedule.php">Doctor Schedules</a>
                    </div>
                </li>
                <li class="dropdown">
                    <br><br>
                    <a class="dropbtn">CLINIC</a>
                    <div class="dropdown-content">
                        <a href="NewClinic.php">Add new Clinic</a>
                        <a href="DeleteClinic.php">Delete Clinic</a>
                        <a href="AddDoctorToClinic.php">Assign Doctor to a Clinic</a>
                        <a href="DeleteDoctorFromClinic.php">Delete Doctor from a Clinic</a>
                    </div>
                </li>

                <li>
                    <br><br>
                    <form method="POST" action="adminlogin.php">
                        <button type="submit" class="cancelbtn" name="logout" style="float: left;font-size: 20px;">LOGOUT</button>
                    </form>
                </li>
            </h2>
        </ul>
        
        <h1 style="font-size: 40px;color: black;">WELCOME ADMIN</h1>
    </body>
</html>