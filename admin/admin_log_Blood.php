<?php

    session_start();
    require "../../includes/db_connect.inc.php";
    $uid = $_SESSION["uid"] ;
    $sql = "select * from admin_info where userid='$uid' ;";
    $results = mysqli_query($conn, $sql);
     $message =       $uPassErr = $oPassErr = $cPassErr =  $opwd = $pwd = $cpwd = $npwd = $uPassToDb = "";



    

    $row= mysqli_fetch_array($results);

     if(isset($_POST['cng_btn'])) {

    if(empty($_POST['opwd']) and empty($_POST['npwd']) and empty($_POST['cpwd'])){
      $oPassErr = "Password cannot be empty!";
      $uPassErr = "Password cannot be empty!";
      $cPassErr = "Password cannot be empty!";
      
    }
    
    else{
      $opwd = mysqli_real_escape_string($conn,$_POST['opwd']);
      $npwd = mysqli_real_escape_string($conn,$_POST['npwd']);
      $cpwd = mysqli_real_escape_string($conn,$_POST['cpwd']);

      $sql = "select password from admin_info where userid = '$uid';";

      $results = mysqli_query($conn, $sql);

      $row= mysqli_fetch_array($results);


      $uPassInDB = $row['password'];

        if(password_verify($opwd, $uPassInDB)){

          if($npwd != $cpwd){
          $cPassErr = "Passwords doesn't match!";
         
          }

        else{

            $PassToDb = password_hash($npwd, PASSWORD_DEFAULT);
       
            mysqli_query($conn,"UPDATE admin_info set password='" . $PassToDb . "'  WHERE userid='$uid'");
            $message = "Password Changed Successfully";


        }
  
    }

    else{
          $oPassErr = "Wrong password!";

          
          
        }

}

    
    

    

     
    


     


    
    
    }

?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hospital Management System</title>


    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/admin_edit_style.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar flex-md-nowrap p-0 shadow fixed-top" style="background-color: #99C2FF; color: white;">
      <img src="../../images/logo.png" width="76px" height="76px">
      <a class="navbar-brand col-sm-8 mr-0" href="admin_dashboard.php" style="text-decoration: none;color: white;"><b>Hospital Management System</b></a>
      <ul class="navbar-nav col-sm-1 mr-auto">
        <li class="nav-item"><a class="nav-link" href="../../forms/aboutus.php" >About Us</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="#">About Us </a></li> -->
      </ul>

      <ul class="navbar-nav col-sm-1 mr-auto">
        <li class="nav-item"><a class="nav-link" href="../forms/logout.php" >Log out</a></li>
              <!-- <li class="nav-item"><a class="nav-link" href="#">About Us </a></li> -->
      </ul>
      <ul class="navbar-nav col-sm-1 mr-auto">
        <li class="nav-item"><a class="nav-link" href="../../support.php" >Support</a></li>
              <!-- <li class="nav-item"><a class="nav-link" href="#">About Us </a></li> -->
      </ul>



    </nav>

    <div class="container-fluid">

        <div class="sidenav">
          <a href="admin_dashboard.php">Dashboard</a>
          <!-- for every dropdown, start here -->
          <button class="dropdown-btn" style="width: 100%;">Admin
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="admin_profile.php">Admin Profile</a>
            <a href="admin_change_password.php">Change Password</a>
          </div>
          <!-- End here -->

          <button class="dropdown-btn" style="width: 100%;">Doctors
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="admin_list_doctor.php">Doctors List</a>
            <a href="admin_appointments_doctor.php">Doctors Appointments</a>
            <a href="admin_request_doctor.php">Doctors Requests</a>
            <a href="admin_add_doctor.php">Add a Doctor</a>
          </div>

          <button class="dropdown-btn" style="width: 100%;">Patients
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="admin_list_patient.php">Patient List</a>
            <!-- <a href="admin_appointments_patient.php">Patients Appointments</a>
            <a href="admin_request_patient.php">Patient Requests</a> -->
            <a href="admin_add_patient.php">Add a Patient</a>
          </div>
          <button class="dropdown-btn" style="width: 100%;">Nurses
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="admin_list_nurse.php">Nurse List</a>
            <a href="admin_appointments_nurse.php">Nurse Appointments</a>
            <!-- <a href="admin_request_nurse.php">Nurse Requests</a> -->
            <a href="admin_add_nurse.php">Add a Nurse</a>
          </div>

          <button class="dropdown-btn" style="width: 100%;">Diagnosis Centre
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="admin_list_lab.php">Lab Test List</a>
            <!-- <a href="admin_request_lab.php">Lab Reports</a> -->
            <a href="admin_techinicians.php">Lab Techinicians</a>
            <a href="admin_add_labTech.php">Add a Lab technician</a>
          </div>
          <button class="dropdown-btn" style="width: 100%;">Accountant
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="admin_list_accountant.php">Accountant List</a>
            <a href="admin_log_payment.php">Payment log</a>
            <a href="admin_add_accountant.php">Add an Accountant</a>
          </div>

          <button class="dropdown-btn" style="width: 100%;">Blood Bank
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="admin_list_bloodbank_staff.php">Blood Bank Staff List</a>
            <a href="admin_log_Blood.php">Blood Log</a>
            <a href="admin_add_bloodbank_staff.php">Add a Blood Bank Staff</a>
          </div>

          <button class="dropdown-btn" style="width: 100%;">Management
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="admin_list_management_staff.php">Management Staff List</a>
            <a href="admin_add_management_staff.php">Add a Management Staff</a>
          </div>

          <button class="dropdown-btn" style="width: 100%;">Physio Therapy
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="admin_list_therapy.php">Therapy List</a>
            <a href="admin_list_physiotherapist.php">Physiotherapist List</a>
            <a href="admin_add_physiotherapist.php">Add a Physiotherapist</a>
          </div>

          <a href="../../feedback.php">Feedback</a>

          <!-- <a href="#contact">Search</a> -->
        </div>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
             <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Blood Log</h1>
          </div>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="container">
            <div class="row row-content align-items-center">

              <div class="col-12">
                
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      
                      <th scope="col">Blood Group</th>
                      <!-- <th scope="col">Blood Group</th> -->
                      <!-- <th scope="col">Gender</th> -->
                      <!-- <th scope="col">Date of Birth</th> -->
                      <th scope="col">Time</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                      <!-- <th scope="col">Actions</th> -->
                      
                     
                     
                      
                    </tr>
                  </thead>
                  <tbody>

                  

                  <?php
                    $sql=mysqli_query($conn,"select * from blood_bank_request where status='donated'");
                    $cnt=1;
                    while($row=mysqli_fetch_array($sql))
                    {
                        // $uid = $row['userid'];

                        if($row['status'] == "confirmed") { $color="green";}  if($row['status'] == "available") { $color="green";} if($row['status'] == "waiting") { $color="#cccc00";} if($row['status'] == "rejected") { $color="red";}
                    ?>
                    <tr>
                      
                      <td class="center"><?php echo $cnt;?>.</td>
                        <!-- <td class="hidden-xs"><?php echo $row['userid'];?></td> -->
                        <!-- <td><?php echo $row['userid'];?></td> -->
                        <td><?php echo $row['Blood_Group'];?> </td>
                        <td><?php echo $row['Time'];?></td>
                        <!-- <td><?php echo $row['day'];?> </td> -->
                        <!-- <td><?php echo $row['ti'];?></td> -->
                        <td><?php echo $row['Date'];?> </td>
                        
                        <td style="color:<?php echo $color;?>;"><?php echo $row['status'];?> </td>
                        <!-- <td><?php echo $row['address'];?></td> -->
                        <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> -->
                        <!-- <td style="white-space:nowrap;"><button name="vst_btn" type="submit" class="btn btn-success" onClick="return confirm('Are you sure you want to proceed ?')">Available<button name="cncl_btn" type="submit" class="btn btn btn-danger ml-1" >Not Available<button name="dne_btn" type="submit" class="btn btn-info ml-1" >Donated<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/></td> </form> -->
                        

                        
                        
                      
                    </tr>
                    <?php 
                    $cnt=$cnt+1;
						}?>

                        
                    
                  </tbody>
                </table>
              </div>
              
            </div>
          </div>
          </form>

        </main>
      </div>
    </div>


    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>


    <script>

    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");

      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      this.classList.toggleClass("rotate");
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }



    </script>



  </body>

</html>
