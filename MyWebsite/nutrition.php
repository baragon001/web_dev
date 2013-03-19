<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<title> About Me </title>
</head>
	<div class=wrapper id=aboutwrapper>
	<?php include("header.html");?>
	<?php include("footer.html");?>
	<body id="aboutbody" class="body">
	
	<div id="bodytype" class="main_form" >
	<form method="post" action="submit-thanks.php">
			<h1> Enter Your information: </h1>	
			<label>
			Height: <input class="nutbar" type="number" name="height" required="on" /> feet  
					<input class="nutbar" type="number" name="inches" required="on"/> inches <br> <br> 
			</label>
			<label>
			
			Weight: <input class="nutbar" type="number" name="weight" required="on"/>pounds<br> <br>
			</label>
			<label>
			
			Age: <input class="nutbar" type="number" name="age" required="on" /> years <br> <br>
			</label>
			<input class="rdio" type="radio" name="gender" value="male"> Male 
			<input class="rdio" type="radio" name="gender" value="female"> Female
			<br>
			<br>
			Body Type:
			<div id="bdytpe">
			<select>
			  <option value="ecto">Ectomorph</option>
			  <option value="meso">Mesomorph</option>
			  <option value="endo">Endomorph</option>
			  
			</select>
			</div>
			<br>
			<div id="ecto_details">
				<h2> Typical Ectomorph Traits</h2>
				<ul>
				<li>Small "delicate" frame and bone structure</li>
				<li> Flat chest </li>
				<li> Small shoulders </li>
				<li> Thin-Low BMI </li>
				<li> Finds it hard to gain weight</li>
				<li> Fast metabolism </li>
				</ul> <br>		
	</div>
			
			<input type="submit" value="Get My Diet!">
			
			
	</form>
	</div>
	
	
	
	<div id="graph"> 
	
	</div>
	
	<div id="form">
		
	</div>
	
	
	
	</body>
	</div>
</html>

