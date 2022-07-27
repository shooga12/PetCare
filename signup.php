<?php
session_start();
include "db.php";
?>
<?php


//sign in
if (isset($_POST['inputEmailAddress'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($db, $_POST['inputEmailAddress']);
        $password = mysqli_real_escape_string($db, $_POST['inputPassword']);
        
      $sql = "SELECT * FROM users WHERE status='Active' AND email = '$email' AND password = '$password'";
        
        $result = mysqli_query($db, $sql);
       
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            
                $userrole =  $row['role'];
                $_SESSION['loggedin_first_name']= $row['first_name'];
                $_SESSION['loggedin_last_name']= $row['last_name'];
                $_SESSION['loggedinusername']= $row['first_name']." ".$row['last_name'];
                $_SESSION['loggedinuseremail'] = $email;
                $_SESSION['loggedinuserphone'] = $row['phone'];
                $_SESSION['loggedinusergender'] = $row['gender'];
                $_SESSION['loggedinuserimage'] = $row['image'];
                
                $_SESSION['loggedinuserid'] = $row['id'];
                $_SESSION['loggedinuserrole'] = $userrole;
               if($userrole=='1'){
                 ?>
 <script>
    alert("You are not allowed login as a manager")
    </script>
                 <?php
                  
                }elseif($userrole=='0'){
                    header("location: users/profile.php");
                }
                //unset($_SESSION['error_accour']);
            }else{
              ?>
  <script>
    alert("Email or Password incorrect")
    </script>
              <?php
            }
        }
    } 

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/style-register.css" />
    <script
      src="https://kit.fontawesome.com/dcebed6e8d.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body>
    <!-- background-->
    <div class="container">
      <img class="logo" src="images/logo2.png" alt="logo" />

      <div class="card">
        <div class="inner-box" id="card">
          <div class="card-front">
            <h3>LOG IN</h3>

            <form method="post">
              <input
                type="email"
                class="input-box" name="inputEmailAddress"
                placeholder="enter Your email here"
                required
              />

              <input
                type="password"
                class="input-box" name="inputPassword" 
                placeholder="enter Your password here"
                required
              />

              <button type="submit" class="submit-button">Submit</button>


              <button type="button" class="buttonn submit-btn" onclick="openRegister()">
                I'm new here
              </button>

              <a href="forget-password.php">Forgot password</a>
            </form>
          </div>

          <div class="card-back">
            <h3>REGISTER</h3>

            <form>
              <img src="images/img_avatar.png" alt="Avatar" class="avatar" />

              <input
                type="TEXT"
                class="input-box"
                placeholder="first name" id="inputFirstName"
                required
              />
              <input
                type="text"
                class="input-box"
                placeholder="last name"  id="inputLastName"
                required
              />

              <input
                type="email"
                class="input-box"
                placeholder="enter Your email here" id="inputEmailAddress"
                required
              />
              <input
                type="password"
                class="input-box"
                placeholder="enter Your password here" id="inputPassword"
                required
              />
              <input
                type="phone"
                class="input-box"
                placeholder="enter Your number here" id="inputPhoneNumber"
                required
              />

              <h4>GENDER</h4>

              <input type="radio" name="gender" value="male"  /> Male <br />
              <input type="radio" name="gender" value="female" /> Female <br />

              <a onclick="registerUser();" type="submit" class="submit-button">Submit</a>

              <button type="button" class="buttonn" onclick="openlogin()">
                I've an account
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      var card = document.getElementById("card");
      function openRegister() {
        card.style.transform = "rotateY(-180deg)";
      }

      function openlogin() {
        card.style.transform = "rotateY(0deg)";
      }
    </script>
<?php
include 'partials/footer.php';
?>

    <input type="checkbox" id="check" />
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel2"></i>
    </label>
    <?php
include 'partials/header-right.php';
?>
   <script>
 function registerUser() {

var inputFirstName = document.getElementById("inputFirstName").value;
var inputLastName = document.getElementById("inputLastName").value;
var inputEmailAddress = document.getElementById("inputEmailAddress").value;
var inputPassword = document.getElementById('inputPassword').value;
var inputPhoneNumber = document.getElementById('inputPhoneNumber').value;
var selectedGender = $("input:radio[name=gender]:checked").val();

if (inputFirstName == "" || inputFirstName == "" || inputEmailAddress == "" ||inputPassword == "" || inputPhoneNumber == "" || selectedGender == undefined) {
    alert("Please fill all the fields");
    return;
}
$.ajax({
   type: 'POST',
   url: 'ajax/registerUser.php',
   data: {
    inputFirstName: inputFirstName,
    inputLastName: inputLastName,
      inputEmailAddress: inputEmailAddress,
      inputPassword: inputPassword,
      inputPhoneNumber: inputPhoneNumber,
      selectedGender: selectedGender
     
   },
   success: function(res) {
     alert(res);
      console.log(res)
      openlogin();

   }
});

}

</script>
  </body>
</html>
