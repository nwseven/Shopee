<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shopee</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<div class="container-fluid">

	<div class="row">
    	<div class="col-md-12">
      		<a href="index.php"><div class="orangefont"><h3>&#8592;</h3></div></a>
            <hr/>
            <center>
            <div class="formstyle">            	
            	<form action="doLogin.php" method="post">
            		<input class="form-control" type="text" placeholder="Username" name="username">
                	<input class="form-control" type="password" placeholder="Password" name="password">
                	<input class="orangebutton btn" type="submit" onClick="return doLogin();" name="login" value="Login" style="width:100%;">
            	</form>
                <h4>Belum punya akun? Silakan daftar di <a href="register.php">sini</a></h4>
             </div>
             </center>
   		</div>
 	</div> 
      
</div> 
<!-- /container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script>

function doLogin(){
			
	var username = document.getElementsByName('username');
	var password = document.getElementsByName('password');
	
	if(!username[0].value || !password[0].value){
		alert('Tolong isi semua data dengan lengkap untuk login');
		return false;				
	}
	
	else if (username[0].value.length <6){  
    	alert('Username harus terdiri dari 6 karakter atau lebih'); 
		return false;
  	}
	
	else if (username[0].value.length >15){  
    	alert('Username tidak boleh terdiri lebih dari 15 karakter'); 
		return false;
  	}
	
	if (! /^[a-zA-Z0-9]+$/.test(username[0].value)) {
    	alert('Username hanya boleh dalam huruf alfabet dan angka'); 
		return false;
	}
	
	else if (password[0].value.length <8){  
    	alert('Password harus terdiri dari 8 karakter atau lebih'); 
		return false;
  	}
	
	else if (password[0].value.length >16){  
    	alert('Password tidak boleh terdiri lebih dari 16 karakter'); 
		return false;
  	} 
						
	else{
		return true;	
	}
			
}


</script>

</body>

</html>
