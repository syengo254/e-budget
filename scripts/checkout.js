// JavaScript Document
$.setTrace = trace;
$.ajaxSetup({cache:false, error: function(xr, err){$.setTrace("<span style='color:yellow;'>" + err + "!!! Wait for 10 secs.</span>");}});
var onG = false;
function editCart(pid, action){
	switch(action){
		case 0:
		removeItem(pid)
		break;
		case 1:
		addQty(pid)
		break;
		case 2:
		lessQty(pid)
		break;
	}
}

function removeItem(pid){
	if(onG) return;
	onG = true;
	$.post('editCart.php',
	{
		"action":"delete",
		"id":pid
	},
	function(data){
		onG = false;
		if(data.success == 1){
			trace("<span style='color:blue;'>operation successfull!</span>");
			updateTable();
		}
		else{
			trace("<span style='color:red;'>failed!! Try again!!</span>");
		}
	},
	'json'
	);
}

function addQty(pid){
	if(onG) return;
	onG = true;
	$.post('editCart.php',
	{
		"action":"add",
		"id":pid
	},
	function(data){
		onG = false;
		if(data.success == 1){
			trace("<span style='color:blue;'>operation successfull!</span>");
			updateTable();
		}
		else{
			trace("<span style='color:red;'>failed!! Try again!!</span>");
		}
	},
	'json'
	);
}

function lessQty(pid){
	if(onG) return;
	onG = true;
	$.post('editCart.php',
	{
		"action":"less",
		"id":pid
	},
	function(data){
		onG = false;
		if(data.success == 1){
			trace("<span style='color:blue;'>operation successfull!</span>");
			updateTable();
		}
		else{
			trace("<span style='color:red;'>failed!! Try again!!</span>");
		}
	},
	'json'
	);
}

function updateTable(){
	$('#t-hold').append('refreshing....').load('ViewCart.php' + '#t-hold');
}

//tracer
function trace(text){
	$('#trace').html(text).animate({opacity:1.0},400, function(){
		setTimeout(function(){$('#trace').animate({opacity:0}, 600)}, 2000);
	});
}