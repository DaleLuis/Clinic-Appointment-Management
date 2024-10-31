<html>
<head>
  <link rel="stylesheet" href="adminmain.css">
</head>
<body style="background-image: url(Images/Pic10.jpg);">
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
          <a href="ShowDoctor.php">Show all Doctors</a>
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
          <a href="ShowClinic.php">Show the Clinics</a>
        </div>
      </li>

      <li>
        <br><br>
        <form method="POST" action="AdminLogin.php">
          <button type="submit" class="cancelbtn" name="logout" style="float: left;font-size: 20px;">LOGOUT</button>
        </form>
      </li>
    </h2>
  </ul>
  <center>
    <h1>DELETE DOCTOR</h1><hr>
    <form method="post" action="deletedocfromdb.php">  
      <p>Enter DID:<center><input type="number" name="did"></center>
       <button type="submit" name="submit1">Delete by DID</button>
       <br><p>---------OR---------<br>
        <p>Select Name:<br>
          <?php
          require_once('DBconnect.php');
          $doctor_result = $conn->query('select * from doctor order by DID ASC');
          ?>
          <center>
            <select name="doctorname">
              <option value="">---Select Name---</option>
              <?php
              if ($doctor_result->num_rows > 0) 
              {
                while($row = $doctor_result->fetch_assoc())
                {
                  ?>
                  <option value="<?php echo $row["DID"]; ?>"><?php echo "(DID= $row[DID]) Dr. ".$row["name"]; ?></option>
                  <?php
                }
              }
              ?>
            </select>
          </center>

          <button type="submit" name="submit2">Delete by Name</button>
        </form>			
        
      </body>
      </html>