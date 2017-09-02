<?php 
session_start();
if (!isset($_SESSION['name'])) {
	header("location: name.php");
}
$name = $_SESSION['name'];
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
		#chating{
		    height: 280px;
		    overflow: auto;
		}
		#msgField{
			position: absolute;
		    bottom: 0;
		    left: 0;
		    right: 0;
		    width: 100%;
		    padding: 8px;
		    outline: none;
		    box-sizing: border-box;
		}
		#uStatus{
		    margin: 0;
		    padding: 8px;
		    background: #e6e6e6;
		}
		#chatBox{
		    background: white;
		    height: 350px;
		    width: 260px;
		    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.08);
		    position: fixed;
		    bottom: 0;
		    margin: 0px 50px;
		    border-radius: 2px;
		    border: 1px solid #c7c7c7;
		}
		#user{
			background: #36a7ec;
		    color: white;
		    padding: 8px 10px;
		    width: auto;
		    display: -webkit-inline-box;
		    margin: 8px;
		    border-radius: 20px;
		}
		#user2{
			background: #edeff1;
		    color: gray;
		    padding: 8px 10px;
		    width: auto;
		    display: -webkit-inline-box;
		    margin: 8px;
		    border-radius: 20px;
		}
		p{
			margin: 0;
		}
		#typing{
			display: none;
		}
	</style>
</head>
<body>
<a href="logout.php">logout</a>
	<div id="chatBox">
		<div><p id="uStatus">Connecting...</p></div>
		<div id="chating"><div id="chatingIn"></div></div>
		<div><input type="text" name="msg" id="msgField" /></div>
	</div>
	<script type="text/javascript">
		var conn = new WebSocket('ws://localhost:8080');
		conn.onopen = function(e) {
		    $('#uStatus').html("<?php echo $name; ?> <span style='color:green;'>[active]</span>");
		};

		conn.onmessage = function(e) {
		    $('#chatingIn').append("<p><span id='user2'>"+e.data+"</span></p>");
		  	$('#chating').animate({scrollTop:$('#chatingIn').height()}, 0);
		};
		$("#msgField").keypress(function(e) {	  
		e.preventDefault;
		var key = e.which;
		var msgField = $("#msgField").val();
		if(key == 13) 
		  {
		    $("#chatingIn").append("<p align='right'><span id='user'>"+msgField+"</span></p>");
		    conn.send(msgField);
		    $("#msgField").val("");
		    $('#chating').animate({scrollTop:$('#chatingIn').height()}, 0); 
			return false;
		  }
	});
	</script>
</body>
</html>