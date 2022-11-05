// JavaScript Document
function enableForm(event){
	event.preventDefault();
	
	document.getElementById('name').removeAttribute('disabled');
	document.getElementById('phone').removeAttribute('disabled');
	document.getElementById('email').removeAttribute('disabled');
	document.getElementById('done').style.visibility = 'visible';
	
	document.getElementById('name').select();
}

function editSupplier(){
	var name = document.getElementById('name').value;
	var phone = document.getElementById('phone').value;
	var email = document.getElementById('email').value;
	
	$.post('task/editdetails.php',
	{
		'user':'001',
		'name':name,
		'phone':phone,
		'email':email
	},
	function (data){
		if(data.success == 1){
			trace("<span style='color:#3FF;'>Details edited successfully.</span>");
			
			document.getElementById('name').setAttribute('disabled', 'disabled');
			document.getElementById('phone').setAttribute('disabled', 'disabled');
			document.getElementById('email').setAttribute('disabled', 'disabled');
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