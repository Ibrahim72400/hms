<?php

    session_start();
    require "../../includes/db_connect.inc.php";

    $uspec = $degree = $msg = "" ;
    $uid= null;
    $did= null;

    $message = "";
    
    $Pass = $fName = $uEmail = $uPass =  $uPhone = $uDob = $spec = $der = $ter =   $userGender = $userAllergy = $userBlood = $userspec = $uPassToDb = $days = $degree = $dd =  $dg = $userid = $fees = $userTimeErr = $errExists = $userIdErr = $userPassErr = $userFnameErr = $userEmailErr = $userPhoneErr = $userAddErr = $userAddErr = $userDobErr = $userTimeErr = $userFeesErr = $time =  $etime = $stime = $userAdd = "" ;
    $userday = $usertime = $usertime =  $dter = "" ;

    $uid = $_SESSION["uid"] ;
    $did = $_SESSION["id"] ;
    $sql = "select * from lab_test_info where id='$did' ;";
    $results = mysqli_query($conn, $sql);


    

    $row= mysqli_fetch_array($results);

    if(isset($_POST['nxt_btn'])) {

        if(empty($_POST['day']) and empty($_POST['time']) and empty($_POST['date'])){

            $der = "Day cannot be empty!";
            $ter = "Time cannot be empty!";
            $dter = "Date cannot be empty!";

        }

        else{

            $userspec = mysqli_real_escape_string($conn, $_POST['spec']);
            $userday = mysqli_real_escape_string($conn, $_POST['day']);
            $usertime = mysqli_real_escape_string($conn, $_POST['time']);
            $userdate = mysqli_real_escape_string($conn, $_POST['date']);
            $_SESSION["spec"] = $userspec;
            $_SESSION["day"] = $userday;
            $_SESSION["time"] = $usertime;
            $_SESSION["date"] = $userdate;
            header("Location: patient_list_lab_3.php");


        }


        




    }


    if(isset($_POST['bck_btn'])) {

        header("Location: patient_list_lab_1.php");



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
    <nav class="navbar flex-md-nowrap p-0 shadow fixed-top" style="background-color: #99C2FF; color: white; ">
      <img src="../../images/logo.png" width="76px" height="76px">
      <a class="navbar-brand col-sm-8 mr-0" href="patient_dashboard.php" style="text-decoration: none;color: white;"><b>Hospital Management System</b></a>
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
          <a href="patient_dashboard.php">Dashboard</a>
          <!-- for every dropdown, start here -->
          <button class="dropdown-btn" style="width: 100%;">Profile
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="patient_profile.php">My Profile</a>
            <a href="patient_update_profile.php">Update Profile</a>
            <a href="patient_change_password.php">Change Password</a>
            
          </div>
          <!-- End here -->

          <button class="dropdown-btn" style="width: 100%;">Doctors
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="patient_list_doctor.php">Doctors List</a>
            
          </div>


          <button class="dropdown-btn" style="width: 100%;">Appointments
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="patient_list_appoitment.php">My Appointments</a>
            
          </div>

          
          <button class="dropdown-btn" style="width: 100%;">Blood Bank
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="patient_request_blood.php">Request for a Blood</a>
             <a href="patient_list_request_blood.php">Blood Requests</a>
           
          </div>

          <button class="dropdown-btn" style="width: 100%;">Diagnosis Centre
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="patient_list_lab.php">Lab Test List</a>
            <a href="patient_list_lab_reports.php">My Lab Reports</a>
            <a href="patient_list_request_lab.php">My Lab Requests</a>
            
          </div>
         

          <button class="dropdown-btn" style="width: 100%;">Physio Therapy
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="patient_list_physio_therapy.php">Physio Therapy List</a>
            <a href="patient_list_request_therapy.php">Physio Therapy Requests</a>
            
          </div>


           <button class="dropdown-btn" style="width: 100%;">Payment
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="patient_list_payments.php">My Payments</a>
            
          </div>

          

          <a href="../../feedback.php">Feedback</a>

          <!-- <a href="#contact">Search</a> -->
        </div>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Please fill up the form :</h1>
          </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

          <div class="container">
            <div class="row pt-5">

              <div class="col-5">
                Visiting Day :
              </div>

              <div class="">
                <input type="text" name="day" value="" placeholder="Type day only"> <span style="color:blue;"> <?php echo "Available : " .$row['days']; ?> </span>
              </div>
             

            </div>

            <div class="row pt-1"> <div class="col-5"> </div> <div class=""> <span style="color:red;"><?php echo $der; ?> </span> </div> </div>

            


            <div class="row pt-3">

              <div class="col-5">
                Visiting Time :
              </div>

              <div class="">
                <input type="time" name="time" value=""> <span style="color:blue;"> <?php echo "Available at : " .$row['time']; ?> </span>
              </div>
              

            </div>

            <div class="row pt-1"> <div class="col-5"> </div> <div class=""> <span style="color:red;"><?php echo $ter; ?> </span> </div> </div>




            <div class="row pt-3">

              <div class="col-5">
                Visiting Date :
              </div>

              <div class="">
                <input type="date" name="date" value=""> 
              </div>
              

            </div>

            <div class="row pt-1"> <div class="col-5"> </div> <div class=""> <span style="color:red;"><?php echo $dter; ?> </span> </div> </div>






            

           

            


            

           

            <div class="row pt-5 pb-5 ">

              <div class="col-12 text-center align-items-center"  >
                  <button name="nxt_btn" class="btn btn-primary btn-lg" type="submit" > Next </button>   <button name="bck_btn" class="btn btn-primary btn-lg" type="submit" > Back </button> 
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
