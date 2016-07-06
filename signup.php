<?php
session_start();
$response=file_get_contents('http://127.0.0.1:8000/api/accounts/');
$token=json_decode($response,true);
$tokenVal=$token['csrf'];
//echo $tokenVal;
$_SESSION['csrf']=$tokenVal;
?>

<html lang="en">
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/form.css">

    <style type="text/css">
    .form{
      margin: 25%;
      font-size: 18px;
    }

  </style>
  
</head>
<body>

<div class="container">

<div class="form">
  <h2>New User</h2>
  <form role="form">
    
      <input type="text" class="form-control1 textfield" name="username" id="user" placeholder="Enter username"><br>
      <input type="email" class="form-control1 textfield" name="email" id="email" placeholder="Enter email"><br>
    
   
     
      <input type="password" class="form-control1 textfield" name="password" id="pwd" placeholder="Enter password"><br>
      <input type="hidden" class="form-control1 textfield" name="csrfmiddlewaretoken" id="csrfToken" value="<?php echo $_SESSION['csrf'];?>"><br>
  <div align="center">
    <button type="submit" id="register" class="form-control btn btn-primary">Submit</button>
    <button type="submit" id="login" class="form-control btn btn-danger"><a href="login.html">Login</a></button>
  </div>  
  </form>
</div>


</div>
<script>
	$('#register').on("click",function(e) {
		var userID=document.getElementById("user").value;
		var emailID=document.getElementById("email").value;
		var password=document.getElementById("pwd").value;
		var csrf=document.getElementById("csrfToken").value;
//console.log(userID+" "+csrf);
//alert("CSRF: "+csrf);
var dataInp={username: userID, email: emailID, password: password, csrfmiddlewaretoken: csrf};
//console.log(dataInp);
e.preventDefault();
		$.post(
			"http://127.0.0.1:8000/api/accounts/",
			dataInp,
			function(responseData,status){
      console.log("success:");
      if(responseData.message=="User Registered")
      {
      console.log(responseData);
      window.location.href = "login.php";
      }
      else
      {
        console.log("User not registered");
      }
    }

			);
	});



</script>

</body>
</html>
