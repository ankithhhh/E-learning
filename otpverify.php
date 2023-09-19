<?php
session_start();


$otp=$_POST['submit-otp'];

$_SESSION['flag']=1;
$ep=$_SESSION['pw'];


// $options = [
//     'cost' => 12,]
// $ep = password_hash($password, PASSWORD_BCRYPT, $options);

include('includes/config.php');


$sql2 = "INSERT INTO students(StudentRegno,email,password,studentName) VALUES('{$_SESSION['un']}','$ep','{$_SESSION['pw']}','{$_SESSION['fc']}')";
$sql=mysqli_query($bd,"UPDATE otp SET email_status='verified' WHERE otp=$otp AND email='{$_SESSION['em']}'");
if(!$sql) {
    trigger_error('Invalid query: ' . mysqli_error($bd));
}
if(mysqli_affected_rows($bd) > 0) {
    echo "The query was successful and the email status was updated.";
    mysqli_query($bd,$sql2);
    header("Location:enroll.php");
}
//  else 
// {
    
//     echo "wrong otp";
// }

// echo $sql;






?>
<form  name="form" action="otp.php" method="post">
     <div class="form-group">
             <input type="hidden" name="flag" value="1">
      
     </div>   
   </form>
   <script>
  document.forms[0].submit();
</script>



