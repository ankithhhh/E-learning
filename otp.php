<?php
session_start();
include('includes/config.php');






$sql = "SELECT gmail FROM login WHERE gmail='{$_SESSION['em']}' ";
$sql1 = "SELECT name FROM login WHERE name='{$_SESSION['un']}'";
// $sql2 = "INSERT INTO students(StudentRegno,email,password,studentName) VALUES('{$_SESSION['un']}','{$_SESSION['em']}','{$_SESSION['pw']}','{$_SESSION['fc']}')";
// $result = mysqli_query($bd, $sql);
// $result1 = mysqli_query($bd, $sql1);
             
 use PHPMailer\PHPMailer\PHPMailer;
 
 require 'PHPMailer-6.6.3/src/Exception.php';
 require 'PHPMailer-6.6.3/src/PHPMailer.php';
 require 'PHPMailer-6.6.3/src/SMTP.php';
 
 class VerificationCode
 {
     public $smtpHost;
     public $smtpPort;
     public $sender;
     public $password;
     public $receiver;
     public $code;
 
     public function __construct($receiver)
     {
         /**
          * Your email id  
          * For example : johndoe@gmail.com
          * contact@johndoe.com
          * 
          */
         $this->sender = "your email"; 
 
         /**
          *  YOUR PASSWORD 
          *  ************
          */               
 
        $this->password = "your password";  
 
         /**
          * Receiver email
          * For example : johndoe@gmail.com
          */     
         $this->receiver = $receiver;  
 
         /**
          * YOUR SMTP HOST NAME 
          * For example : smtp.gmail.com 
          * OR mail.youwebsite.com
          */     
         $this->smtpHost="smtp.gmail.com  ";        
         
         /**
          * SMTP port number
          * For example :587
          */
         $this->smtpPort = 587;
 
     }
     public function sendMail(){
         $mail = new PHPMailer();
         $mail->IsSMTP();
         $mail->SMTPAuth = true;
         $mail->SMTPOptions = array(
             'ssl' => array(
                 'verify_peer' => false,
                 'verify_peer_name' => false,
                 'allow_self_signed' => true
             )
         );
         //$mail->SMTPDebug = 4;
         $mail->Host = $this->smtpHost;   
         $mail->Port = $this->smtpPort;    
         $mail->IsHTML(true);
         $mail->Username = $this->sender;
         $mail->Password = $this->password;
         $mail->Body=$this->getHTMLMessage();
         $mail->Subject = "Your verification code is {$this->code}";
         $mail->SetFrom($this->sender,"Verification Codes");
         $mail->AddAddress($this->receiver);
         if($mail->send()){
          // echo "MAIL SENT SUCCESSFULLY";
         
         }
         else{
         //echo "FAILED TO SEND MAIL";
         // return false;
        // echo "resend otp";
           header("Location:signup.php?mess=invalidotp");
         exit();
         
     }
 
     }
     
    
     public function getVerificationCode()
     {
        
        include('includes/config.php');
        // $_SESSION['em'] = $_POST['email'];
        // echo '{$_SESSION['em']}';
        
        // $otpn=(int) substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $otp = rand(100000, 999999);
        $sql4 ="UPDATE otp SET otp=$otp,email_status='null' WHERE email ='{$_SESSION['em']}'";
        $r1=mysqli_query($bd,"SELECT email from otp WHERE email='{$_SESSION['em']}'");
        $sql5 ="INSERT INTO otp(otp,email) VALUES('$otp','{$_SESSION['em']}')";
        if (mysqli_num_rows($r1) > 0)
        {
            mysqli_query($bd,$sql4);
            return $otp;
        }
        elseif(mysqli_query($bd,$sql5))
        {
            return $otp;
        }
        
     
     }
     
 
     public function getHTMLMessage(){
         $this->code=$this->getVerificationCode();   
         $htmlMessage=<<<MSG
         <!DOCTYPE html>
         <html>
          <body>
             <h1>Your verification code is {$this->code}</h1>
             <p>Use this code to verify your account.</p>
          </body>
         </html>        
 MSG;
     return $htmlMessage;
     }
 
 }
 
 
if($_SESSION['flag']!=0)
{
 $vc=new VerificationCode($_SESSION['em']); 
 $vc->sendMail(); 
//  mysqli_query($bd, $sql2);
 
}
 
 
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP</title>
  <style>
* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
	font-family: "Nunito", sans-serif;
}

/* .main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%),url(bg2.jpg);
    background-position: center;
    background-size: cover;
    height: 109vh;
} */
body {
  background-image: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%),url(assets/img/2.jpeg);
  background-size: cover;
}



.card {
  display: inline-block;
    float: right;
    margin-top: 2%;
margin-right: 8%;
  width: 350px;
  height: 530px;
  background: rgba( 255, 255, 255, 0.15 );
  /* box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 ); */
  backdrop-filter: blur( 18px );
  -webkit-backdrop-filter: blur( 18px );
  border: 1px solid rgba( 255, 255, 255, 0.18 );
  border-radius: 1rem;
  padding: 1%;
  z-index: 10;
  color: whitesmoke;
}

.title {
  font-size: 2.2rem;
  margin-bottom: 3rem;
}

.btn {
  background: none;
  border: none;
  text-align: center;
  font-size: 1rem;
  color: whitesmoke;
  background-color: #fa709a;
  padding: 0.8rem 1.8rem;
  border-radius: 2rem;
  cursor: pointer;
  margin-top: 5%;
  
}






.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{

    /* background-color: rgba(255,255,255,0.13); */
    /* background-color: yellow; */
    position: absolute;
    transform: translate(-50%,-50%);
    top: 55%;
    left: 50%;
    border-radius: 10px;
    margin-top: 0%;
    /* backdrop-filter: blur(10px); */
    /* border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6); */
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}




label{
    display: block;
    margin-top: 25px;
    font-size: 16px;
    font-weight: 500;
}
label[for="username"] {
        margin-top:0px;
        padding-top:0px;
    }

input{
    display: block;
    height: 50px;
    width: 300px;
    /* background-color:yellow; */
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}

.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}


.content{
    width: 1200px;
    height: auto;
    margin: auto;
    color: #fff;
    position: relative;
}

.content .par{
   font-family: 'Times New Roman';
    padding-left: 20px;
    padding-bottom: 25px;
    font-family: Arial;
    letter-spacing: 1.2px;
    line-height: 30px;
    font-weight: bold;
}

.content h1{
    font-family: 'Times New Roman';
    font-size: 50px;
    padding-left: 20px;
    margin-top: 9%;
    letter-spacing: 2px;
}
/* 
.content .cn{
    width: 160px ;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-bottom: 10px;
    margin-left: 20px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    transition: .4s ease;
}

.content .cn a{
    text-decoration: none;
    color: #000;
    transition: .3s ease;
}

.cn:hover{
    background-color: #fff;
} */

.content span{
    color: #ff7200;
    font-size: 60px;
}
.content
{
  
  /* background-color: yellow; */
  width: 600px;
  height: 300px;
  margin-top: 10%;
  margin-left: 5%;
  display: inline-block;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  /* background-color: #fff; */
  padding: 10px 20px;
  margin-top: 5px;
}

.logo {
  flex: 1;
}


.nav-links {
  flex: 1;
  text-align: right;
  margin-right: 6%;
}

.nav-links ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.nav-links li {
  display: inline-block;
  margin-left: 20px;
}

.nav-links a {
  color: white;
  text-decoration: none;
  font-weight: bolder;
  padding: 0 7px;
}

.dropdown {
  position: relative;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: black;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  min-width: 100px;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.nav-links a:hover {
    text-decoration: underline;
  }


    </style>

</head>
<body>




   <div class="card">
            
            <h1 class="title">Enter OTP</h1>
           
            <form  name="form" action="otpverify.php" method="post">
     <div class="form-group">
             <input type="NUMBER" class="form-control" name="submit-otp" placeholder="Enter OTP" required="required">

       <input type="submit"  class="btn btn-primary  btn-s" value="Submit">  
              </div>
   
   </form>
            
            
          </div>
  
</body>
</html>