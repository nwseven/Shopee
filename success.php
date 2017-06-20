<?php 

session_start();
session_destroy();

?>

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
            <center>
            <h2>Terima kasih sudah mendaftar dan mengunjungi Shopee!</h2>
            <h4>Anda akan dipindahkan ke website utama dalam <span id="counter">5</span> detik</h4>
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
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=1) {
        location.href = 'http://shopee.co.id';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>

</body>

</html>
