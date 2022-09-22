<?php 

if(isset($_POST['fname']) && 
   isset($_POST['uname']) && 
   isset($_POST['pass'])){

    include "db_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "Nickname jest wymagany";
    	header("Location: register.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "E-mail jest wymagany";
    	header("Location: register.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Hasło jest wymagane";
    	header("Location: register.php?error=$em&$data");
	    exit;
    }else {

    	// hashing the password
    	$pass = password_hash($pass, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO users(fname, username, password) 
    	        VALUES(?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$fname, $uname, $pass]);

    	header("Location: register.php?success=Twoje konto zostało stworzone pomyślnie");
	    exit;
    }


}else {
	header("Location: register.php?error=error");
	exit;
}