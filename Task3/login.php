<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="index.scss"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function login() {
        ?>
        <div id="id01" class="modal" >
  <form id="forma" method="POST" action="process.php" class="modal-content">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <div class="container" >
      <input type="email" placeholder="Email Address" name="email" required>
      <input type="password" placeholder="New Password" name="psw" required>
</div>     
<div class="clearfix">
<button type="submit" name="register" class="signupbtn">Sign Up</button></div>
<hr>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>     
    </div>
  </form>
</div>
        <?php
    }
    ?>
</body>
</html>