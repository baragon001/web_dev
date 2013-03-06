<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<title> Contact Me </title>
</head>
	<div class=wrapper id=contactwrapper>
	<?php include("header.html");?>
	<?php include("footer.html");?>
		
		<body>
			<div class="main_form">
			<form method="post" action="submit-thanks.php">
			<h1> Contact me: </h1>	
			<label>
			Name: <input id="Name" type="text" name="Name" required="on" /> <br> <br> 
			</label>
			<label>
			Email: <input id="Email" type="text" name="Email" required="on"/> <br> <br>
			</label>
			<label>
			Subject: <input id="Subject" type="text" name="Title" required="on" /> <br> <br>
			</label>
			<label>
			Message: <br>
			<textarea id="description" rows="10" cols="60" name="message" required="on"
			placeholder="What's on your mind?"></textarea> <br />
			</label>
			<label>
			When should I respond by? <input id="date" type="date" name="date" required/> <br> <br>
			</label>
		<input type="submit" value="Submit">
	</div>
	</form>
		
		
		
		</body>
	</div>