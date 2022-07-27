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
        
      $sql = "SELECT * FROM users WHERE status='Active' AND role = '1' AND email = '$email' AND password = '$password'";
        
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
                   header("location: managers/homepage.php");
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
    <title>Log In</title>
    <script
      src="https://kit.fontawesome.com/dcebed6e8d.js"
      crossorigin="anonymous"
    ></script>
    <style>
      .footer {
        width: 1457px;
        height: 154px;
        position: absolute;
        margin-top: 100px;
        margin-left: -25px;
        box-shadow: antiquewhite;
        box-shadow: inset 0px -2px 18px 0px rgb(98 126 112);
        background-color: rgb(142 180 161);
        opacity: 0.8;
        text-shadow: 0px 1px 3px #575757;
      }
      .footer .social {
        margin-left: 1400px;
        font-size: 35px;
        margin-top: 72px;
        letter-spacing: 12px;
        color: aliceblue;
      }
      .footer p {
        font-size: 18px;
        color: aliceblue;
        margin-left: 84px;
        margin-top: -26px;
        /*opacity: 0.9;*/
      }
      .footer a {
        color: aliceblue;
        margin-left: -120px;
        margin-top: 72px;
      }
      body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: rgb(244, 248, 250);
      }
      form {
        border: 3px solid #f1f1f1;
      }

      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }

      .loginn {
        background-color: rgb(115 162 137);
        color: rgb(211, 233, 221);
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        text-align: center;
      }

      button:hover {
        opacity: 0.8;
      }
      h2 {
        text-align: center;
        padding-top: 20px;
      }

      .container {
        padding: 16px;
      }

      span.psw {
        float: right;
        padding-top: 16px;
      }

      .logo {
        position: absolute;
        width: 289px;
        margin-top: -350px;
        margin-left: -78px;
        z-index: 1;
      }
    </style>
  </head>
  <body>
    <img class="logo" src="images/logo2.png" alt="petcare" />
    <div
      class="login"
      style="box-shadow: -1px 9px 16px 0px#b3b3b3; margin: 250px 50px 50px 50px"
    >
      <h2>Login</h2>

      <div class="container">
          <form action="" method="POST">
        <label for="email"><b>email</b></label>
        <input
          type="text"
          placeholder="Enter email address"
          name="inputEmailAddress"
          required
        />

        <label for="psw"><b>Password</b></label>
        <input
          type="password"
          placeholder="Enter Password"
          name="inputPassword"
          required
        />

        <button type="submit" class="loginn">Login</button>
    </form>
      </div>

      <div class="container" style="background-color: #f1f1f1">
        <a href="forget-password.php">Forgot password?</a>
      </div>
    </div>

    <div class="footer">
      <div class="social">
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
      </div>
      <div class="rights">
        <p>Copyright &copy 2022 SelfipediA All right reserved.</p>
      </div>
    </div>
  </body>
</html>
