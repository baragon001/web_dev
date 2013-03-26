<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<title> Nutrition Calculator </title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="text/javascript.js"></script>
</head>
	<div id="nutwrapper" class="wrapper">
	<?php include("header.html");?>
	<?php include("footer.html");?>
	<body class="body">
	<div id="var_form" class="main_form" >
	<form method="post" action="nutrition_results.php" onSubmit="return validAll();">
			<h1> Enter Your information: </h1>	
			<h3 id="fix_yo_stuff" class="warning">Please Fix Errors before Proceeding</h3> <br>
			Height: <input name="feet" " class="varBar height" type="number" id="heightft" required="on" /> feet  
					<input name="inches" class="varBar height" type="number" id="heightinch" /> inches 
					<label id="height_warning" class="warning"> Invalid Input </label>
			 <br> <br> 
			<label>
			Weight: <input name="weight" class="varBar" type="number" id="weight" required="on"/>pounds
			<label id="weight_warning" class="warning"> Invalid Input </label> <br> <br>
			</label>
			 <label id="goalLabel">Desired Weight:<input name="goal" " class="varBar" required="on"
			  type="number" id="goalweight"/> </label> pounds 
			  <label id="weightgoal_warning" class="warning"> Invalid Input </label><br> <br>
			<label>
			Age: <input name="age" class="varBar" type="number" id="age" required="on" /> years
			<label id="age_warning" class="warning"> Invalid Input </label> <br> <br>
			</label>
			<input class="rdio" type="radio" name="gender" value="male"/> Male 
			<input class="rdio" type="radio" name="gender" value="female"/> Female
			<br><br>
			<span class="sel_label">Body Type: </span><span class="sel_label">Activity Level:</span>
			<div id="sel_wrapper">
			<select name="body_type" id="sel_body_type">
			  <option value="ecto" selected="selected">Ectomorph</option>
			  <option value="meso">Mesomorph</option>
			  <option value="endo">Endomorph</option>
			</select>
			<select name="activity_level" id="sel_act">
			  <option value="1.2" selected="selected">Sedentary</option>
			  <option value="1.375">Lightly Active </option>
			  <option value="1.55"> Moderatey Active</option>
			  <option value="1.725"> Very Active</option>
			  <option value="1.9"> Extra Active</option>
			</select>
			
			</div>
			<br>
			<div id="ecto_details" class="clearfix">
				<h2> Typical Ectomorph Traits</h2>
				<img class="bodyimage" src="Images/ecto.jpg" alt="photo link broken!">
				<ul>
				<li>Small "delicate" frame and bone structure</li>
				<li> Flat chest </li>
				<li> Small shoulders </li>
				<li> Thin-Low BMI </li>
				<li> Finds it hard to gain weight</li>
				<li> Fast metabolism </li>
				</ul> 		
			</div>
			<div id="meso_details" class="clearfix">
				<h2> Typical Mesomorph Traits</h2>
				<img class="bodyimage" src="Images/meso.jpg" alt="photo link broken!">
				<ul>
				<li>Athletic</li>
				<li> Generally hard body </li>
				<li> Well defined muscles</li>
				<li> Rectangular shaped body</li>
				<li> Strong</li>
				<li> Gains muscle easily </li>
				<li> Gains fat more easily than ectomorphs </li>
				</ul> 		
			</div>
			<div id="endo_details" class="clearfix">
				<h2> Typical Endomorph Traits</h2>
				<img class="bodyimage" src="Images/endo.jpg" alt="photo link broken!">
				<ul>
				<li>Soft and round body</li>
				<li> Gains muscle and fat very easily </li>
				<li> Is generally short</li>
				<li> "Stocky" build</li>
				<li> Round physique</li>
				<li> Finds it hard to lose fat</li>
				<li> Slow metabolism </li>
				<li> Muscles are not so well defined </li>
				</ul> 	
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

