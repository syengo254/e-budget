// JavaScript Document
var dyna = $('#dyna');

function goNext(e, action){
	e.preventDefault();
	
	switch(action){
		case 2:
		showCodeConfirm();
		break;
		case 3:
		issueReceipt();
		break;
	}
}

function showCodeConfirm(){
	$.post('order.php',
	{action:true}, 
	function(data){
		console.log(data);
		data = JSON.parse(data);
		if(data.success == 1){
			$('#dyna').html('<img src="../images/loading.gif" width="24" height="24" style="position:relative; top:7px;" /> loading...').load('paycode.php' + '#payment');
			$('#steps').css("background-position", "0px -37px");
		}
		else{
			$('#payment').append("<span style='color:red;'>Order making failed.</span>");
		}
	}, 
	'text'
	);
}

function issueReceipt(){
	console.log('%cGenerating receipt', 'color:green;')
	$('#steps').css("background-position", "0px -74px");
	
	var htm = '<div class="d_box" style="top:20px; height:200px; width:470px;"><div class="btitle"><span style="position:relative; top:7px;">Congrats! Your order is complete!</span></div><div class="d_body" style="width:470px;">Your receipt is downloading. Please save it for references...<br />Click "done" below to go to the home page.<a class="button" style="margin:0 auto; top:20px;" href="../customer_home.php?action=clearcart">done</a></div></div>';
	
	$('#dyna').html(htm);
	$('#dyna').append('<iframe src="getReceipt.php" style="width:100px; height:100px; visibility:hidden;"></iframe>');
}

function payComplete(){// enables the next btn
	$('#step').css("visibility", "visible").show(400);
}