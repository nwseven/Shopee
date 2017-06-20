<?php

session_start();

$con = mysql_connect("localhost", "root", "");
mysql_select_db("shopee");

function simple_encrypt($text)
{
	return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, "ShOpEeTEChn1CaL!", $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

function simple_decrypt($text)
{
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, "ShOpEeTEChn1CaL!", base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

if (isset($_REQUEST['login'])) {
	
    $username  = $_REQUEST['username'];
    $password = $_REQUEST['password'];
	
	if (strlen($username) < 6 || strlen($username) > 15) {
        echo "<script>alert('Username harus terdiri dari 6-15 karakter');</script>";
        echo "<script>location='login.php';</script>";
    }
	
	else if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $username)){
    	echo "<script>alert('Username yang dimasukkan harus dalam alfabet dan angka');</script>";
        echo "<script>location='login.php';</script>";
	}
	
	if (strlen($password) < 8 || strlen($password) > 16) {
        echo "<script>alert('Password harus terdiri dari 8-16 karakter');</script>";
        echo "<script>location='login.php';</script>";
    }   
    
    $query = mysql_query("select * from users where username='$username'");
    
    if (mysql_num_rows($query) == 0) {
        echo "<script>alert('Username yang dimasukkan salah');</script>";
        echo "<script>location='login.php';</script>";
    } 
	
	else {
		
        $query2 = mysql_query("select * from users where username='$username'");
        
        while ($row2 = mysql_fetch_array($query2, MYSQL_ASSOC)) {
                        
            if ($row2['password'] == (crypt($password, $row2['password']))) {
                
                $_SESSION['username']  = simple_encrypt($username);
				
				$query = mysql_query("select * from preferred_seller where username='$username'");
    
    			if (mysql_num_rows($query) == 0) {
        			echo "<script>location='preferredSeller.php';</script>";
    			} 
				else{
					echo "<script>location='success.php';</script>";
				}
                
            }
            
            else {
                echo "<script>alert('Password yang dimasukkan salah');</script>";
                echo "<script>location='login.php';</script>";
            } //else incorrect password
            
        } //while
        
        
    } //else correct username
    
} //if login

?>