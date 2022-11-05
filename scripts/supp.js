// JavaScript Document
var step = 0;
var wait = false;
var dataready = false;

$(document).ready(function() {
	step = 2;
	console.log("%cScript added succesfully!", 'color:blue');
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
				$('c').load("uploadfrom.php" + "#holder");
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

function reset_captcha(){
	$('#icap').attr("src","#").attr("src","captcha_img.php?gg="+Math.random()*8);
	console.log('captcha loaded!');	
}

function startUpload(){
	if($('#logo').val() == ''){
		alert("please select a file!!");
		return false;
	}
	else{
		document.getElementById("response").innerHTML = "<img src='../images/loading.gif' style='position:relative; top:2px; margin-right:3px; display:inline;' width='24' heigh='24' /> uploading please wait...";
		return true;
	}
}

function stopUpload(success){
	console.log(success);
	if(success == 1){
		document.getElementById("response").style.color = "#0F0";
		document.getElementById("response").innerHTML = "<img src='../images/success.png' style='position:relative; top:2px; margin-right:3px; display:inline;' /> File uploaded Successfully.";
		step = 4;
		$.post('sendsms.php',
		{val:"store"},
		function(data){
			console.log(data);
		},'text/html'
		);
		setTimeout('show_finish()', 3000);
	}
	else if(success == -1){
		document.getElementById("response").style.color = "#F00";
		document.getElementById("response").innerHTML = "<img src='../images/fail.png' style='position:relative; top:2px; margin-right:3px; display:inline;' /> File size is too large or bad file type. Choose another one.";
	}
	else if(success == 0){
		document.getElementById("response").style.color = "#F00";
		document.getElementById("response").innerHTML = "<img src='../images/fail.png' style='position:relative; top:2px; margin-right:3px; display:inline;' /> File upload Failed.";
	}
	else{
		document.getElementById("response").style.color = "#F00";
		document.getElementById("response").innerHTML = "<img src='../images/fail.png' style='position:relative; top:2px; margin-right:3px; display:inline;' /> File upload Failed.";
	}
	return true;
}

function show_finish(){
	$('c').empty();
	$('c').load("sfinish.php" + "#hold");
	$('#steps').removeAttr("style").css("background-position", "0px -74px");
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
				window.document.location = "http://localhost/e-budget.com/supplier_home.php?reg=complete&user=001";
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