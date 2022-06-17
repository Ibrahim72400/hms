
<?php

    session_start();
    require "../../includes/db_connect.inc.php";

    $uspec = $degree = $msg = "" ;
    $uid= null;
    
    $Pass = $fName = $uEmail = $uPass =  $uPhone = $uDob = $spec = $userGender = $userBlood = $userspec = $uPassToDb = $days = $degree = $dd =  $dg = $userid = $fees = $userTimeErr = $errExists = $userIdErr = $userPassErr = $userFnameErr = $userEmailErr = $userPhoneErr = $userAddErr = $userAddErr = $userDobErr = $userTimeErr = $userFeesErr = $time =  $etime = $stime = "" ;



    $sql = "select max(userid) from doctor_info;";
      if($results = mysqli_query($conn, $sql)){

        while($row = mysqli_fetch_row($results)){
          $tempid = $row[0];

          if($tempid == null){

            $uid = "2001" ;
          }

        
          else{
            $uid = $tempid + 1;
          }

          
        }
      }


    if($_SERVER["REQUEST_METHOD"]=="POST"){

      

      

 
      if(isset($_POST['add_btn'])){


        if(empty($_POST['userid'])){
          $userIdErr = "Please click on auto id!";
          $errExists = 1;
          }else{
            $userid = mysqli_real_escape_string($conn, $_POST['userid']);
          }

          if(empty($_POST['password'])){
          $userPassErr = "Please Enter Password";
          $errExists = 1;
          }else{
            $Pass = mysqli_real_escape_string($conn, $_POST['password']);
          }


          if(empty($_POST['fname'])){
          $userFnameErr = "Please Enter Fullname";
          $errExists = 1;
          }else{
            $fName = mysqli_real_escape_string($conn, $_POST['fname']);
          }


          if(empty($_POST['email'])){
          $userEmailErr = "Please Enter Email";
          $errExists = 1;
          }else{
            $uEmail = mysqli_real_escape_string($conn,$_POST['email']);
          }

        
          if(empty($_POST['phone'])){
          $userPhoneErr = "Please Enter Phone Number";
          $errExists = 1;
          }else{
            $uPhone = mysqli_real_escape_string($conn,$_POST['phone']);
          }


          if(empty($_POST['address'])){
          $userAddErr = "Please Enter Address";
          $errExists = 1;
          }else{
           $uAddress = mysqli_real_escape_string($conn,$_POST['address']);
          }
        
        
          if(empty($_POST['dob'])){
          $userDobErr = "Please Enter Date of Birth";
          $errExists = 1;
          }else{
           $uDob = mysqli_real_escape_string($conn,$_POST['dob']);
          }

          if(empty($_POST['stime']) and empty($_POST['etime'])){
          $userTimeErr = "Please Enter Time";
          $errExists = 1;
          }else{
           $stime = mysqli_real_escape_string($conn,$_POST['stime']);
           $etime = mysqli_real_escape_string($conn,$_POST['etime']);
          }


          if(empty($_POST['fees'])){
          $userFeesErr = "Please Enter Date of Birth";
          $errExists = 1;
          }else{
           $fees = mysqli_real_escape_string($conn,$_POST['fees']);

          }
        
        
        if(isset($_POST['days']) && $_POST['degree']!="")
          {
              echo 'checked'; 
              $days = $_POST['days'];
              $degree = $_POST['degree'];
              foreach ($days as $chk1){ 
                  $dd .= $chk1.",";
              }

              foreach ($degree as $chk2){ 
                  $dg .= $chk2.",";
              }
          }

          
        
        
        $time = $stime . "-" . $etime ;


        

        



        




        if(empty($_POST['gender']) and empty($_POST['blood_group']) and empty($_POST['spec'])){
        $genderErr = "Gender cannot be empty!";
        $bloodErr = "Blood Group cannot be empty!";
        $spec = "Specialties cannot be empty!";
        $errExists = 1;
        }else{
        $userGender = mysqli_real_escape_string($conn, $_POST['gender']);
        $userBlood = mysqli_real_escape_string($conn, $_POST['blood_group']);
        $userspec = mysqli_real_escape_string($conn, $_POST['spec']);
        }

        $uPassToDb = password_hash($uPass, PASSWORD_DEFAULT);


        if($errExists != 1){


          $sqlUers = "select userid from doctor_info where userid = '$userid'";
          $results = mysqli_query($conn, $sqlUers);

          $rowCount = mysqli_num_rows($results);

          if($rowCount > 0){
            $userIdErr = "User already exists!";
            

          }
          else{

      
        $sqlUserInsert = "insert into doctor_info (userid,password,fullname,blood_group,gender, email, phone,fees,specialization,days,time, dob,address,degree)
        values ('$userid','$uPassToDb','$fName','$userBlood','$userGender',  '$uEmail',  '$uPhone','$fees','$userspec','$dd','$time', '$uDob' ,'$uAddress','$dg');";

        if(mysqli_query($conn, $sqlUserInsert)){

        $msg = "Doctor was successfully Added";

        
        }

        else{

          $msg = "Doctor was not added";
        }
      }


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
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="css/admin_add_style.css" rel="stylesheet">


  </head>

  <body>
    <nav class="navbar flex-md-nowrap p-0 shadow fixed-top" style="background-color: #99C2FF; color: white;">
      <img src="../../images/logo.png" width="76px" height="76px">
      <a class="navbar-brand col-sm-8 mr-0" href="admin_dashboard.php" style="text-decoration: none;color: white;"><b>Hospital Management System</b></a>
      <ul class="navbar-nav col-sm-1 mr-auto">
        <li class="nav-item"><a class="nav-link" href="../../forms/aboutus.php" style="text-decoration: none;">About Us</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="#">About Us </a></li> -->
      </ul>

      <ul class="navbar-nav col-sm-1 mr-auto">
        <li class="nav-item"><a class="nav-link" href="../forms/logout.php" style="text-decoration: none;">Log out</a></li>
              <!-- <li class="nav-item"><a class="nav-link" href="#">About Us </a></li> -->
      </ul>
      <ul class="navbar-nav col-sm-1 mr-auto">
        <li class="nav-item"><a class="nav-link" href="../../support.php" style="text-decoration: none;">Support</a></li>
              <!-- <li class="nav-item"><a class="nav-link" href="#">About Us </a></li> -->
      </ul>



    </nav>

    <div class="container-fluid pb-5">

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
            <!-- <a href="admin_appointments_patient.php">Patients Appointments</a> -->
            <!-- <a href="admin_request_patient.php">Patient Requests</a> -->
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
            <a href="admin_list_technicians.php">Lab Techinicians</a>
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

          <a href="../../forms/feedback.php">Feedback</a>

          <!-- <a href="#contact">Search</a> -->
        </div>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 ">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add a Doctor</h1>
          </div>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="container">

            <div class="row">

              <div class="col-5">
                Userid :
              </div>

              <div class="">
                <input type="number" name="userid" value="<?php echo $uid; ?>" readonly="readonly" placeholder="userid">  <span style="color:red;"> <?php echo $userIdErr; ?> </span>
              </div>

            </div>

            <div class="row pt-3">

              <div class="col-5">
                Password :
              </div>

              <div class="">
                <input type="password" name="password" value="" placeholder="password"> <span style="color:red;"> <?php echo $userPassErr; ?> </span>
              </div>

            </div>


            <div class="row pt-3">

              <div class="col-5">
                Fullname :
              </div>

              <div class="">
                <input type="text" name="fname" value="" placeholder="fullname"> <span style="color:red;"> <?php echo $userFnameErr; ?> </span>
              </div>

            </div>



            <div class="row pt-3">

              <div class="col-5">
                Email :
              </div>

              <div class="">
                <input type="email" name="email" value="" placeholder="email"> <span style="color:red;"> <?php echo $userEmailErr; ?> </span>
              </div>

            </div>



            <div class="row pt-3">

              <div class="col-5">
                Phone :
              </div>

              <div class="">
                <input type="number" name="phone" value="" placeholder="phone"> <span style="color:red;"> <?php echo $userPhoneErr; ?> </span>
              </div>

            </div>


            <div class="row pt-3">

              <div class="col-5">
                Address : 
              </div>

              <div class="">
                <input type="text" name="address" value="" placeholder="Address"> <span style="color:red;"> <?php echo $userAddErr; ?> </span>
              </div>

            </div>


            <div class="row pt-3">

              <div class="col-5">
                Consulting Fees : 
              </div>

              <div class="">
                <input type="number" name="fees" value="" placeholder="Consulting Fees"> <span style="color:red;"> <?php echo $userFeesErr; ?> </span>
              </div>

            </div>

              

            <div class="row pt-3">

              <div class="col-5">
                Date of Birth :
              </div>

              <div class="">
                <input type="text" placeholder="Date of Birth" onfocus="(this.type='date')" onblur="(this.type='text')" name="dob" > <span style="color:red;"> <?php echo $userDobErr; ?> </span>
              </div>

            </div>
            <div class="row pt-3">

              <div class="col-5">
                Gender :
              </div>

              <div class="col-2">
                <select class="custom-select" id="inputGroupSelect01" name="gender">
                <option selected disabled>Choose...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>

                </select>
              </div>

            </div>


            <div class="row pt-3">

              <div class="col-5">
                Blood Group :
              </div>

              <div class="col-2">
                <select class="custom-select" id="inputGroupSelect01" name="blood_group">
                <option selected disabled>Choose...</option>
                <option value="A+"> A+</option>
                <option value="A-"> A-</option>
                <option value="B+"> B+</option>
                <option value="B-"> B-</option>
                <option value="AB+"> AB+</option>
                <option value="AB-"> AB-</option>
                <option value="O+"> O+</option>
                <option value="O-"> O-</option>

                </select>
              </div>

            </div>




            <div class="row pt-3">

              <div class="col-5">
                Specialty :
              </div>

              <div class="col-2">
                <select class="custom-select" id="inputGroupSelect01" name="spec">
                <option selected disabled>Choose...</option>
                <option value="Allergists/Immunologist" <?php if($uspec == "Allergists/Immunologist") echo "selected" ?>>Allergists/Immunologist</option>
                <option value="Anesthesiologist"<?php if($uspec == "Anesthesiologist") echo "selected" ?>>Anesthesiologist</option>
                 <option value="Colon and Rectal Surgeon"<?php if($uspec == "Colon and Rectal Surgeon") echo "selected" ?>>Colon and Rectal Surgeon</option>
                <option value="Neurologist"<?php if($uspec == "Neurologist") echo "selected" ?>>Neurologist</option>
                 <option value="Obstetrician/gynecologist"<?php if($uspec == "Obstetrician/gynecologist") echo "selected" ?>>Obstetrician/gynecologist</option>
                <option value="Ophthalmologist"<?php if($uspec == "Ophthalmologist") echo "selected" ?>>Ophthalmologist</option>
                 <option value="Medicine"<?php if($uspec == "Medicine") echo "selected" ?>>Medicine</option>
                <option value="Dermatologist"<?php if($uspec == "Dermatologist") echo "selected" ?>>Dermatologist</option>
                 <option value="Gastroenterologist"<?php if($uspec == "Gastroenterologist") echo "selected" ?>>Gastroenterologist</option>
                <option value="Eye Specialist"<?php if($uspec == "Eye Specialist") echo "selected" ?>>Eye Specialist</option>
                 <option value="Ear-Nose-Throat(ENT) Specialist"<?php if($uspec == "Ear-Nose-Throat(ENT) Specialist") echo "selected" ?>>Ear-Nose-Throat(ENT) Specialist</option>
                <option value="Dentist"<?php if($uspec == "Dentist") echo "selected" ?>>Dentist</option>
                 <option value="Critical care Medicine Specialist"<?php if($uspec == "Critical care Medicine Specialist") echo "selected" ?>>Critical care Medicine Specialist</option>
                <option value="Cardiologist"<?php if($uspec == "Cardiologist") echo "selected" ?>>Cardiologist</option>

                </select>
              </div>

            </div>

            <div class="row pt-3">

              <div class="col-5">
                Degree :
              </div>

              <div class="col-2" style="white-space:nowrap;">
                <input type="checkbox" name="degree[]" value="MBBS"  > MBBS
                <input type="checkbox" name="degree[]" value="FCPS"  > FCPS
                <input type="checkbox" name="degree[]" value="MD"  > MD
                <input type="checkbox" name="degree[]" value="MS"  > MS
                <input type="checkbox" name="degree[]" value="Mphil"  > Mphil
                <input type="checkbox" name="degree[]" value="FRCS"  > FRCS
                <input type="checkbox" name="degree[]" value="BDS"  > BDS
                <input type="checkbox" name="degree[]" value="DO"  > DO
                
              </div>

            </div>


            <div class="row pt-3">

              <div class="col-5">
                Visiting Days :
              </div>

              <div class="col-2" style="white-space:nowrap;">
                <input type="checkbox" name="days[]" value="friday"  > friday
                <input type="checkbox" name="days[]" value="saturday"  > saturday
                <input type="checkbox" name="days[]" value="sunday"  > sunday
                <input type="checkbox" name="days[]" value="monday"  > monday
                <input type="checkbox" name="days[]" value="tuesday"  > tuesday
                <input type="checkbox" name="days[]" value="wednesday"  > wednesday
                <input type="checkbox" name="days[]" value="thursday"  > thursday
                
                
              </div>

            </div>

            <div class="row pt-3">

              <div class="col-5">
                Visiting Time :
              </div>

              <div class="col-2" style="white-space:nowrap;">
                Starting Time <input type="time" name="stime">  Ending Time<input type="time" name="etime">  <span style="color:red;"> <?php echo $userTimeErr; ?> </span>
                
                
              </div>

            </div>

            <div class="row pt-5 ">

              <div class="col-12 text-center align-items-center"  >
                  <button name="add_btn" class="btn btn-primary btn-lg" type="submit" >Add Doctor</button>  <span style ="color:red;"><?php echo $msg; ?></span>
            </div>
            </div>





            </div>
            </form>
            


        </main>
      </div>
    </div>


    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>


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
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }
    </script>



  </body>

</html>
