<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);
$namef = $_POST['name'];
$submit = $_POST['sub'];

if (isset($_SESSION['name'])) {
	header("location: index.php");
}

if (isset($submit)) {
	if (!empty($_POST['name'])) {
	$_SESSION['name'] = $namef;
	header("location: index.php");
	}else{
	$error = "Enter your name to start chating";
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>hello chating realtime</title>
	<script src="jquery.min.js"></script>
	<style type="text/css">
		body{
			background: #edeff1;
		    font-family: sans-serif;
		}
		#nameBox{
		padding: 50px 15px;
	    background: #fff;
	    box-shadow: 0px 0px 8px #c5c5c5;
	    border-radius: 2px;
	    width: 400px;
	    text-align: center;
	    margin: auto;
	    margin-top: 10%;
		}
		.inputT{
	    padding: 8px 15px;
	    outline: none;
	    border: none;
	    box-shadow: 0px 0px 21px #cad6e2;
	    border-radius: 100px;
	    width: 300px;
	    margin: 15px 0px;
		}
		.inputS{
		border: none;
	    background: #399cff;
	    color: #fff;
	    padding: 8px 15px;
	    border-radius: 100px;
	    text-decoration: none;
	    box-shadow: 0px 0px 21px #3a81c7;
	    outline: none;	
		}
		.inputS:hover,.inputS:focus{
		text-decoration: none;
		outline: none;	
		color: #fff;
		cursor: pointer;
		background: #357bc1;
		}
	</style>
</head>
<body>
	<div id="nameBox">
		<form method="post" action="">
			<input class="inputT" type="text" name="name" placeholder="Enter your name" />
			<input class="inputS" type="submit" name="sub" value="Start chating" />
		</form>
		<p style="color: red;"><?php echo $error; ?></p>
	</div>
</body>
</html>