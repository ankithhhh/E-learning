
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Campus</title>
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
  <nav>
    <div class="logo">
      <!-- <img src="logo.jpg" alt="Logo"> -->
    </div>
    <div class="nav-links">
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li class="dropdown">
          <a href="#">Category</a>
          <ul class="dropdown-content">
            <li><a href="#category1">Category 1</a></li>
            <li><a href="#category2">Category 2</a></li>
            <li><a href="#category3">Category 3</a></li>
          </ul>
        </li>
        <li><a href="#contact-us">Contact Us</a></li>
      </ul>
    </div>
  </nav>
  




  <div class="content">
    <h1>Where<br><span>Journey</span> <br>Begins</h1>
    <p class="par">“Education is not the filling of a pail, but the lighting of a fire.”<br>  ― W.B. Yeats</p>
  </div>
    
	
    <!-- <div class="container"> -->
        <div class="card">
            
          <h1 class="title">Sign up</h1>
          <form action="session.php" method="post">
          <label for="name" >Name</label>
            <input type="text" name="fullname" placeholder="Full name" id="name">
        
            <label for="username" >Username</label>
            <input type="text" name="name" placeholder="name" id="username">

            <label for="email">Email ID</label>
            <input type="text" name="email" placeholder="Email" id="email">
    
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password">

      
            <input type="hidden" name="flag" value="0">
            <button class="btn">Sign Up</button>
        </form>
          
          
        </div>
        
</body>
</html>
