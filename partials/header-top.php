
<div class="wrapper">
        <img class="logo" src="images/logo3.png" alt="logo" width="500" />
        <div>
          <ul class="nav">
            <li><a href="#">HOME</a></li>
            <li><a href="reviews.php">REVIEWS</a></li>
            <li><a href="about-us.php">ABOUT</a></li>
            <li><a href="contact-us.php">CONTACT US</a></li>
            <?php
              if(isset($_SESSION['loggedin_first_name'])){
?>
<li id="log-in"><a href="users/logout.php">LOG OUT</a></li>
<?php
              }else{
                ?>
<li id="log-in"><a href="login-option.php">LOG IN</a></li>
                <?php
              }
            ?>
           
          </ul>
        </div>
      </div>