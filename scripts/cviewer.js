//Javascript

var _row = 0;
var on = false;
var quantity = 0;
var p_id = 0;
var store = 0;
var EOF = false;// to know if all db rows have been fetched.

$(document).ready(function() {
	$(window).scrollTop(0);
    setTimeout(init(), 600);
});

$.ajaxSetup({error: function(obj, err, data){alert('ajax error!!' + err); console.log(data);}});

function init(){
	$.post("task/product_feed.php",
		{
			mode:"view",
			view_as:"all",
			row:0
		},
		function(data){
			if(data.success == 1){
				_row = _row + 12;
				$('#right').append(data.content);
				$('#cont').height($('#cont').height() + 150);
				$(window).scroll(function(e){
					if($(this).scrollTop() == window.scrollMaxY){
						autoLoad();
					}
				});
			}else{
				alert('');
				$('#right').append("failed to load products.");
			}
		},
		'json'
	);
}

function autoLoad(){
	if(EOF) return;
	$.post("task/product_feed.php",
		{
			mode:"view",
			view_as:"all",
			row:_row
		},
		function(data){
			if(data.success == 1){
				if(data.content == "EOF") { EOF = true; return;}
				_row = _row + 12;
				$('#right').append(data.content);
				$('#cont').height($('#cont').height() + 150);
			}else{
				alert('');
				$('#right').append("failed to load products.");
			}
		},
		'json'
	);
}

function addToCart(event, id, store_id, canv){
	event.stopPropagation();
	event.preventDefault();
	if($('#logged').val() == 'TRUE'){
		if(!on){
			var y = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.offsetTop + 50;
			var x = event.target.parentNode.parentNode.parentNode.parentNode.offsetLeft + 50;
			
			if(canv){
				y = event.target.parentNode.parentNode.parentNode.parentNode.offsetTop + 50;//.parentNode.parentNode.offsetTop;
			}
			
			//alert(event.target.parentNode.parentNode.parentNode.parentNode.parentNode.offsetTop);
			
			p_id = id; // set product id.
			store = store_id;
			on = true;
			getQuantity(x, y);
		}
	}
	else if($('#logged').val() == 'SUPP'){
		alert("You cannot make an order with a supplier account. Signup for a customer account instead.");
	}
	else{
		alert("Register to make an order. It's free and easy - 2steps only!");
	}
}

function getQuantity(a, b){
	var posx = a + "px";
	var posy = b + "px";
	
	$('#quantity').show(300);
	$('#quantity').css("top", posy);
	$('#quantity').css("left", posx);
	$('#qty').val('');
	$('#qty').focus();
}

function cancelQty(){
	$('#quantity').hide(600);
	on = false;
}

function setQuantity(){
	quantity = parseFloat($('#qty').val().replace(' ', ''));
	
	if(isNaN(quantity)){
		$('#qty').val('').focus();
		trace("<span style='color:#3FF;'>Enter a number for quantity</span>");
		return;
	}
	on = false;
	$('#quantity').hide(400, function(){
		$.post("task/addtoCart.php",
		{
			"quantity":quantity,
			"pid":p_id,
			"sid":store
		},
		function(data){// remember to set a response variable named num_items for number of items in cart.
			if(data.success == 1){
				trace("<span style='color:#3FF;'>Added to cart successfully!!</span>");
				$('#cart').html("Shopping Cart (" + data.num_items + " items)");
			}
			else if(data.success == 0){
				trace("<span style='color:red;'>Transaction failed!! Try again.</span>");
			}
			else if(data.success == -2){
				trace("<span style='color:#3FF;'>Quantity specified id not correct!!</span>");
			}
			else if(data.success == 'C.O'){
				trace("<span style='color:#3FF;'>Too much quantity for a customer!!</span>");
			}
			else{
				alert("You are not logged in. Your session has expired...please login and try again.");
			}
		},
		'json'
		);
	});
}

function showDetails(event, cat, subcat, img, s_img, cost, qtty, desc, id, storeid){// takes category and subcategory names as params.
	//show modal.
	var x = event.target.parentNode.parentNode.parentNode.parentNode.offsetLeft + "px";
	var y = (event.target.parentNode.parentNode.parentNode.offsetTop - 100) + "px";
	var str = '<div class="det_holder"><img src="images/close.png" style="position:absolute; right:0px; z-index:21; cursor:pointer;" onclick="close_det();" width="24" height="24" /><div class="item_title"><span style="position:relative; top:3px;">' + desc + ' ' + qtty + '</span><div class="cat-info"><a href="#">' + cat + '</a> > <a href="#">' + subcat + '</a></div></div><div class="pic"><div class="store_img" style="font-weight:bold; font-size:24px; z-index:21; color:#003;"><span style="position:relative; top:-27px;">Available at:</span></div><img src="' + s_img + '" class="store_img" /><img src="' + img + '" width="347" height="274" /></div><div class="p_tag"><div class="left">Price: <span style="color:#FFFF00;">' + cost + '.00/=</span></div><div class="right"><a class="button" onclick="addToCart(event, '+id+', '+storeid+',true)" href="#"><span style="position:relative; top:2px;">BUY</span></a></div></div></div>';
	$('#right').prepend(str);
	$('div.det_holder').show(400).css("top",y).css("left", x);
}

function close_det(){
	$('div.det_holder').hide(400, function(){$('div.det_holder').empty().css("visibility", "hidden");});
	$('#right').remove($('div.det_holder'));
}

function trace(text){
	$('#trace').html(text).animate({opacity:1.0},400, function(){
		setTimeout(function(){$('#trace').animate({opacity:0}, 600)}, 2200);
	});
}

//fetch subcategories or categories
function getSpecific(event){
	event.preventDefault();
	$('#cont').height(599);
	//document.getElementById('').getAttribute(
	var _link = event.target;
	var url = _link.getAttribute("href");
	EOF = false;
	$(window).scrollTop(0);
	_row = 0;
	$('#right').html("<div style='position:relative; left:50px;'><img style='position:relative; top:10px;' src='images/loading.gif' />&nbsp;&nbsp;Please wait your selected category is being loaded.</div>");
	$.post(url,
	{"row":0, "action":"c_view"},
	function(data){
		if(data.success == 1){
			$('#right').empty();
			$('#right').html('<div id="quantity">Please specify your quantity:[1,2,3,etc]<input type="text" id="qty" style="position:relative; font-size:16px; top:5px; height:25px; margin:0 auto; display:block; width:60px; margin-bottom:10px;" /><input type="button" value="cancel" onclick="cancelQty()" style="position:relative; top:5px; height:25px; float:left; display:block;" /><input type="button" value="ok" onclick="setQuantity()" style="position:relative; top:5px; height:25px; float:right; display:block; width:60px;" /></div>');
			$('#right').append(data.html);
			if($('#cont').height() < 600) $('#cont').height($('#cont').height() + 150);
			if($('#show').css("visibility") == "hidden") $('#show').css("visibility", "visible");
		}
		else if(data.success == 0){
			if(data.reason == "EOF"){
				$('#right').html("No records to display");
			}
			else{
				$('#right').html("Failed completely.");
			}
		}
		else{
			$('#right').html("Failed completely.");
		}
	},
	"json"
	);
}

function showAll(){
	$('#right').html("Showing all products...");
	$('#right').html('<div id="quantity">Please specify your quantity:[1,2,3,etc]<input type="text" id="qty" style="position:relative; font-size:16px; top:5px; height:25px; margin:0 auto; display:block; width:60px; margin-bottom:10px;" /><input type="button" value="cancel" onclick="cancelQty()" style="position:relative; top:5px; height:25px; float:left; display:block;" /><input type="button" value="ok" onclick="setQuantity()" style="position:relative; top:5px; height:25px; float:right; display:block; width:60px;" /></div>');
	init();
	$('#show').css("visibility", "hidden");
	EOF = false;
	$(window).scrollTop(0);
	_row = 0;
	$('#cont').height(599);
}

function showCartItems(event){
	event.preventDefault();
	launchCanvas();
}

function launchCanvas(){
	var html = '<div id="obstruct"><div id="canvas"><div onclick="clearp()" id="closer"></div>sss</div><div id="opaq"></div></div>';
	$('#cont').prepend(html);
	$(document).bind('keydown', 'Esc', function(){ clear();});
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

function showByStore(event, id){
	event.preventDefault();
	if(id === null){
		return;
	}
	else{
		fetchStoreProds(id);
	}
}
//fetch store products
function fetchStoreProds(id){
	$('#cont').height(599);
	$.post('task/storeproducts.php',
	{'id':id},
	function(data){
		if(data.success == 1){
			$(window).scrollTop(0);
			$('#right').empty();
			$('#right').html('<div id="quantity">Please specify your quantity:[1,2,3,etc]<input type="text" id="qty" style="position:relative; font-size:16px; top:5px; height:25px; margin:0 auto; display:block; width:60px; margin-bottom:10px;" /><input type="button" value="cancel" onclick="cancelQty()" style="position:relative; top:5px; height:25px; float:left; display:block;" /><input type="button" value="ok" onclick="setQuantity()" style="position:relative; top:5px; height:25px; float:right; display:block; width:60px;" /></div>');
			$('#right').append(data.content);
			if($('#cont').height() < 600) $('#cont').height($('#cont').height() + 150);
			if($('#show').css("visibility") == "hidden") $('#show').css("visibility", "visible");
			trace("<span style='color:#3FF;'>Showing Products for: " + data.store + "</span>");
		}
		else{
			trace('<span style="color:#F00;">An error occurred.</span>');
		}
	},
	'json'
	);
}