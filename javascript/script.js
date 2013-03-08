$(document).ready(function(){
	
	// font color change
	 $('input:radio[name=color]').change(function() { 
    	//red box checked
    	if($('input:radio[name=color]:checked').val()=="Red") {
    		$('#text').css("color", "red");
    	}
    	//blue box checked
    	if($('input:radio[name=color]:checked').val()=="Blue") {
    		$('#text').css("color", "blue");
    	}
    });
    
	// font family change
	 $('input:radio[name=family]').change(function() { 
    	//courier font family checked
    	if($('input:radio[name=family]:checked').val()=="courier,monospace") {
    		$('#text').css("font-family","courier,monospace" );
    	}
    	//times font family checked
    	if($('input:radio[name=family]:checked').val()=="times new roman,serif") {
    		$('#text').css("font-family","times new roman,serif" );
    	}
    	//arial font family checked
    	if($('input:radio[name=family]:checked').val()=="arial,sans-serif") {
    		$('#text').css("font-family","arial,sans-serif");
    	}
    });

	// font size change
	$('input:text[name=font]').keyup(function() { 
		//if there is an input
    	if($('input:text[name=font]').val().length>0) {
    		var fontNo=parseInt($('input:text[name=font]').val(), 10);
    		//and if input is valid
    		if((fontNo>8)&&(fontNo<80)) {
				var fontsize=$('input:text[name=font]').val();
				$('#text').css("font-size", fontsize+"px");
				//No warning, valid font size
				document.getElementById('sizeWarning').innerHTML = '';
			}
			else {
				//invalid font size, warning displayed
				document.getElementById('sizeWarning').innerHTML = 'Invalid Font Size';
			}
    	}
    });

	// font style change
	$('input:checkbox').click(function() { 
    	//if there is an input
    	if($('input:checkbox:checked').length>0) {
    		var chklst=[];
    		chklst=$('input:checkbox:checked');
    		var isBold=false;
    		var isItalic=false;
    		//iterate through checked checkboxes array, if "italic" or 
    		//bold" are found, set isItalic and/or isBold accordingly.
    		for (var i in chklst) {
 				 if (chklst[i].value=="italic") {
 				 	isItalic=true;
 				 } 
 				 else if (chklst[i].value=="bold") {
 				 	isBold=true;
 				 } 
 			} 
 			/**Control logic for bold/italic selections.As the case where both are checked is first
 			I assume that in the following cases, the selected style being true implies the other is
 			not set.
 			**/
 			if (isBold && isItalic) {
 			$('#text').css("font-weight", "bold");
 			$('#text').css("font-style", "italic");
 			} 
 			else if(isItalic) {
 			$('#text').css("font-style", "italic");
 			$('#text').css("font-weight", "normal");
 			} 
 			else if(isBold) {
 			$('#text').css("font-weight", "bold");
 			$('#text').css("font-style", "normal");
 			}
 			else {
 			$('#text').css("font-weight", "normal");
 			$('#text').css("font-style", "normal");
 			}
 		} 
 		//case where there is no input
 		else {
 		$('#text').css("font-weight", "normal");
 		$('#text').css("font-style", "normal");
 		}
    });

	// search functionality. NOTE THIS WAS PROVIDED.
	$("#search").bind('keyup', function(){

		// for each of the paragraphs in main text
		$("#text").children().each(function(){
			//retrieve the current HTML
			var currentString = $(this).html();

			//Remove existing highlights
			currentString = replaceAll(currentString, "<span class=\"matched\">","");
			currentString = replaceAll(currentString, "</span>","");

			// add in new highlights
			currentString = replaceAll(currentString, $("#search").val(), "<span class=\"matched\">$&</span>");

			// replace the current HTML with highlighted HTML
			$(this).html(currentString);
		});
	});

	// replace functionality
		$("#replace").click(function() { 
			//strip HTML tags from user input
			var inputOriginal=$("#original").val();
			var inputNew= $("#newtext").val();
			var noTagsOriginal = inputOriginal.replace(/(<([^>]+)>)/ig,"").trim();
			var noTagsNew= inputNew.replace(/(<([^>]+)>)/ig,"").trim();
			$("#original").val(noTagsOriginal);
			$("#newtext").val(noTagsNew);
			//for each of the paragraphs in main text
			$("#text").children().each(function(){
				//retrieve the current HTML
				var currentString = $(this).html();
				//and replace html with noTagsNew replacing noTagsOriginal
				var newString=replaceAll(currentString, noTagsOriginal, noTagsNew);
				$(this).html(newString);
			});
		});
});

/* Replaces all instances of "replace" with "with_this" in the string "txt"
   using regular expressions */
function replaceAll(txt, replace, with_this) {
	return txt.replace(new RegExp(replace, 'g'),with_this);
}