<?php
session_start();
include '../db.php';


if (isset($_POST['vision'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //print_r($_FILES['files']['size']);
//print_r($_FILES['files']['size']);
if (isset($_FILES['vision_img']) && $_FILES['vision_img']['size'] != 0) {
    

    $j = 0; //Variable for indexing uploaded image

    $file_name_all = "";

        $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
        $ext = explode('.', basename($_FILES['vision_img']['name'])); //explode file name from dot(.)
        $file_extension = end($ext); //store extensions in the variable
        $basename = basename($_FILES['vision_img']['name']);

        $j = $j + 1; //increment the number of uploaded images according to the files in array

        if (($_FILES['vision_img']["size"] < (1024 * 1024)) //Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)
        ) {
            $random = rand(10000, 1000000);
            $n = "profile_" . $random . ".png";
            $cd = $n;
            if (move_uploaded_file($_FILES['vision_img']['tmp_name'], "../images/about-us/" . $cd)) {
                $file_name_all .= $cd . ",";
                $vision_filepath = rtrim($file_name_all, ',');
            } else { //echo "Please try again";
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    
}

if (isset($_FILES['mission_img']) && $_FILES['mission_img']['size'] != 0) {
    

  $j = 0; //Variable for indexing uploaded image

  $file_name_all = "";

      $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
      $ext = explode('.', basename($_FILES['mission_img']['name'])); //explode file name from dot(.)
      $file_extension = end($ext); //store extensions in the variable
      $basename = basename($_FILES['mission_img']['name']);

      $j = $j + 1; //increment the number of uploaded images according to the files in array

      if (($_FILES['mission_img']["size"] < (1024 * 1024)) //Approx. 100kb files can be uploaded.
          && in_array($file_extension, $validextensions)
      ) {
          $random = rand(10000, 1000000);
          $n = "profile_" . $random . ".png";
          $cd = $n;
          if (move_uploaded_file($_FILES['mission_img']['tmp_name'], "../images/about-us/" . $cd)) {
              $file_name_all .= $cd . ",";
              $mission_filepath = rtrim($file_name_all, ',');
          } else { //echo "Please try again";
          }
      } else { //if file size and file type was incorrect.
          echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
      }
  
}



if (isset($_FILES['location_img']) && $_FILES['location_img']['size'] != 0) {
    

  $j = 0; //Variable for indexing uploaded image

  $file_name_all = "";

      $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
      $ext = explode('.', basename($_FILES['location_img']['name'])); //explode file name from dot(.)
      $file_extension = end($ext); //store extensions in the variable
      $basename = basename($_FILES['location_img']['name']);

      $j = $j + 1; //increment the number of uploaded images according to the files in array

      if (($_FILES['location_img']["size"] < (1024 * 1024)) //Approx. 100kb files can be uploaded.
          && in_array($file_extension, $validextensions)
      ) {
          $random = rand(10000, 1000000);
          $n = "profile_" . $random . ".png";
          $cd = $n;
          if (move_uploaded_file($_FILES['location_img']['tmp_name'], "../images/about-us/" . $cd)) {
              $file_name_all .= $cd . ",";
              $location_filepath = rtrim($file_name_all, ',');
          } else { //echo "Please try again";
          }
      } else { //if file size and file type was incorrect.
          echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
      }
  
}
$vision_filepath = 'pet_825719.png';

if ($_FILES['vision_img']['size'] != 0) {
  $updateQuery = "UPDATE aboutus SET `vision_img` = '" . $vision_filepath . "' WHERE `id` = '1'";

            

    if (mysqli_query($db, $updateQuery)) {

    
    } else {
        echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
    }



  
}


if ($_FILES['mission_img']['size'] != 0) {
  $updateQuery = "UPDATE aboutus SET `mission_img` = '" . $mission_filepath . "' WHERE `id` = '1'";

            

    if (mysqli_query($db, $updateQuery)) {

    
    } else {
        echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
    }



  
}
if ($_FILES['location_img']['size'] != 0) {
  $updateQuery = "UPDATE aboutus SET `location_img` = '" . $location_filepath . "' WHERE `id` = '1'";

            

    if (mysqli_query($db, $updateQuery)) {

    
    } else {
        echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
    }



  
} 
 $updateQuery = "UPDATE aboutus SET `vision` = '" . $_POST['vision'] . "', `mission` = '" . $_POST['mission'] . "',`location` = '" . $_POST['location'] . "' WHERE `id` = '1'";
            

            if (mysqli_query($db, $updateQuery)) {

            
                ?>
                <script>
                  alert("Update successfully!")
                  </script>
                            <?php
            } else {
                echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
                echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
            }



        



    }
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>about us</title>
    <link rel="stylesheet" href="../css/aboutStyle.css" />
    <script
      src="https://kit.fontawesome.com/dcebed6e8d.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>
  <body>
    <img class="logo" src="../images/logo3.png" alt="lock pass" />
    <form id="image_form" method="post" enctype="multipart/form-data" action = "about-us.php">
    <div class="up">
      <div class="aboutUs">
        <div class="edit2">
         
<input type="submit" value="submit" />
        </div>
        <h1>About Us</h1>
        <div contenteditable="true">
          <p>
            Our goal is to make a positive difference in the lives of pets as
            well as their owners or guardians. <br />
            Our facility offers a wide range of services including
            consultations, preventive care, vaccinations, dental care, routine
            and complex surgeries, x-ray and laboratory services, boarding and
            grooming, ultrasound and endoscopy.
          </p>
        </div>
      </div>
    </div>

    <h2 style="text-align: center"></h2>
    <?php

$sql = "SELECT * from aboutus";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
        ?>
        

    <div class="row">
     
        <textarea id="vision" name="vision" style="display:none"><?php echo $row1["vision"] ?></textarea>
        <textarea id="mission" name="mission" style="display:none"><?php echo $row1["mission"] ?></textarea>
        <textarea id="location" name="location" style="display:none"><?php echo $row1["location"] ?></textarea>
      
      

      <div class="column">
        <div class="card">
        <label>Upload a photo : </label>
                        <input type="file" id="file" name="vision_img" accept="image/*">  
          <img src="../images/about-us/cat.jpg" alt="cat" style="width: 100%" />
          <div class="container">
            <div contenteditable="true" id="editVision">
            <?php echo $row1["vision"] ?>
            </div>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
        <label>Upload a photo : </label>
                         <input type="file" id="file" name="mission_img" accept="image/*">  
          <img src="../images/about-us/services.jpg" alt="services" style="width: 100%" />
          <div class="container">
            <div contenteditable="true" id="editMission">
            <?php echo $row1["mission"] ?>
            </div>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
        <label>Upload a photo : </label>
                        <input type="file" id="file" name="location_img" accept="image/*"> 
          <div contenteditable="true" >
            <img src="../images/about-us/gps.jpg" alt="gps" style="width: 100%" />
            <div class="container" id="editLocation">
            <?php echo $row1["location"] ?>
            </div>
          </div>
        </div>
      </div>
   
    </div>

    <?php
    }
}
?>
 </form>
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
<script>
   $(document).ready(function(){
   
$("#editVision").mouseleave(function() {
  var vision = $("#editVision").html();
 
  $("#vision").html(vision);
});


$("#editMission").mouseleave(function() {
  var mission = $("#editMission").html();
 
  $("#mission").html(mission);
});


$("#editLocation").mouseleave(function() {
  var location = $("#editLocation").html();
 
  $("#location").html(location);
});
});
</script>    


<script>
  
 function aboutUs() {

var vision = $("#editVision").html();
var mission = $("#editMission").html();
var location = $("#editLocation").html();


if (vision == "" || mission == "" || location == "") {
    alert("Please fill all the fields");
    return;
}
$.ajax({
   type: 'POST',
   url: '../ajax/about-us.php',
   data: {
    vision: vision,
    mission: mission,
      location: location,
     
   },
   success: function(res) {
     alert(res);
     window.location.href = "about-us.php";
   }
});

}

</script>