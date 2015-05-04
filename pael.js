$(document).ready(function(){
	var essay = new Array();
	$.get('politicsandtheenglishlang.txt', function(data){
	    var count = 0;
	    var lines = 7;
	    essay = data.split('\n');
	    // console.log(essay.length);

	    var general = new Array();
	    var detailed = new Array();
	    var original = new Array();

	    for (var i = 0; i < essay.length; i++) {
	    	// general
	    	if(i % lines === 0){
	    		count++;
	    		continue;
	    		
	    	} else if(i % lines === 1){
	    		general[count] = essay[i];
	    	}
	    	// line break
	    	else if(i % lines === 2){
	    		continue;
	    	}
	    	// detailed 
	    	else if(i % lines === 3){
	    		detailed[count] = essay[i];

	    	}
	    	// line break
	    	else if(i % lines === 4){
				continue;
	    	}
	    	// original
	    	else if(i % lines === 5){
	    		original[count] = essay[i];
	    	}
	    	// line break
	    	else if(i % lines === 6){
	    		continue;
	    	}
	    };

	    // console.log(general);
	    // console.log(detailed);
	    // console.log(original);

	    // console.log(count);
	    // console.log(general);
	    

	    textGen(general, detailed, original);
	    numberedGen(original);

		$('#home').click(function(){
			$('#reader').hide();
	    	$('#full').hide();
			$('#main').show();
	    });
	    $('#telescope').click(function(){
	    	$('#full').hide();
	    	$('#main').hide();
			$('#reader').show();
	    });
	    $('#fullEssay').click(function(){
	    	$('#reader').hide();
	    	$('#main').hide();
	    	$('#full').show();
	    });

	    $('button').click(function(){
    		$(this).next().toggle();
		});

	    $(function() {
			$( document ).tooltip();
		});
	});
});



/*
* pass in the view and
*/
var textGen = function(general, detailed, original){
	// console.log(message);
	var html = "";
	html += "<table class='table table-bordered'>";
	html += "<thead><tr><th>General Summary</th><th>Detailed Summary</th><th>Orwell's Original</th></tr></thead>";
	html += "<tbody>";
	for(var i = 1; i < general.length; i++){
		// $('#reader').append("<div id='" +i +"' class='row p"+ i+"'><p id='' class'general'>" + general[i] + "</p></div>");
		html += buildTelescope(general[i], detailed[i], original[i]);
	}
	html += "</tbody>";
	html += "</table>";
	$('#reader').append(html);
}


var buildTelescope = function(general, detailed, original){
	var html = "";
	html += "<tr>";
		html += "<td>";
		html += general;
		html += "</td>";
		html += "<td>";
		html += detailed;
		html += "</td>";
		html += "<td>";
		html += original;
		html += "</td>";
	html += "</tr>";
	return html;
}



var numberedGen = function(original){
	// var full = original.join("\n	");
	// console.log(full);
    var newText = "";

    var count = 1;
    for(var i = 1; i < original.length; i++){
    	// console.log(original[i]);
    	var paragraph = original[i].split(' ');

    	for (var j = 0; j < paragraph.length; j++) {
    		if(j === 0){
    			newText+= "<span class='tool leader' id="+count+"> "+paragraph[j] +"</span>";
    		} else {
    			newText+= "<span class='tool' id="+count+" title="+ count+"> "+paragraph[j] +"</span>";
    		}
    		
    		count++;
    	};
    	newText+= "<br>";
    	newText+= "<br>";
    }
    // console.log(newText);
    $('#full').append(newText);
}

// returns a string of html that I want to put in
var generalHtmlBuild = function(general, detailed, original, i){
	var html = "";
	// outside div
	html += "<div id='";
	html += i;
	html += "' class='row p";
	html += i;
	html += "'>";
	// inside div

	html += "<h4>";
	html += "Section " + i;
	html += "</h4>";
	
	html += "<p id='' class='general'>";
	html += general[i];
	html += "</p>";
	html += "<button>Detailed</button>";
		// detailed vies
		
		html += "<p class='detailed'>";
		html += detailed[i];
		html += "</p>";
		html += "<button>Original</button>";
			// original views
			html += "<p class='original'>";
			// need a for loop in here to give each original word
			html += original[i];
			html += "</p>";
			// close div
			html += "</div>";
		// close div
		html += "</div>";

	// close div
	html += "</div>";
	return html;
}

var numberOrg = function(text, count){
	var html = "";
	var array = text.split(" ");
	for (var i = 0; i < array.length; i++) {
		array[i]
	};

}





