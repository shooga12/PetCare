<?php
include('../db.php');

 if(isset($_POST['vision'])){
    $updateQuery = "UPDATE aboutus SET `vision` = '" . $_POST['vision'] . "', `mission` = '" . $_POST['mission'] . "',`location` = '" . $_POST['location'] . "' WHERE `id` = '1'";

            
				  if(mysqli_query($db,$updateQuery))
				  {
					  echo "Successfully Update";
				  }else{
                      echo "Error: ". mysqli_error($db);
                  }
 }

echo "test";
?>

