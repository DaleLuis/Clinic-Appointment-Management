<html>
<head>
<script src="jquerypart.js" type="text/javascript"></script>
<link rel="stylesheet" href="adminmain.css"> 
<script>
function getState(val)
{
	$.ajax
    ({
	    type: "POST",
	    url: "getclinic.php",
	    data:'city='+val,
	    success: function(data)
        {
	    	$("#clinic-list").html(data);
	    }
	});
}
function getDoctorday(val) 
{
	$.ajax
    ({
	    type: "POST",
	    url: "getdoctorday.php",
	    data:'cid='+val,
	    success: function(data)
        {
		    $("#doctor-list").html(data);
    	}
	});
}
</script>
</head>
<body style="background-image: url(Images/Pic10.jpg);">
        <ul>
                <li class="dropdown"><p style=";font-size: 40px;color: white;">ADMIN MODE</p></li>
                <br>
                <h2>
                    <li class="dropdown">
                        <br><br>
                        <a class="dropbtn">DOCTOR</a>
                        <div class="dropdown-content">
                            <a href="NewDoctor.php">Add new Doctor</a>
                            <a href="DeleteDoctor.php">Delete Doctor</a>
                            <a href="ShowDoctor.php">Show all Doctors</a>
                            <a href="DoctorSchedule">Doctor Schedules</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <br><br>
                        <a class="dropbtn">CLINIC</a>
                        <div class="dropdown-content">
                            <a href="NewClinic.php"
                            >Add new Clinic</a>
                            <a href="DeleteClinic.php"
                            >Delete Clinic</a>
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
            <center><h1>REMOVE DOCTOR FROM A CLINIC</h1><hr>
                <form method="post" action=""> 
                <label style="font-size:20px">City:</label>
		    <select name="city" id="city-list" class="demoInputBox"  onChange="getState(this.value);">
		    <option value="">Select City</option>
		    <?php
		        include 'DBconnect.php';
		        $sql1="SELECT distinct city FROM clinic";
                $results=$conn->query($sql1); 
                while($rs=$results->fetch_assoc()) 
                { 
		    ?>
		    <option value="<?php echo $rs["city"]; ?>"><?php echo $rs["city"]; ?></option>
		    <?php
		        }
		    ?>
		    </select>

            <label style="font-size:20px">Clinic:</label>
		    <select id="clinic-list" name="clinic" onchange="getDoctorday(this.value);" >
            <option value="">Select Clinic</option>
		    </select>
		
		    <label style="font-size:20px">Doctor & Time:</label>
		    <select name="doctor" id="doctor-list" >
            <option value="">Select Day & Time</option>
		    </select>
		
		
		    <button name="submit" type="submit">Submit</button>
	    </form>
        <?php
        session_start();
        require_once("includes.html");
        include 'DBconnect.php';
        if(isset($_POST['submit']))
        {
	        $cid=$_POST['clinic'];
	        $rest=$_POST['doctor'];
	        $sql = "DELETE FROM doctor_available WHERE CID= $cid AND DID= $rest";

	        if (mysqli_query($conn, $sql))
		    {
	        	// echo "Record deleted successfully!!";
	        	// header( "Refresh:2; url=DeleteDoctorFromClinic.php");
                echo "<script>
                        swal({ 
                            title: 'Record deleted successfully!!',
                            text: '',
                            type: 'success' 
                            },
                            function(){
                              window.location.href = 'DeleteDoctorFromClinic.php';
                              });
                              </script>";
		    }
	        else
		    {
		    	echo "Error deleting record: " . mysqli_error($conn);
		    }

        }   
        ?>			
    </body>
</html>