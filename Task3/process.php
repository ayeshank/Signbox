<?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "signboxtask3";
    $conn =  new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['register']))
        {
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $pswd=$_POST['psw'];
    $pswd_c=$_POST['confirmpsw'];
    $dob = $_POST['year']."-". $_POST['month']."-".$_POST['day'];
    $dob = $conn-> real_escape_string($dob);
    $gender=$_POST['gender'];
    $find1="SELECT * from user where email='$email'";
          $finder1=$conn->query($find1);
          if (mysqli_num_rows($finder1)>0)
          {
            echo "<h1>";
            echo "Error: You are already registered with "; 
             echo $email;
             echo "</h1>";
         }
         else
         {
    if($pswd == $pswd_c)
    {
    $sql= "INSERT INTO user(FName,MName,Lname,Email,Mobile,Password,DOB,Gender) 
    VALUES('$fname $mname $lname','$mname','$lname','$email','$phone','$pswd','$dob','$gender')";
if ($conn->query($sql) === TRUE) 
{
    $last_id = $conn->insert_id;
    // echo "New record created successfully";
    header('Location:index.php');
} 
else { echo "Error: " . $sql . "<br>" . $conn->error; }
    }
    else
    {
        echo "<h1>Error: Confirmation password is Incorrect</h1>";
    }
}
}
        
if(isset($_POST['login']))
{
$emailf=$_POST['userid'];
$pswdf=$_POST['password'];
          $find="SELECT * from userinfo where email='$emailf' and pswd='$pswdf'";
          $finder=$conn->query($find);
          if (mysqli_num_rows($finder)>0)
          {
            header('Location:welcome.html');         
         }
          else
          {
            echo "<h1>Your Email Address or Password is Incorrect</h1>";
          }
}
        }
$conn->close();

?>

<!-- https://drive.google.com/file/d/1VDwVM1qBFF2GYpZuKCcoXWIdEvusHcka/view -->