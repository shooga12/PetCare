<?php
include('../db.php');

 if(isset($_POST['inputFirstName'])){
    $user_data = "SELECT * FROM users WHERE email = '".$_POST['inputEmailAddress']."'";
            $u_data = mysqli_query($db, $user_data);
            $count_user = mysqli_num_rows($u_data);
            if ($count_user == 1) {
                echo"User Already exists";
                die;
            }
		$insert_user2="insert into users(first_name,last_name,email,password,phone,gender) VALUE 
        ('".$_POST['inputFirstName']."','".$_POST['inputLastName']."','".$_POST['inputEmailAddress']."','".$_POST['inputPassword']."','".$_POST['inputPhoneNumber']."','".$_POST['selectedGender']."')";
				  if(mysqli_query($db,$insert_user2))
				  {
					  echo "Successfully Registered";
				  }else{
                      echo "Error: " . $insert_user2 . "<br>" . mysqli_error($db);
                  }
 }


?>