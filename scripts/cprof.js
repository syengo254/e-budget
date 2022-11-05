// JavaScript Document
function enableForm(event){
	event.preventDefault();
	
	document.getElementById('fname').removeAttribute('disabled');
	document.getElementById('lname').removeAttribute('disabled');
	document.getElementById('email').removeAttribute('disabled');
	document.getElementById('town').removeAttribute('disabled');
	document.getElementById('area').removeAttribute('disabled');
	document.getElementById('street').removeAttribute('disabled');
	document.getElementById('plot').removeAttribute('disabled');
	document.getElementById('door').removeAttribute('disabled');
	document.getElementById('add').removeAttribute('disabled');
	document.getElementById('done').style.visibility = 'visible';
	
	document.getElementById('fname').select();
}

function editPersonal(){
	var fname = document.getElementById('fname').value;
	var lname = document.getElementById('lname').value;
	var email = document.getElementById('email').value;
	var town = document.getElementById('town').value;
	var area = document.getElementById('area').value;
	var street = document.getElementById('street').value;
	var plot = document.getElementById('plot').value;
	var door = document.getElementById('door').value;
	var add = document.getElementById('add').value;
	
	$.post('task/editdetails.php',
	{
		'user':'002',
		'fname':fname,
		'lname':lname,
		'email':email,
		'town':town,
		'area':area,
		'street':street,
		'plot':plot,
		'door':door,
		'add':add
	},
	function (data){
		if(data.success == 1){
			trace("<span style='color:#3FF;'>Details edited successfully.</span>");
			
			document.getElementById('fname').setAttribute('disabled', 'disabled');
			document.getElementById('lname').setAttribute('disabled', 'disabled');
			document.getElementById('email').setAttribute('disabled', 'disabled');
			document.getElementById('town').setAttribute('disabled', 'disabled');
			document.getElementById('area').setAttribute('disabled', 'disabled');
			document.getElementById('street').setAttribute('disabled', 'disabled');
			document.getElementById('plot').setAttribute('disabled', 'disabled');
			document.getElementById('door').setAttribute('disabled', 'disabled');
			document.getElementById('add').setAttribute('disabled', 'disabled');
			document.getElementById('done').style.visibility = 'hidden';
		}
		else{
			trace("<span style='color:#F00;'>An error occured. Try again later.</span>");
		}
	},
	'json'
	);
}

function trace(text){
	$('#trace').html(text).animate({opacity:1.0},400, function(){
		setTimeout(function(){$('#trace').animate({opacity:0}, 600)}, 2500);
	});
}