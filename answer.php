<?php
//print_r($_POST);
include("class/users.php");
$email=$_SESSION['email'];
$ans=new  users;
$answer=$ans->answer($_POST);
$m=$answer['right'];
$s=time();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>answer</title>
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <style>
body {
    background-image: url("theme.jpg");
    background-repeat: off;
}
</style>
</head>
<body>
	<center>
	<?php
	$total_qus=$answer['right']+$answer['wrong']+$answer['no_answer'];
	$attempt_qus=$answer['right']+$answer['wrong'];
	?>
	<div class="container">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
  <h2>Your Viva Analysis</h2>
  <table class="table table-bordered">
    <thead>
      <tr style="background-color:#B0A472;">
        <th>Total number of Questions</th>
        <th><?php echo $total_qus; ?></th>
      </tr>
    </thead>
    <tbody>
      <tr style="background-color:#F5DF65;">
        <td>Attempted qusetions</td>
        <td><?php echo $attempt_qus;?></td>
      </tr>
      <tr style="background-color:#2B9464;">
        <td>Right answer </td>
        <td><?php echo $answer['right'];?></td>
      </tr>
      <tr style="background-color:#59C8DF;">
        <td>Wrong answer</td>
        <td><?php echo $answer['wrong'];?></td>
      </tr>
	  <tr style="background-color:#D14D28;">
        <td>No answer</td>
        <td><?php echo $answer['no_answer'];?></td>
      </tr>
	  <tr style="background-color:#FF66CC ;">
        <td>Your result</td>
        <td><?php 
		$per=($answer['right']*100)/($total_qus);
		
		echo $per."%";
		?></td>
      </tr>
    </tbody>
  </table>
	<center>
  <form action="giphy.php">
  <input type="submit" value="LOGOUT" style="background-color:#00D2F1;></center>
  </div>
  <div class="col-sm-2"></div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
<?php
$con =mysqli_connect("localhost","root","","quiz_oops");
if(!$con)
{
	echo "mysql_connection_error()";
}
//$k="SELECT NOW()";
//$p=mysqli_query($con,$k);
$sql="insert into marks(id,rollno,marks,timer) values('','$email','$m','$s')";
mysqli_query($con,$sql);
?>
