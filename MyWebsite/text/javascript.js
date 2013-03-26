function validHeight () {
		var heightft=$("#heightft").val();
		var heightinch=$("#heightinch").val();
		if (heightft>9 || heightinch>12) {
			$('#height_warning').css("display", "inline");return false;
		} else {$('#height_warning').css("display", "none"); return true;}
}
function validWeight() {
	var weight=$("#weight").val();
	if (weight>1400) {
		$('#weight_warning').css("display", "inline"); return false;
	} else {$('#weight_warning').css("display", "none");return true;}
}
function validAge() {
	var age=$("#age").val();
	if (age>122) {
		$('#age_warning').css("display", "inline"); return false;
	} else {$('#age_warning').css("display", "none"); return true;}
}
function validAll(){
	var height=validHeight();
	var weight=validWeight();
	var age=validAge();
	var goal=validGoal();
	if(!(height&&goal&&weight&&age)) {
		$('#fix_yo_stuff').css("display", "inline"); 
		return false;
	}
	else {return true;}
}
function validGoal() {
	var weight=$("#weight").val();
	var goal=$("#goalweight").val();
	if ((goal>weight)||goal<0) {
		$('#weightgoal_warning').css("display", "inline"); return false;
	} else {$('#weightgoal_warning').css("display", "none");return true;}
}
$(document).ready(function(){
	//body type change-update details for body types
	$('#sel_body_type').change(function() { 
		var sel=$('#sel_body_type option:selected').val();
		if (sel=="ecto") {
			$('#ecto_details').css("display", "block");
			$('#endo_details').css("display", "none");
			$('#meso_details').css("display", "none");
		} else if (sel=="endo") {
			$('#ecto_details').css("display", "none");
			$('#endo_details').css("display", "block");
			$('#meso_details').css("display", "none");
		} else if (sel=="meso") {
			$('#ecto_details').css("display", "none");
			$('#endo_details').css("display", "none");
			$('#meso_details').css("display", "block");
		}	
	});
	//height changes-check feet<10 and inches<13  and displays warning if needed
	$('.height').change(validHeight);
	/**weight changes-check that weight<1400(apparently someone actually weighed that)
	and displays warning if needed **/
	$('#weight').change(validWeight);
	/**age changes-check that age<122(apparently someone was that old)
	and displays warning if needed **/
	$('#age').change(validAge);
	$('#goalweight').change(validGoal);
}); 