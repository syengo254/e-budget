// JavaScript Document
var step = 0;
var wait = false;
var dataready = false;

$(document).ready(function() {
	step = 2;
	console.log('%cscript added with no errors...','color:blue')
});

function handler(event, _step){
	event.preventDefault();
	if(step > 0){
		switch(_step){
			case 2:
			send_capt_code();
			break;
			case 3:
			send_address_info();
			break;
			case 4:
			finish();
			break;
			default:
			return;
		}
	}
	else{
		alert("Wait for DOM to fully load!");
	}
}

function send_capt_code(){
	if(!wait){
		wait = true;
		$.post("captcha.php",
		{code:$('#code').val()},
		function(data){
			console.log(data);
			data = JSON.parse(data);
			if(data.success == 1){
				$('c').load("addressform.php" + "#holder");
				$('#steps').css("background-position","0px -37px");
				step = 3;
				wait = false;
			}else{
				$("span#lc").append("<span style='color:#f00;'> wrong captcha. Try again.</span>");
				reset_captcha();
				wait = false;
			}
		},
		'text'
		);
	}
}

function verify(){
	if($('#town').val() == ''){
		alert('Please enter your town name.');
		$('#town').css("border", "1px solid #f00");
		$('#town').focus();
		return;
	}
	else if($('#area').val() == ''){
		alert('Please enter your area name.');
		$('#area').css("border", "1px solid #f00");
		$('#area').focus();
		return;
	}
	else if($('#street').val() == ''){
		alert('Please enter your street name.');
		$('#street').css("border", "1px solid #f00");
		$('#street').focus();
		return;
	}
	else if($('#plot').val() == ''){
		alert('Please enter your plot name.');
		$('#plot').css("border", "1px solid #f00");
		$('#plot').focus();
		return;
	}
	else if($('#door').val() == ''){
		alert('Please enter your door name.');
		$('#door').css("border", "1px solid #f00");
		$('#door').focus();
		return;
	}
	else if($('#add').val() == ''){
		alert('Please any additional info to aid in delivery.');
		$('#add').css("border", "1px solid #f00");
		$('#add').focus();
		return;
	}
	else{
		dataready = true;
		console.log("All address fields are OK!");
	}
}

function send_address_info(){
	verify();
	
	var town = $('#town').val();
	var area = $('#area').val();
	var street = $('#street').val();
	var plot = $('#plot').val();
	var door = $('#door').val();
	var add = $('#add').val();
	
	if(!wait && dataready){
		wait = true;
		dataready = false;
		
		$.post("fill_address.php",
		{
			town:town,
			area:area,
			street:street,
			plot:plot,
			door:door,
			add:add
		},
		function(data){
			console.log(data);
			data = JSON.parse(data);
			if(data.success == 1){
				$('#resp').html("<img src='../images/success.png' style='position:relative; top:2px; margin-right:3px; display:inline;' />Addressing Information has been recieved.");
				$('#resp').css("display", "block");
				$('#asub').hide(500);
				wait = false;
				step = 4;
				$.post('sendsms.php',
					{val:"customer"},
					function(data){
						console.log(data);
					},'text/html'
				);
				setTimeout('show_finish()', 3000);
			}
			else if(data.success == -1){
				$('#resp').html("<img src='../images/fail.png' style='position:relative; top:2px; margin-right:3px; display:inline;' /><b>Error</b>: An error occured during registration. Try to resubmit.").css("color", "#F00");
				$('#resp').css("display", "block");
				wait = false;
			}
			else if(data.success == 0){
				alert("An error occured. Try to register again after 20 minutes.");
				document.location = "http://localhost/e-budget.com/joinpage.php";
			}
			else{
				alert(String (data));
				wait = false;
			}
		},
		'text'
		);
	}
}

function show_finish(){
	$("c").empty();
	$('c').load("cfinish.php" + "#holder");
	$('#steps').css("background-position","0px -74px");
	console.log("finish steps");
}

function finish(){
	wait = false;
	if($("#smscode").val() != "" && !wait){
		wait = true;
		var code = $("#smscode").val();
		$('#resp').css('display', 'block');
		
		$.post("verifier.php",
		{smscode:code},
		function(data){
			console.log(data);
			data = JSON.parse(data);
			wait = false;
			if(data.success == 1){
				window.document.location = "http://localhost/e-budget.com/customer_home.php?reg=complete&user=002";
			}
			else if(data.success == 0){
				$('#resp').html("<span style='color:red'>You entered the wrong code. Try again.</span>");
			}
		},"text"
		);
	}else{
		alert("Please enter the code!");
		$("#smscode").focus();
		$("#smscode").css("border-width", "2px");
	}
}

function reset_captcha(){
	$('#icap').attr("src","#").attr("src","captcha_img.php?gg="+Math.random()*8);	
	console.log('captcha has been reset');
}