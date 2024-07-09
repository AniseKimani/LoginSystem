<?php

require('connection.php');

$sql = "SELECT User_ID, User_Name, User_Email FROM users";
$result = mysqli_query($con, $sql);

?>

<select name="emails">
<?php
if($result){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
           $username = $row ['User_Email'];
           echo "<option value = '$username'> $username </option>";
        }
    }else{
        echo "No records found.";
    }
}
?>
</select>