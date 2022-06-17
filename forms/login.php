<?php
 
  include "../includes/db_connect.inc.php";

  session_start();

  $uId = $uPass = "";
  $uNameErr = $uPassErr = $uPassInDB = "";

  if($_SERVER["REQUEST_METHOD"]=="POST"){ 

    

    if(empty($_POST['uid'])){
      $uNameErr = "Userid cannot be empty!";
    }else{
      $uId = $_POST['uid'];
    }

    if(empty($_POST['pwd'])){
      $uPassErr = "Password cannot be empty!";
    }else{
      $uPass = $_POST['pwd'];
    }
    if(substr( $uId, 0, 2 ) === "90"){
    if(!empty($uId) && !empty($uPass)){
      $sqlUserCheck = "select password from admin_info where userid = '$uId';";

      $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
      $userCount = mysqli_num_rows($resultUserCheck);

      if($userCount < 1){
        $uNameErr = "User does not exist";
      }else{
        while($row = mysqli_fetch_assoc($resultUserCheck)){
          $uPassInDB = $row['password'];
        }

        if($uPass == $uPassInDB){
          $_SESSION["uid"] = $uId;
          header("Location: ../users/admin/admin_dashboard.php");
        }else{
          $uPassErr = "Wrong password!";
          echo $uId.",".$uPass;
        }
      }
    }
  }


  if(substr( $uId, 0, 2 ) === "10"){
    if(!empty($uId) && !empty($uPass)){
      $sqlUserCheck = "select password from patient_info where userid = '$uId';";

      $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
      $userCount = mysqli_num_rows($resultUserCheck);

      if($userCount < 1){
        $uNameErr = "User does not exist";
      }else{
        while($row = mysqli_fetch_assoc($resultUserCheck)){
          $uPassInDB = $row['password'];
        }

        if(password_verify($uPass, $uPassInDB)){
          $_SESSION["uid"] = $uId;
          header("Location: ../users/patient/patient_dashboard.php");
        }else{
          $uPassErr = "Wrong password!";
          echo $uId.",".$uPass;
        }
      }
    }
  }


  if(substr( $uId, 0, 2 ) === "20"){
    if(!empty($uId) && !empty($uPass)){
      $sqlUserCheck = "select password from doctor_info where userid = '$uId';";

      $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
      $userCount = mysqli_num_rows($resultUserCheck);

      if($userCount < 1){
        $uNameErr = "User does not exist";
      }else{
        while($row = mysqli_fetch_assoc($resultUserCheck)){
          $uPassInDB = $row['password'];
        }

        if(password_verify($uPass, $uPassInDB)){
          $_SESSION["uid"] = $uId;
          header("Location: ../users/doctor/doctor_dashboard.php");
        }else{
          $uPassErr = "Wrong password!";
          echo $uId.",".$uPass;
        }
      }
    }
  }



  if(substr( $uId, 0, 2 ) === "30"){
    if(!empty($uId) && !empty($uPass)){
      $sqlUserCheck = "select password from nurse_info where userid = '$uId';";

      $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
      $userCount = mysqli_num_rows($resultUserCheck);

      if($userCount < 1){
        $uNameErr = "User does not exist";
      }else{
        while($row = mysqli_fetch_assoc($resultUserCheck)){
          $uPassInDB = $row['password'];
        }

        if(password_verify($uPass, $uPassInDB)){
          $_SESSION["uid"] = $uId;
          header("Location: ../users/nurse/nurse_dashboard.php");
        }else{
          $uPassErr = "Wrong password!";
          echo $uId.",".$uPass;
        }
      }
    }
  }



  if(substr( $uId, 0, 2 ) === "40"){
    if(!empty($uId) && !empty($uPass)){
      $sqlUserCheck = "select password from management_info where userid = '$uId';";

      $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
      $userCount = mysqli_num_rows($resultUserCheck);

      if($userCount < 1){
        $uNameErr = "User does not exist";
      }else{
        while($row = mysqli_fetch_assoc($resultUserCheck)){
          $uPassInDB = $row['password'];
        }

        if(password_verify($uPass, $uPassInDB)){
          $_SESSION["uid"] = $uId;
          header("Location: ../users/management/admin_dashboard.php");
        }else{
          $uPassErr = "Wrong password!";
          echo $uId.",".$uPass;
        }
      }
    }
  }


  if(substr( $uId, 0, 2 ) === "50"){
    if(!empty($uId) && !empty($uPass)){
      $sqlUserCheck = "select password from accountant_info where userid = '$uId';";

      $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
      $userCount = mysqli_num_rows($resultUserCheck);

      if($userCount < 1){
        $uNameErr = "User does not exist";
      }else{
        while($row = mysqli_fetch_assoc($resultUserCheck)){
          $uPassInDB = $row['password'];
        }

        if(password_verify($uPass, $uPassInDB)){
          $_SESSION["uid"] = $uId;
          header("Location: ../users/accountant/accountant_dashboard.php");
        }else{
          $uPassErr = "Wrong password!";
          echo $uId.",".$uPass;
        }
      }
    }
  }


  if(substr( $uId, 0, 2 ) === "60"){
    if(!empty($uId) && !empty($uPass)){
      $sqlUserCheck = "select password from lab_staff_info where userid = '$uId';";

      $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
      $userCount = mysqli_num_rows($resultUserCheck);

      if($userCount < 1){
        $uNameErr = "User does not exist";
      }else{
        while($row = mysqli_fetch_assoc($resultUserCheck)){
          $uPassInDB = $row['password'];
        }

        if(password_verify($uPass, $uPassInDB)){
          $_SESSION["uid"] = $uId;
          header("Location: ../users/lab/lab_dashboard.php");
        }else{
          $uPassErr = "Wrong password!";
          echo $uId.",".$uPass;
        }
      }
    }
  }


  if(substr( $uId, 0, 2 ) === "70"){
    if(!empty($uId) && !empty($uPass)){
      $sqlUserCheck = "select password from blood_staff_info where userid = '$uId';";

      $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
      $userCount = mysqli_num_rows($resultUserCheck);

      if($userCount < 1){
        $uNameErr = "User does not exist";
      }else{
        while($row = mysqli_fetch_assoc($resultUserCheck)){
          $uPassInDB = $row['password'];
        }

        if(password_verify($uPass, $uPassInDB)){
          $_SESSION["uid"] = $uId;
          header("Location: ../users/blood bank/blood_dashboard.php");
        }else{
          $uPassErr = "Wrong password!";
          echo $uId.",".$uPass;
        }
      }
    }
  }


  if(substr( $uId, 0, 2 ) === "80"){
    if(!empty($uId) && !empty($uPass)){
      $sqlUserCheck = "select password from physio_therapist_info where userid = '$uId';";

      $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
      $userCount = mysqli_num_rows($resultUserCheck);

      if($userCount < 1){
        $uNameErr = "User does not exist";
      }else{
        while($row = mysqli_fetch_assoc($resultUserCheck)){
          $uPassInDB = $row['password'];
        }

        if(password_verify($uPass, $uPassInDB)){
          $_SESSION["uid"] = $uId;
          header("Location: ../users/physio therapist/therapist_dashboard.php");
        }else{
          $uPassErr = "Wrong password!";
          echo $uId.",".$uPass;
        }
      }
    }
  }
  
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/login_style.css">
    <title>Login Page</title>
</head>

<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

    <div class="login-box">
        <h1>Login</h1>



        <div class="textbox">
            <i class="fas fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Userid" name="uid" value="<?php echo $uId;  ?>">
            <span style="color:red;"><?php echo $uNameErr;  ?></span>
        </div>
        <div class="textbox">
            <i class="fas fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="password" name="pwd" >
            <span style="color:red;"><?php echo$uPassErr; ?></span>
            

        </div>

        <input class="btn" type="submit" name="lgin_btn" value="Sign in">

        <h4>Dont have an account ? <a href="registration.php">Create here</a> </h4>
    </div>
</form>


</body>

</html>
