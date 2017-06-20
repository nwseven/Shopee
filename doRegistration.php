<?php

session_start();

$con = mysql_connect("localhost", "root", "");
mysql_select_db("shopee");

//To Generate Random String According To Desired Length
function randomString($length)
{
    $str        = "";
    $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
    $max        = count($characters) - 1;
    
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

function simple_encrypt($text)
{
	return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, "ShOpEeTEChn1CaL!", $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

function simple_decrypt($text)
{
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, "ShOpEeTEChn1CaL!", base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

if (isset($_REQUEST['register'])) {
	
	$username  = $_REQUEST['username'];
	$email  = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirmpassword = $_REQUEST['confirmpassword'];

    //Encrypt The Password
    $saltMd5     = randomString(8);
    $salt        = "$1$" . $saltMd5 . "$";
    $cryptedPass = crypt($password, $salt); // Encrypted Password
    	
    $query = "select count(username) from users where username='$username'";
    $qry   = mysql_query($query);
    $row   = mysql_fetch_array($qry);
	
	if (strlen($username) < 6 || strlen($username) > 15) {
        echo "<script>alert('Username harus terdiri dari 6-15 karakter');</script>";
        echo "<script>location='register.php';</script>";
    }
	
	else if ($row[0] >= 1) {
        echo "<script>alert('Username yang dimasukkan telah digunakan sebelumnya');</script>";
        echo "<script>location='register.php';</script>";
    }
	
	else if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $username)){
    	echo "<script>alert('Username yang dimasukkan harus dalam alfabet dan angka');</script>";
        echo "<script>location='register.php';</script>";
	}
	
	else if (strlen($password) < 8 || strlen($password) > 16) {
        echo "<script>alert('Password harus terdiri dari 8-16 karakter');</script>";
        echo "<script>location='register.php';</script>";
    }
	
	else if ($password!=$confirmpassword) {
        echo "<script>alert('Password harus sama dengan Konfirmasi Password');</script>";
        echo "<script>location='register.php';</script>";
    }

    else {
		
		$query  = "select count(user_id) from users";
    	$qry    = mysql_query($query);
    	$row    = mysql_fetch_array($qry);
		$userid=$row[0];
				
        if (mysql_query("insert into users(user_id, username, email, password) 
                        values (
                            '" . $userid . "',
							'" . $username . "', 
                            '" . $email . "',
                            '" . $cryptedPass . "'
                        )")){
            
        				$_SESSION['username']  = simple_encrypt($username);
						echo "<script>location='preferredSeller.php';</script>";          
        } else {            
            echo "<script>alert('Pendaftaran gagal');</script>";
            echo "<script>location='register.php';</script>";
        }
        
    }
	
}

if (isset($_REQUEST['preferredseller'])) {
	
	$ktpnumber  = $_REQUEST['ktpnumber'];
    	
    $query = "select count(username) from preferred_seller where KTP_number='$ktpnumber'";
    $qry   = mysql_query($query);
    $row   = mysql_fetch_array($qry);
	
	if (strlen($ktpnumber) != 16) {
        echo "<script>alert('No. KTP harus terdiri dari 16 angka');</script>";
        echo "<script>location='preferredSeller.php';</script>";
    }
	
	else if ($row[0] >= 1) {
        echo "<script>alert('No.KTP yang dimasukkan telah digunakan sebelumnya');</script>";
        echo "<script>location='preferredSeller.php';</script>";
    }
	
	else if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $ktpnumber) || preg_match('/[A-Za-z]/', $ktpnumber)){
    	echo "<script>alert('No. KTP yang dimasukkan harus dalam angka');</script>";
        echo "<script>location='preferredSeller.php';</script>";
	}
	
	else if (empty($_FILES["userphoto"]["tmp_name"])){
		echo "<script>alert('Tolong pilih Foto User');</script>";
        echo "<script>location='preferredSeller.php';</script>";	
	}
	
	else if (empty($_FILES["ktpphoto"]["tmp_name"])){
		echo "<script>alert('Tolong pilih Foto KTP');</script>";
        echo "<script>location='preferredSeller.php';</script>";
	}
	
	else if($_FILES['userphoto']['type']!="image/jpeg" && $_FILES['userphoto']['type']!="image/jpg" && $_FILES['userphoto']['type']!="image/png"){
		echo "<script>alert('Tolong pilih file jpg atau png untuk Foto User');</script>";
        echo "<script>location='preferredSeller.php';</script>";	
	}
	
	else if($_FILES['ktpphoto']['type']!="image/jpeg" && $_FILES['ktpphoto']['type']!="image/jpg" && $_FILES['ktpphoto']['type']!="image/png"){
		echo "<script>alert('Tolong pilih file jpg atau png untuk Foto KTP');</script>";
        echo "<script>location='preferredSeller.php';</script>";
	}

    else {
		
		$userphoto = basename($_FILES['userphoto']['name']);
		$ktpphoto = basename($_FILES['ktpphoto']['name']);
		
		$username= simple_decrypt($_SESSION['username']);
		
		$query  = "select count(preferred_seller_id) from preferred_seller";
    	$qry    = mysql_query($query);
    	$row    = mysql_fetch_array($qry);
		$preferredsellerid=$row[0];
				
        if (mysql_query("insert into preferred_seller(preferred_seller_id, username, KTP_number, user_photo, KTP_photo) 
                        values (
							'" . $preferredsellerid . "', 
                            '" . $username . "', 
                            '" . $ktpnumber . "',
                            '" . $userphoto . "',
							'" . $ktpphoto . "'
                        )")){
							
						echo "<script>location='success.php';</script>";  
						        
        } else {            
            echo "<script>alert('Pendaftaran gagal');</script>";
            echo "<script>location='index.php';</script>";
        }
        
    }
	
}

?>