<?php
 
  include "../includes/db_connect.inc.php";

  $genderErr= $bloodErr = $fNameErr = $uNameErr = $uPassErr =  $uEmailErr = $uNumberErr = $uAddressErr = $userNameErr = $alErr = "";
  $fName = $userGender = $userBlood =  $uPass = $cPass = $cpassErr = $upassErr = $uEmail = $userName = $cPassErr = $udoberr = $uPhone = $userAllergy = $uName  = $uEmail = $uNumber = $uAddress ="";
  $uid = null ;
  $errExists = null ;

  $sql = "select max(userid) from  patient_info;";
      if($results = mysqli_query($conn, $sql)){

        while($row = mysqli_fetch_row($results)){
          $tempid = $row[0];

          if($tempid == null){

            $uid = "1001" ;
          }

        
          else{
            $uid = $tempid + 1;
          }

          
        }
      }

  if($_SERVER["REQUEST_METHOD"]=="POST"){ if(isset($_POST['sign_up'])){


    if(empty($_POST['u_name'])){
      $userNameErr = "Please click on auto id!";
      $errExists = 1;
    }else{
      $userName = mysqli_real_escape_string($conn, $_POST['u_name']);
    }


    if(empty($_POST['fname']) and empty($_POST['u_email']) and empty($_POST['u_number']) and empty($_POST['address']) and empty($_POST['dob']) and empty($_POST['u_pwd']) and empty($_POST['c_pwd'])){
      $fNameErr = "This Field Cannot be empty"; 
      $uEmailErr = "This Field Cannot be empty"; 
      $udoberr = "This Field Cannot be empty"; 
      
      $uNumberErr = "This Field Cannot be empty"; 
      
      $uAddressErr = "This Field Cannot be empty"; 
      $upassErr = "This Field Cannot be empty";  
      $cPassErr = "This Field Cannot be empty"; 


    }

    else{


      $uPass = mysqli_real_escape_string($conn, $_POST['u_pwd']);
    $cPass = mysqli_real_escape_string($conn, $_POST['c_pwd']);
    $fName = mysqli_real_escape_string($conn, $_POST['fname']);
    $uEmail = mysqli_real_escape_string($conn,$_POST['u_email']);
    $uPhone = mysqli_real_escape_string($conn,$_POST['unumber']);
    $uAddress = mysqli_real_escape_string($conn,$_POST['address']);
    $uDob = mysqli_real_escape_string($conn,$_POST['dob']);



    }


    

    if(empty($_POST['gender']) and empty($_POST['blood_group']) and empty($_POST['allergy'])){
      $genderErr = "Gender cannot be empty!";
      $bloodErr = "Blood Group cannot be empty!";
      $alErr = "Allergy cannot be empty!";
      $errExists = 1;
    }else{
      $userGender = mysqli_real_escape_string($conn, $_POST['gender']);
      $userBlood = mysqli_real_escape_string($conn, $_POST['blood_group']);
      $userAllergy = mysqli_real_escape_string($conn, $_POST['allergy']);
    }

    

    
    if($uPass != $cPass){
      $cPassErr = "Passwords doesn't match!";
      $errExists = 1;
    }

    $uPassToDb = password_hash($uPass, PASSWORD_DEFAULT);
    

    

    

    


    


      if($errExists != 1){

      
        $sqlUserInsert = "insert into patient_info (userid,fullname,password, email, phone, dob, blood_group, gender, allergy,  address)
        values ('$userName','$fName', '$uPassToDb', '$uEmail',  '$uPhone', '$uDob' ,'$userBlood','$userGender','$userAllergy','$uAddress');";

        if(mysqli_query($conn, $sqlUserInsert)){

        $regSuccessful = "Registration was successful";

        // echo '<script>alert("Registration was successful")</script>';
        header("Refresh:3; url: login.php",true, 303);
        }

        else{

          echo '<script>alert("Somthing Went Wrong")</script>';
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500display=swap"rel="stylesheet">
    <link rel="stylesheet" href="../css/new_reg_style.css">
    <title>Registration Page</title>
</head>

<body>
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">

    <div class="login-box">
        <h1>Registration</h1>

        <div class="textbox">

            <input type="text" placeholder="Full Name" name="fname" value="<?php echo $fName; ?>" >
            <span style="color:red;white-space:nowrap;"> <?php echo $fNameErr; ?> </span>
        </div>

        <div class="textbox">

            <input type="email" placeholder="Email" name="u_email" value="<?php echo $uEmail;  ?>" >
             <span style="color:red;white-space:nowrap;"><?php echo $uEmailErr;  ?></span>
        </div>

        <div class="textbox">

            <input type="text" placeholder="Date of Birth" onfocus="(this.type='date')" onblur="(this.type='text')" name="dob" >
            <span style="color:red;white-space:nowrap;"><?php echo $udoberr ;  ?></span>
        </div>

        <div class="textbox">

            <input type="number" placeholder="Mobile No." name="unumber" value="<?php echo $uPhone; ?>" >
             <span style="color:red;white-space:nowrap;"><?php echo $uNumberErr; ?></span>
        </div>

        <div class="textbox">

            <input type="text" placeholder="Address" name="address" value="<?php echo $uAddress; ?>" >
             <span style="color:red;white-space:nowrap;"><?php echo $uAddressErr; ?></span>
        </div>

        <div class="textbox">
            <div class="select">


                <select name="gender">
                    <option value="" disabled selected>Gender</option>
                    <option value="Male"<?php if($userGender == "male") echo "selected" ?>> Male</option>
                    <option value="Female"<?php if($userGender == "female") echo "selected" ?>> Female</option>


                </select>
                
            </div>
            <div><span style="color:red;"><?php echo $genderErr; ?></span></div>
        </div>

        <div class="textbox">
            <div class="select">
              <select name="blood_group">
                <option value="" disabled selected >select group</option>
                <option value="a+"<?php if($userBlood == "a+") echo "selected"; ?>> A+</option>
                <option value="a-"<?php if($userBlood == "a-") echo "selected"; ?>> A-</option>
                <option value="b+"<?php if($userBlood == "b+") echo "selected"; ?>> B+</option>
                <option value="b-"<?php if($userBlood == "b-") echo "selected"; ?>> B-</option>
                <option value="ab+"<?php if($userBlood == "ab+") echo "selected"; ?>> AB+</option>
                <option value="ab-"<?php if($userBlood == "ab-") echo "selected"; ?>> AB-</option>
                <option value="o+"<?php if($userBlood == "o+") echo "selected"; ?>> O+</option>
                <option value="o-"<?php if($userBlood == "o-") echo "selected"; ?>> O-</option>
              </select>
              
              
            </div>
            <div><span style="color:red;"><?php echo $bloodErr; ?></span></div>
          </div>






            <div class="textbox">
                <div class="select">


                    <select name="allergy">
                        <option Selected Disabled>Allergies</option>
                        <option value="Asthma"<?php if($userAllergy == "Asthma") echo "selected"; ?>> Asthma</option>
                        <option value="Atopic Eczema"<?php if($userAllergy == "Atopic Eczema") echo "selected"; ?>> Atopic Eczema</option>
                        <option value="Drug Allergy"<?php if($userAllergy == "Drug Allergy") echo "selected"; ?>> Drug Allergy</option>
                        <option value="Food Allergy and Food Intolerance"<?php if($userAllergy == "Food Allergy and Food Intolerance") echo "selected"; ?>> Food Allergy and Food Intolerance</option>
                        <option value="Rhinitis"<?php if($userAllergy == "Rhinitis") echo "selected"; ?>> Rhinitis</option>
                        <option value="Skin Allergy"<?php if($userAllergy == "Skin Allergy") echo "selected"; ?>> Skin Allergy</option>

                        
                    </select>
                    
                    
                </div>
                <div><span style="color:red;"><?php echo  $alErr; ?></span></div>
            </div>






        <div class="textbox">
            <i class="fas fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Userid" name="u_name" value="<?php echo $uid; ?>" readonly="readonly"> 
            <span style="color:red;"> <?php echo $userNameErr; ?>
        </div>

        <div class="textbox">
            <i class="fas fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Password" name="u_pwd" value="" > <span style="color:red; white-space:nowrap;"><?php echo $upassErr; ?></span>
        </div>

        <div class="textbox">
            <i class="fas fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Confirm Password" name="c_pwd" value="" > <span style="color:red;white-space:nowrap;"><?php echo $cPassErr; ?></span>
            
        </div>



        <input class="btn" type="submit" name="sign_up" value="Sign Up">
        <div> <span style="color:red;"> <?php $regSuccessful ?> </span></div>

        <h4>Already have an account ? <a href="login.php">Login here</a> </h4>
    </div>


</body>

</html>
