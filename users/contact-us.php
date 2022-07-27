

<!DOCTYPE html>
<head>

<meta charset="UTF-8">
<title>Contact us </title>

<link rel="stylesheet" href="../css/con-style.css">
<script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
</head>

<body>
     <img src="../images/logo2.png" alt="logo" class="logo">

	<div class="container">




       
	<h1>connect with us</h1>
	<p> WE WOULD LIKE TO HELP YOU ,<br> FEEL FREE TO GET IN TOUCH WITH US</p>

<div class="contact-box">

   <div class="contact-left">

   <h3>Sent Your Request</h3>

   <form method="post" action="">
 <div class="input-row">

   	<div class="input-boxes">
   		<label>Name</label>

<input required type="text" name="userName"placeholder="sarah fahad">
   	</div>

   <div class="input-boxes">
   		<label>Phone</label>

<input required type="text" name="phone" placeholder="+966 50 987 6547">
   	</div>
</div>

<div class="input-row">

<div class="input-boxes">
   		<label>Email</label>

<input required type="Email" name="email" placeholder="sarahfahad@gmail.com">
   	</div>

<div class="input-boxes">
   		<label>Subject</label>

<input required type="text" name="subject" placeholder="product demo">

   	</div>
 </div>

<label>Message</label>
<textarea required rows="5" name="messag" placeholder="your message"></textarea>

<button type="Submit">SEND</button>

   </form>

   </div>


   <div class="contact-right">
   <h2>Reach Us</h2>


   <table>
   	<tr>
   		<td> Email</td>
   		<td> contactus@gmail.com</td>
   	</tr>
   	<tr>
   		<td>Phone</td>
   		<td>+966 50 987 6547</td>

   	</tr>

   	<tr>
   		<td>address</td>
   		<td>riyadh</td>
   	</tr>

   </table>

   </div>

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


<input type="checkbox" id="check">
<label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel2"></i>
</label>
<div class="sidebar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="http://localhost/projedited2/users/profile.php">Profile</a></li>
                <li><a href="about-us.php">About</a></li>
                <li><a href="reviews.php">Review</a></li>
                <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
        </div>

</body>



</html>

<div style="display:none">
      
      <?php
      include 'db.php';
      
      
      if (isset($_POST['userName'])) {
      
          
      
        $userName = mysqli_real_escape_string($db, $_POST['userName']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $to = mysqli_real_escape_string($db, $_POST['email']);
        $subject = mysqli_real_escape_string($db, $_POST['subject']);
        $messag = mysqli_real_escape_string($db, $_POST['messag']);
        
        
      // the message
      $msg = "user Name : ".$userName." , Phone : ".$phone." , Message : ".$messag;
      
      
      $headers = 'From: <arahfahad@gmail.com>' . "\r\n";
      // send email
      mail($to,$subject,$msg,$headers);
      ?>
       <script>
            alert("Email Send successfully!")
      
            </script>
      <?php
      
        }
      
      
      ?>
      </div>