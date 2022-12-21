
/******  One way booking ********/

$(document).ready(function() {

	var bsurl = "index.php";

	// alert(bsurl);

	var ck = "Y";
	var crtme = $('#crTm').val();

	var tmSb = "";

	$.ajax({
	    		url: bsurl,
	      		type: "POST",

	      		data: {
	        			ck  : ck
	      		},

	      		success: function (data) {

	            if (data)
	            {
	            	for (var i = 0; i < data.length; i++) {
	            		
	            		if (crtme < data[i].time_slab)
	            		{
	            			$('#inputTime').append("<option value="+data[i].time_slab+">"+data[i].time_slab+"</option>");
	            		}
	            	}
	            }

	    	},

	        error: function (data)
	        {
	            console.log("error");
	        }
	  	});



	$('#dtPick').change(function() {

		var dt = $(this).val();
		var crdat = $('#crDt').val();
		var ck = "Y";
		var crtim = $('#crTm').val();
		
		if (dt != crdat) 
		{
			$.ajax({
			    		url: bsurl,
			      		type: "POST",

			      		data: {
			        			ck  : ck
			      		},

			      		success: function (data) {

			            if (data)
			            {
			            	tmSb = data;
			            	$('#inputTime').empty();
			            	for (var i = 0; i < data.length; i++) {
			            		
			            		$('#inputTime').append("<option value="+data[i].time_slab+">"+data[i].time_slab+"</option>");
			            	}
			            }

			    	},

			        error: function (data)
			        {
			            console.log("error");
			        }
			  	});
		}

		else
		{
			$.ajax({
			    		url: bsurl,
			      		type: "POST",

			      		data: {
			        			ck  : ck
			      		},

			      		success: function (data) {

			            if (data)
			            {
			            	$('#inputTime').empty();
			            	for (var i = 0; i < data.length; i++) {
			            		
			            		if (crtim < data[i].time_slab)
			            		{
			            			$('#inputTime').append("<option value="+data[i].time_slab+">"+data[i].time_slab+"</option>");
			            		}
			            	}
			            }

			    	},

			        error: function (data)
			        {
			            console.log("error");
			        }
			  	});
		}
		
	});

});


/************ Round Way Booking **********/


$(document).ready(function() {

	var bsurl = $('#bsurl').val();
	var ck = "Y";
	var crtme = $('#crTm').val();

	$.ajax({
	    		url: bsurl,
	      		type: "POST",

	      		data: {
	        			ck  : ck
	      		},

	      		success: function (data) {

	            if (data)
	            {
	            	for (var i = 0; i < data.length; i++) {
	            		
	            		if (crtme < data[i].time_slab)
	            		{
	            			$('#inputRdTime').append("<option value="+data[i].time_slab+">"+data[i].time_slab+"</option>");
	            		}
	            	}
	            }

	    	},

	        error: function (data)
	        {
	            console.log("error");
	        }
	  	});



	$('#dtPikr').change(function() {

		var dt = $(this).val();
		var crdat = $('#crDt').val();
		// alert(crdat);
		if (dt != crdat) 
		{
			$.ajax({
			    		url: bsurl,
			      		type: "POST",

			      		data: {
			        			ck  : ck
			      		},

			      		success: function (data) {

			            if (data)
			            {
			            	$('#inputRdTime').empty();
			            	for (var i = 0; i < data.length; i++) {
			            		
			            		$('#inputRdTime').append("<option value="+data[i].time_slab+">"+data[i].time_slab+"</option>");
			            	}
			            }

			    	},

			        error: function (data)
			        {
			            alert('Error');
			            // alert(data);
			            // console.log(data);
			        }
			  	});
		}
		
	});

});
