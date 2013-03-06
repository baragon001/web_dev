<html>
<head>
<link href="Styles.css" type="text/css" rel="stylesheet" />
</head>
	<body>
		<div id= "main">
			<?php include("header.html");?>
			<div class = "content min_height">
			<?php
				$Name= $_POST['Name'];
				$Department=$_POST['Department'];
				$Title= $_POST['Title'];
				$description = trim($_POST['descr']);
				$date= $_POST ['date'];
				$email= $_POST ['Email'];
				$fp = fopen('./project_list', "a+");
				fwrite($fp, "Name: ".$Name."\n");
				fwrite($fp, "Email: ".$email."\n");
				fwrite($fp, "Department: ".$Department."\n");
				fwrite($fp, "Title: ".$Title."\n");
				fwrite($fp, "Description: ".$description."\n~~~~~\n");
				fwrite($fp, "Deadline: ".$date."\n--------------------------------------\n");
				fclose($fp);
			?>
			<p>Thank you for your submission. Click <a href="index.html">here</a> to submit another request. <br> <br>
			Please email any additional files to web-editor@cornellsun.com </p>
			</div>
			<?php include("footer.html");?>	
		</div>
	</body>
</html>