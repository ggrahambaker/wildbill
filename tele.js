//tele.js

$(document).ready(function(){
	var essay = [];
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
	    

	    var html = textGen(general, detailed, original);
	    console.log('message');
	    $('#tele').append(html);
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
	return html;
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

