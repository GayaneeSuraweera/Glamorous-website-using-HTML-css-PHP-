<?php
@include 'register.php';
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($conn,$_POST['password']);
    $cpassword = md5($conn,$_POST['conpassword']);

	$select = "SELECT * FROM  user_table WHERE email = '$email' && password = '$password'";
	$result = mysqli_query($conn, $select);

	if(mysqli_num_rows($result) > 0){
		$error[] = "User already exist";
	}else{
		if($password != $cpassword){
			$error[] = "Password not match!";
		}else{
			$insert = "INSERT INTO user_table(name, email, password) VALUES('$name', '$email', '$password')";
			mysqli_query($conn, $insert);
			header('location: card-front');
		}
	}
}
?>
<html>
<head>
<title>Account Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" type="text/css" href="account.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<!--------Navigation Bar------->
	<div class="topnav">
        <img src="GLAMOROUS.png" class="logo">
    
          <div class="menu">
            <a href="cart.html"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Cart</a>
            <a href="about.html" ><i class="fas fa-bars"></i>&nbsp;&nbsp;About</a>
            <a href="account.html" ><i class="fas fa-user"></i>&nbsp;&nbsp;Sign In</a>
            <a href="pg1.html" ><i class="fa-solid fa-house-chimney"></i>&nbsp;&nbsp;Home</a>

        </div>
</div>
<!--------End of the Navigation Bar------->
<div class = "cointainer">
	<div class = "card">
		<div class = "inner-box" id="card">
			<div class = "card-front">
				<h2>LOGIN</h2>
				<form>
					<input type="email" class="input-box" placeholder="email" required>
					<input type="password" class="input-box" placeholder="Password" required>
					<button type="submit" class="submit-btn"> Submit</button>
					<input type="checkbox"><span>Remember Me</span>
				</form>
				<button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
				<a href="">Forgot Password</a>
			</div>	

			<div class = "card-back">
				<h2>REGISTER</h2>
				<form>
					<?php
						if(isset($error)){
							foreach($error as $error){
								echo'<span class="error-msg">'.'$error'.'</span>';
							};
						};
					?>
					<input type="text" class="input-box" name='name' placeholder="Your Name" required>
					<input type="email" class="input-box" name = "email" placeholder="Your Email" required>
					<input type="password" class="input-box" name= "password" placeholder="Password" required>
                    <input type="password" class="input-box" name= "conpassword" placeholder="Password" required>
					<button type="submit" class="submit-btn" name='submit'> Submit</button>
					<input type="checkbox"><span>Remember Me</span>
				</form>
				<button type="button" class="btn" onclick="openLogin()">I have an account</button>
				<a href="">Forgot Password</a>
			</div>
		</div>
	</div>
</div>


<script>

var card = document.getElementById("card");

function openRegister() 
{
	card.style.transform = "rotateY(-180deg)";
}

function openLogin() 
{
	card.style.transform = "rotateY(0deg)";
}



</script>





</body>
</html>