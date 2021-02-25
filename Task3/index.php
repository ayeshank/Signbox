<?php 
include 'login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="index.scss"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signbox</title>
</head>
<body>
<div class="landingpage">

<div class="lp">

<div class="lp-left">
<img src="fb.png" /><br/>
<h2 style="padding-top:20px;" >Recent logins </h2>
<p style="fontsize:8px;padding:none;">Click your picture or add an account.</p>
<button onclick="document.getElementById('id01').style.display='block'" class="lp-addaccount"><p>Add Account<p></button>
</div>

<div class="lp-right"> 
<div id="id02" class="modal2" >
  <form id="forma2" method="POST" action="process.php" class="modal-content">
    <div class="container">
      <input type="email" class="linput" placeholder="Email Address"  name="email" required>
      <input type="password" class="linput" placeholder="Password"  name="psw" required>
</div>     
<div class="clearfix">
<button type="submit" name="register" style="width:90%;background-color:rgb(29, 79, 245);float:none;margin-left:5%;" class="signupbtn"><strong>Log In</strong></button></div>
<p style="padding-top:10px;text-align:center"><a href="#" style="color:dodgerblue">Forgotten password?</a></p>

<button onclick="document.getElementById('id01').style.display='block'" style="width:50%;float:none;margin-left:26%;border-radius:6px;padding:15px;">Create New Account</button>     
<br/>   
</div>
  </form>
  <p style="text-align:center"><a href="#"
  onclick="document.getElementById('id03').style.display='block'"
   style="color:dodgerblue">Click here</a> to get <strong>User Report</strong></p>
</div>
</div>

</div>


<div id="id01" class="modal" >
  <form id="forma" method="POST" action="process.php" class="modal-content">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <div class="container" >
     <strong> <h3>Sign Up</h3></strong>
      <p>Its quick and easy.</p>
      <hr>
      <div class="suser">
      <input type="text" style="width:31%;"  placeholder="First Name" name="fname" required>
      <input type="text"  style="width:30.5%;"placeholder="Middle Name" name="mname" required> 
      <input type="text" style="width:30%;" placeholder="Last Name" name="lname" required>  
      </div>
      <!-- <input type="text" placeholder="First name" name="fname" style="float:left" required>  
      <input type="text" placeholder="Surname" name="lname" style="float:right" required>  -->
      <input type="email" placeholder="Email Address" name="email" required>
      <input type="number" placeholder="Mobile number" name="phone" required>
      <input type="password" placeholder="New Password" name="psw" style="float:left" required>
      <input type="password" placeholder="Confirm Password" name="confirmpsw" style="float:right" required>
      <label>Date of Birth</label> <br/>
    <fieldset style="width:100%">
      <div class="field-inline-block" >
      <input type="text" id="dob" pattern="[0-9]*" name="day" placeholder="Day" maxlength="2" size="2" />
    </div>
    /
    <div class="field-inline-block">
      <input type="text" id="dob" pattern="[0-9]*" name="month" placeholder="Month" maxlength="2" size="2" />
    </div>
    /
    <div class="field-inline-block">
      <input type="text" id="dob" pattern="[0-9]*" name="year" placeholder="Year" maxlength="4" size="4"/>
    </div>
    <p>
  </fieldset>  
  <div> 
    <label class="gender" style="width:100%">Gender <br/>
        <label for="male">
        Male
        <input type="radio" id="male" name="gender" value="male">
        </label>    
        <label for="female">
        Female   
        <input type="radio" id="female" name="gender" value="female"> 
        </label>  
        <label for="other">
        Other
        <input type="radio" id="other" name="gender" value="other">
        </label> 
    </label>  
</div>   
<!-- <label><input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me</label> -->
<!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->
<p><small  style="padding:0">By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy. 
    You may receive SMS notifications from us and can opt out at any time.</small></p>    
<div class="clearfix">
        <button type="submit" name="register" class="signupbtn">Sign Up</button>
        <!-- <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Login</button>    -->
      </div>
    </div>
  </form>
  </div>







  <div id="id03" class="modal" >
  <form id="forma" method="POST" action="pdf.php" class="modal-content">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
    <div class="container" >
     <strong> <h3>User Report Generator</h3></strong>
     <p>Search By:</p>
      <hr>
      <!-- <div class="suser">
      <input type="text" style="width:31%;"  placeholder="First Name" name="ufname">
      <input type="text"  style="width:30.5%;"placeholder="Middle Name" name="umname"> 
      <input type="text" style="width:30%;" placeholder="Last Name" name="ulname">  
      </div> -->
      <!-- <p style="text-align:center;margin-bottom:0px;">Or</p>
      <p style="text-align:center;margin-bottom:0px;">Or</p> -->
     
      
      <input type="text" style="width:98.5%" placeholder="Full Name" name="uminfo"> 
      <input type="text" style="width:98.5%" placeholder="E-mail" name="ueinfo"> 
  <div> 
</div>     
<div class="clearfix">
        <button name="generate" onclick="pdf.php" target="_blank"
        style="width:100%;background-color:rgb(29, 79, 245);float:none;margin-left:0%;"
         class="signupbtn">Generate Report</button>
       </div>
       <hr>
       <p style="text-align:center"><strong>Or</strong></p>
       <div class="clearfix">
        <button name="generateall" onclick="pdf.php" target="_blank"
        style="width:100%;background-color:rgb(29, 79, 245);float:none;margin-left:0%;"
         class="signupbtn">Generate All User Report</button>
       </div>
    </div>
  </form>
  </div>











</body>
<script>
var modal = document.getElementById('id01');
var modal3 = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  else if (event.target == modal3) {
    modal3.style.display = "none";
  }
}

</script>
</html>