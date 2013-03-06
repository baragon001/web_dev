<html>
<head>
<link href="styles.css" type="text/css" rel="stylesheet" />
</head>
	<body>
		<div id= "main">
			<?php include("header.html");?>
			<div class = "content min_height">
			<?php
				$Name= $_POST['Name'];
				$Title= $_POST['Title'];
				$message = trim($_POST['message']);
				$date= $_POST ['date'];
				$email= $_POST ['Email'];
				$fp = fopen('./messages', "a+");
				fwrite($fp, "Name: ".$Name."\n");
				fwrite($fp, "Email: ".$email."\n");
				fwrite($fp, "Subject: ".$Title."\n");
				fwrite($fp, "Message: ".$message."\n~~~~~\n");
				fwrite($fp, "Respond by: ".$date."\n--------------------------------------\n");
				fclose($fp);
			?>
			
			<h2 id="return"> Thank you for your message. Click <a href="index.php">here</a> to go back to About Me. <br> <br> </h2>
			</div>
			<?php include("footer.html");?>	
		</div>
	</body>
</html>