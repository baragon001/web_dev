<html>
<?php
//test server side that inputs are valid.
function validInputs() {
	$allSet=isset($_POST['feet'])&&isset($_POST['inches'])&&isset($_POST['weight'])
			&&isset($_POST['age']) &&isset($_POST['activity_level']) && isset($_POST['body_type'])
			&&isset($_POST['gender'])&&isset($_POST['goal']);
	if($allSet){
		//fetch set variables
		$feet=$_POST['feet'];
		$inches=$_POST['inches'];
		$weight=$_POST['weight'];
		$age=$_POST['age'];
		$activity_level= $_POST['activity_level'];
		$body_type= $_POST['body_type'];
		$gender= $_POST['gender'];
		$goal= $_POST['goal'];
		//enforcing limits on numerical inputs
		$validWeight=$weight<1400;
		$validHeight=($feet<15) && (inches<13);
		$validAge=$age<130;
		$validGoal=$goal<$weight;
		return $validHeight && $validWeight && $validAge && validGoal;
	} 
	else{
		return false;
	}
}

if(validInputs()){
echo($str);
	$feet=$_POST['feet'];
	$inches=$_POST['inches'];
	$weight=$_POST['weight'];
	$age=$_POST['age'];
	$activity_level= $_POST['activity_level'];
	$body_type= $_POST['body_type'];
	$gender= $_POST['gender'];
	$goal= $_POST['goal'];
	
	/**Note the following formula for BMR comes from 
	 http://www.bmi-calculator.net/bmr-calculator/bmr-formula.php 
	 */
	if ($gender=='male'){
		$BMR= 66+(6.23*$weight)+(12.7*((12*$feet)+$inches))-(6.8*$age);
	}
	else {
		$BMR= 655+(4.35*$weight)+(4.7*((12*$feet)+$inches))-(4.7*$age);
	}
	/**Note the following formula for Total Caloric Need(TCN) comes from
	http://www.bmi-calculator.net/bmr-calculator/harris-benedict-equation
	*/
	$TCN=$activity_level*$BMR;
	/**NOTE: Assuming person using this is at 20%, a little lower than the US national average. 
	 * Estimation Methods for this without a caliper or equipment are VERY inaccurate */
	if($body_type=="meso"){
		$totProtein=1.25*.80*$weight;
		$default_pro=($totProtein*4)/($TCN);
		$default_fat=.2;
		$default_carb=1.0-$default_pro-$default_fat;
	} else if($body_type=="ecto") {
		$totProtein=1.5*.80*$weight;
		$default_pro=($totProtein*4)/($TCN);
		$default_fat=.25;
		$default_carb=1.0-$default_pro-$default_fat;
	} else {
		$totProtein=1.5*.80*$weight;
		$default_pro=($totProtein*4)/($TCN);
		$default_fat=.27;
		$default_carb=1.0-$default_pro-$default_fat;
	}
}
?>

<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<title> Nutrition Calculator </title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="text/javascript.js"></script>
<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'type');
        data.addColumn('number', 'percentage');
		<?php 
		
		echo ("data.addRows([
          ['Protein', $default_pro],
          ['Fat', $default_fat],
          ['Carbohydrates', $default_carb],
        ]);")
		
		?>
        // Set chart options
        var options = {'title':'Where your calories should come from:',
                       'width':500,
                       'height':400,
                       'chartArea': {'width': '100%', 'height': '80%'},
                       'fontSize': 20};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
		  <?php
		  if(validInputs()){
		  $str="var data = google.visualization.arrayToDataTable([['Week', 'Weight'],";
		  //assumes a weightloss rate at a reasonable 1lb a week.
		  $rate=1;
		  $time=ceil(($weight-$goal)/$rate);
		  for($t=0; $t<=$time; $t++){
		  	if($t<$time) {
		  		$currentWeight= $weight-($rate*($t));
		  		$str.= " [$t, $currentWeight],";		
		  	}
		  	else {
		  		$currentWeight= $weight-($rate*($t));
		  		$str.= " [$t, $currentWeight]]);";
		  	}
		  }
		  echo($str);
		  }
		  ?>
          

        var options = {
          title: 'Time vs. Weight',
          vAxis: {title: 'Weight(lbs)',  titleTextStyle: {color: 'black'}}, 
          hAxis: {title: 'Weeks',  titleTextStyle: {color: 'black'}},
          'fontSize': 20
        };

        var chart = new google.visualization.LineChart(document.getElementById('graph_div'));
        chart.draw(data, options);
      }
    </script>
</head>
	<div id="testwrapper">
	<?php include("header.html");?>
	<?php include("footer.html");?>
	<body class="body">
	<div id="res_wrapper" class="clearfix"> 
		<div id="TCN_wrapper">
		<h1 id="TCN"> Daily Caloric Need: <br><?php echo $TCN?> calories </h1>
		</div>
		 <div id="content_wrapper" class="clearfix">
		 
		 <br> <br>
		 <div id="chart_div" align='center'></div>  
		 <div id="graph_div" style="width: 600px; height: 400px;"></div>
		 </div>
	</div>
	</body>
	</div>
</html>
	