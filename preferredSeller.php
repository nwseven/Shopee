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
      		<a href="login.php"><div class="orangefont"><h3>&#8592;</h3></div></a>
            <hr/>
            <center>
            <div class="formstyle">            	
            	<form action="doRegistration.php" method="post" enctype="multipart/form-data">
            		<input class="form-control" type="text" placeholder="No. KTP" name="ktpnumber">
                    <input class='form-control' type="file" placeholder="Foto User" name="userphoto">
                    <input class='form-control' type="file" placeholder="Foto KTP" name="ktpphoto">
                    <input class="orangebutton btn" type="submit" onClick="return preferredSeller();" name="preferredseller" value="Register" style="width:100%;">
            	</form>
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

function preferredSeller(){
			
	var ktpnumber = document.getElementsByName('ktpnumber');
	
	if(!ktpnumber[0].value){
		alert('Tolong isi No. KTP untuk mendaftar');
		return false;				
	}
	
	else if (ktpnumber[0].value.length !=16){  
    	alert('No. KTP harus terdiri dari 16 karakter'); 
		return false;
  	}
	
	else if(isNaN(ktpnumber[0].value)){  
    	alert('No. KTP harus ditulis dalam angka'); 
		return false;
  	}
						
	else{
		return true;	
	}
			
}

</script>

</body>

</html>
