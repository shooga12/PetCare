<?php
session_start();
include '../db.php';


if (isset($_POST['name'])) {

         //print_r($_FILES['files']['size']);
//print_r($_FILES['files']['size']);
if (isset($_FILES['files']) && $_FILES['files']['size'] != 0) {
    

    $j = 0; //Variable for indexing uploaded image

    $file_name_all = "";

        $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
        $ext = explode('.', basename($_FILES['files']['name'])); //explode file name from dot(.)
        $file_extension = end($ext); //store extensions in the variable
        $basename = basename($_FILES['files']['name']);

        $j = $j + 1; //increment the number of uploaded images according to the files in array

        if (($_FILES["files"]["size"] < (1024 * 1024)) //Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)
        ) {
            $random = rand(10000, 1000000);
            $n = "pet_" . $random . ".png";
            $cd = $n;
            if (move_uploaded_file($_FILES['files']['tmp_name'], "../images/srvices/" . $cd)) {
                $file_name_all .= $cd . ",";
                $filepath = rtrim($file_name_all, ',');
            } else { //echo "Please try again";
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    
}

$name = mysqli_real_escape_string($db, $_POST['name']);
$details = mysqli_real_escape_string($db, $_POST['details']);
$price = mysqli_real_escape_string($db, $_POST['price']);
$sql = "INSERT INTO services (name,details,price,image)
            VALUES ('{$name}','{$details}','{$price}','{$filepath}')";
if (mysqli_query($db, $sql)) {
    ?>
    <script>
    alert("Add Service successfully!")
    window.location.href = "homepage.php?addServices=true";
    </script>
              <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert.</p>";
}
}?>
<!DOCTYPE html>
<html>
    <head>
        <title>add a service</title>
        <script src="https://kit.fontawesome.com/dcebed6e8d.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
        <style>

.footer{
    width: 1440px;
    height: 154px;
    position: absolute;
    margin-top: 100px;
    margin-left: -60px;
    box-shadow: antiquewhite;
    box-shadow: inset 0px -2px 18px 0px rgb(98 126 112);
    background-color: rgb(142 180 161);
    opacity: 0.8;
    text-shadow: 0px 1px 3px #575757;
}
.footer .social{
    margin-left: 1173px;
    font-size: 35px;
    margin-top: 72px;
    letter-spacing: 12px;
    color: aliceblue;
    
}
.footer p{
    font-size: 18px;
    color: aliceblue;
    margin-left: 84px;
    margin-top: -26px;
    /*opacity: 0.9;*/
}
.footer a{
    color: aliceblue;
}

.logo {
  position: absolute;
  width:289px ; 
margin-top: -350px;
margin-left: -107px;
  z-index: 1;
}

            body {background-color: rgb(200, 240, 219);
                  box-shadow:-1px 9px 16px 0px#b3b3b3; margin: 250px 50px 50px 50px;}
            .servicee {font-family: Arial, Helvetica, sans-serif;
      background-color: rgb(244,248,250)}

      .button1 {
  background-color: rgb(115 162 137);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

        </style>
    </head>
    <body>
        <img class="logo" src="../images/logo2.png" alt="petcare">
        <div class="servicee" style="box-shadow:-1px 9px 16px 0px#b3b3b3; margin: 250px 0px; padding: 25px"> <h2>Add a new service</h2>
            <div class="container">
            <form method="post" action="" enctype="multipart/form-data">

              <label for="name"><b>service name</b></label>
              <input type="text" id="price" name="name" required>
              <br>
              <p>photo
              <input required type="file" id="file" name="files" accept="image/*" required>
              </p>
              <br>
              <div class="desc">
            <label for="desc">Description:<br></label>
              <input type="text" id="desc" name="details" required size="250" style="height:150px; width:250px"></p>
              </div>
              <label for="price">Price:</label>
              <input type="number" id="price" name="price" required></p>
                <button type="submit" class="button1">submit</button> 
</form>
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