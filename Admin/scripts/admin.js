// JavaScript Document
//menu funcs
var timeout	= 500;
var closetimer	= 0;
var ddmenuitem	= 0;
// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}
document.onclick = mclose;

/* admin funcs*/
var canvas;

function handler(event, action){
	event.preventDefault();
	
	switch(action){
		case "vusers":
		showUsers();
		break;
		case "vstores":
		showStores();
		break;
		case "vorders":
		showOrders();
		break;
		case "vpays":
		showPays();
		break;
		case "sorders":
		sortOrders();
		break;
		case "showaddress":
		openAddresses();
		break;
		/*case "":
		
		break;*/
	}
}

function showUsers(){
	mode();
	
	canvas.append("<span style='position:relative; display:block; width:inherit; text-align:center; top: 10px; margin-bottom:10px; font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif; color:blue; font-weight:600;'>THE FOLLOWING IS THE LIST OF REG USERS ON E-BUDGET.COM:</span>");
	show('actions/users.php');
}

function showOrders(){
	mode();
	
	canvas.append("<span style='position:relative; display:block; width:inherit; text-align:center; top: 10px; margin-bottom:10px; font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif; color:blue; font-weight:600;'>THE FOLLOWING IS THE LIST OF ORDERS NOT COMPLETED <span style='color:black; font-weight:100;'>(click 'view addresses' to view the delivery addresses)</span>:</span><div><a class='button' style='width:190px; top:5px; margin:0 auto;' href='#' onclick='handler(event, \"showaddress\");'>view addresses</a></div>");
	show('actions/orders.php');
}

function showStores(){
	mode();
	
	canvas.append("<span style='position:relative; display:block; width:inherit; text-align:center; top: 10px; margin-bottom:10px; font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif; color:blue; font-weight:600;'>THE FOLLOWING IS THE LIST OF REG STORES ON E-BUDGET.COM:</span>");
	show('actions/stores.php');
}

function show(url){	
	$.post(url,
	{act:null},
	function (data){
		if(data.success == 1){
			canvas.append(data.content);
		}
		else if(data.success == -1){
			clearp();
			trace('<span style="color:#3FF;">There are no orders yet.</span>');
		}
		else{
			trace('<span style="color:#F00;">data fetching failed!!</span>');
		}
	},
	'json'
	);
}

function showPays(){
	mode();
	
	canvas.append("<span style='position:relative; display:block; width:inherit; text-align:center; top: 10px; margin-bottom:10px; font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif; color:blue; font-weight:600;'>THE FOLLOWING ARE ALL PAYMENTS MADE ON E-BUDGET.COM:</span>");
	canvas.css("width", "inherit");
	show('actions/pays.php');
}

function mode(){
	var html = '<div id="obstruct"><div id="canvas"><div onclick="clearp()" id="closer"></div></div><div id="opaq"></div></div>';
	$('#cont').prepend(html);
	$(document).bind('keydown', 'Esc', function(){ clear();});
	canvas = $("#canvas");
}

function clear(){
	$('#obstruct').css("display","none");
	$('#obstruct').html('');
	$(document).unbind('keydown');
}

function clearp(){
	$('#obstruct').css("display","none");
	$('#obstruct').html('');
	$(document).unbind('keydown');
}

function trace(text){
	$('#trace').html(text).animate({opacity:1.0},400, function(){
		setTimeout(function(){$('#trace').animate({opacity:0}, 600)}, 2200);
	});
}

function dropAcc(id, acc){
	var url = '';
	var affected = '';
	
	if(acc == 'supp'){
		url = 'actions/dropstore.php';
		affected = 'ACCOUNT';
	}
	else if(acc == 'user'){
		url = 'actions/dropcustomer.php';
		affected = 'ACCOUNT';
	}
	else{
		url = 'actions/delpayment.php';
		affected = 'PAYMENT';
	}
	
	var del = confirm("DELETE THIS " + affected + "?");
	if(!del) return;
	
	$.post(url,
	{id:id},
	function(data){
		if(data.success == 1){
			trace('<span style="color:#3FF;">' + affected + ' deletion succeded.</span>');
		}
		else{
			trace('<span style="color:#F00;">' + affected + ' deletion failed.</span>');
		}
	},
	'json'
	);
}

function viewContents(event, cartid){
	event.preventDefault();
	$.post("actions/viewCart.php?set=1",
	{id:cartid},
	function(data){
		if(data.success == 1){
			//document.open('actions/viewCart.php?set=2')
			window.open('actions/viewCart.php?set=2');
		}
		else if(data.success == -1){
			trace('<span style="color:#3FF;">There are no orders for now.</span>');
		}
		else if(data.success == 0){
			trace('<span style="color:#F00;">could not view cart contents.</span>');
		}
	},
	'json'
	);
}

// SORT CART ITEMS
function sortOrders(){
	mode();
	
	canvas.append("<a class=\"button\" href=\"#\" onclick='document.getElementsByClassName(\"button\").item(0).style.visibility = \"hidden\"; window.print(); return false;'>print</a><span style='position:relative; display:block; width:inherit; text-align:center; top: 10px; margin-bottom:10px; font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif; color:blue; font-weight:600;'>ITEMS HAVE BEEN GROUPED ACCORDING TO WHERE THEY WERE BOUGHT FROM:</span>");
	
	$.post("actions/sortorders.php",
	{act:null},
	function(data){
		//alert(data); return;
		if(data.success == 1){
			canvas.css("min-width", "1200px;");
			canvas.append(data.content);
			trace('<span style="color:#3FF;">Showing items</span>');
		}
		else if(data.success == -1){
			trace('<span style="color:#3FF;">there are no records to display.</span>');
			setTimeout(clearp(), 3000);
		}
		else{
			trace('<span style="color:#3FF;">An error occured try again sometimes.</span>');
			setTimeout(clearp(), 3000);
		}
	},
	'json'
	);
}
function openAddresses(){
	window.open('actions/orderadresses.php');
}