<?php

$server = "localhost";    //Host Name
        $username = "root";      //DB Username
        $password = "";          //DB Password
        $dbname = "dypcetbus";    //Database Name

        $con = mysqli_connect($server, $username, $password, $dbname);
        if(!$con)
            die("Connection Falied".$mysqli->error);
        
            

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $facultyname = $_POST['facultyname'];
        $department = $_POST['department'];
        $departure = $_POST['departure'];
        $return = $_POST['return'];
        $facultycontact = $_POST['facultycontact'];
        $distance = $_POST['distance'];
        $cost = $_POST['cost'];
        $location1 = $_POST['location1'];
        $location2 = $_POST['location2'];



        

       $query= "INSERT INTO `triprequest` ( `facultyname`, `department` , `departure`,`return`, `facultycontact`, `distance`, `cost` , `location1` , `location2` ) VALUES('$facultyname', '$department','$departure', '$return' , '$facultycontact', '$distance','$cost','$location1','$location2')";

        if (mysqli_query($con, $query)) {
            // Redirect to the dashboard page
            header("Location:faculty_home.html");
            exit; // Make sure to exit after redirection
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con,$query);
    } else {
        echo "Missing form data";
    }
}
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Bus Registration</title>
    <link rel="stylesheet" href="busregstyle.css" />
  </head>
  <body>

    <img class="logod" src="./images/logod1.png" alt="" >
    <section class="container">
      <header> Trip Request Form</header>
      <form action="" class="form" method="post">
        <div class="input-box">
          <label>Faculty Name</label>
          <input type="text"  name="facultyname" placeholder="Enter Faculty name" required >
        </div>

        <div class="input-box">
          <label>Department</label>
          <input type="text"  name="department" placeholder="Enter Department " required >
        </div>
        
        <div class="input-box">
            <div class="column">
                <label> Departure Date</label>
                <input type="date" name="departure" placeholder="Enter Departure" required >
                <label>  Date</label>
                <input type="date" name="return" placeholder="Enter Return" required >
            </div>
        </div>

        <div class="column">
          <div class="input-box">
            <label>Faculty Contact</label>
            <input type="number" name="facultycontact" placeholder="Enter Faculty Contact" required >
          </div>
        </div>
        
        <div class="column">
          <div class="input-box">
            <label>Total Distance</label>
            <input type="number" name="distance" placeholder="Enter distance in km" required >
            <label>Estimated Cost</label>
            <input type="number" name="cost" placeholder="Enter Cost in INR" required >
          </div>
        </div>

        <div class="input-box address">
            <div class="input-box">
            <label>Trip Location</label>
            </div>

            <div class="input-box">
            <div class="column">
                <label> 1st</label>
                <input type="text" name="location1" placeholder="Enter Location 1" required >
                <label> 2nd</label>
                <input type="text" name="location2" placeholder="Enter Location 2" >
            </div>
            </div>
        </div>
        <div class="input-box button">
          <input type="Submit" name="submit" value="Submit">
        </div>
        <!-- <button type="Submit" name="submit" value="Submit">
            Submit
        </button> -->
      </form>
    </section>
  </body>
</html>
