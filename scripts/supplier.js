//javascript
//Globals

var action_locked = false; //to see if some action goes on to prevent collisions.
var current = '';
var canvas;
var resp;
var close_ready = true;
var theButt;
var newDets = []; // this stores the updated details to make it realtime.

$.xhrPool = [];
$.xhrPool.abortAll = function(){
	$(this).each(function(idx, jqXHR) {
        jqXHR.abort();
    });
	$(this).each(function(idx, jqXHR) {
        var index = $.inArray(jqXHR, $.xhrPool);
		if(index > -1){
			$.xhrPool.splice(index, 1);
		}
    });
};

$.ajaxSetup({beforeSend: function(jqXHR){
	$.xhrPool.push(jqXHR);
}, complete: function(jqXHR){
	var index = $.inArray(jqXHR, $.xhrPool);
	if(index > -1){
		$.xhrPool.splice(index, 1);
	}
}, cache:false
});

function setAction(event, action){
	event.preventDefault();
	if(!action_locked){
		action_locked = true;
		
		switch(action){
			case "create":
			uploadNew();
			break;
			case "view":
			viewProducts();
			break;
			case "update":
			updateProducts();
			break;
			case "remove":
			removeProducts();
			break;
		}
	}
	else{
		alert('There is an incomplete operation: ' + current);
	}
}

function uploadNew(){
	current = "Entering new product...";
	mode();
	
	canvas.load("upload.php" + "#hold",function(){
		setCloser();
	});
}

function viewProducts(){
	current = "Fetching products to view...";
	mode();
	
	canvas.load("task/supplierView.php" + "#hold",function(){
		setCloser();
	});
}

function updateProducts(){
	current = "Updating products...";
	mode();
	
	canvas.load("task/supplierView.php" + "#hold",function(){
		setCloser();
	});
}

function removeProducts(){
	current = "Removing products...";
	mode();
	
	canvas.load("task/deleteView.php" + "#hold",function(){
		setCloser();
	});
}

function upload(event){
	event.preventDefault();
	var formId = "#" + event.target.parentNode.childNodes.item(3).id;
	var hasPhoto = false;
	var details = false;
	var cat = $(formId + ' #cat').val();
	var subcat = $(formId + ' #sub-cat').val();
	var quantity = $(formId + ' #quantity').val().replace('"', 'inch');
	var desc = $(formId + ' #desc').val();
	var price = $(formId + ' #price').val();
	resp = event.target.parentNode.childNodes.item(7);
	var loading = '<img src="images/loading.gif" width="24" height="24" style="position:relative; top:7px;" /> uploading details...';
	
	var form2id = "#" + event.target.parentNode.childNodes.item(5).id;
	var photo = $(form2id + ' #pimg').val();
	//validate first.
	if(cat == "null"){
		alert('category not chosen!');
		$(formId + ' #cat').focus();
		$(formId + ' #cat').css("border", "1px solid #F00");
		return;
	}
	else if(subcat == "null"){
		alert('sub-category not chosen!');
		$(formId + ' #sub-cat').focus();
		$(formId + ' #sub-cat').css("border", "1px solid #F00");
		return;
	}
	else if(quantity == ""){
		alert('Specify product quantity!');
		$(formId + ' #quantity').focus();
		$(formId + ' #quantity').css("border", "1px solid #F00");
		return;
	}
	else if(desc == ""){
		alert('description is needed!');
		$(formId + ' #desc').focus();
		$(formId + ' #desc').css("border", "1px solid #F00");
		return;
	}
	else if(price == "" || ('qwertyuiopasdfghjklzxcvbnm.?&*()-+#$%^!@~`"\'\|/').indexOf(price) != -1){
		alert('Price is needed and should only contain numbers!');
		$(formId + ' #price').focus();
		$(formId + ' #price').css("border", "1px solid #F00");
		return;
	}
	if(photo != ""){
		hasPhoto = true;
		details = true;
	}
	
	resp.innerHTML = loading;
	resp.style.visibility = "visible";
	
	$.post("task/productUpload.php",
	{
		details:details,
		cat:cat,
		subcat:subcat,
		quantity:quantity,
		desc:desc,
		price:price
	},
	function(data){
		if(data.success == 1){
			//details = true;
			if(hasPhoto){
				//submit photo form;
				var f = event.target.parentNode.childNodes.item(5);
				//f.target = document.getElementsByName('uploader').item(0);
				f.submit();
				resp.innerHTML = loading + " uploading photo...";
			}
			else{
				resp.innerHTML = '<span style="color:green">Product added successfully!</span>';
			}
		}
		else if(data.success == 0){
			resp.innerHTML = '<span style="color:red">' + data.reason + '</span>';
		}
		else{
			resp.innerHTML = '<span style="color:red">An error occured during upload. Try again.</span>';
		}
	},
	'json'
	);
}

function upstat(success){
	if(success == 1){
		resp.innerHTML = '<span style="color:green">Product added successfully.</span>';
	}
	else if(success == -1){
		resp.innerHTML = '<span style="color:blue">Photo size or type is invalid. But Product data has been uploaded successfully.</span>';
	}
	else if(success == 0){
		resp.innerHTML = '<span style="color:red">Logo not received. Upload again please</span>';
	}
	else{
		resp.innerHTML = '<span style="color:red">Photo upload failed. Try to edit product details later</span>';
	}
}

//sub-categories fetcher
function showSubcats(event){
	var pn = event.target.parentNode.id;
	var node = "#" + pn + " #sub-cat";
	$(node).append('error');
	$.post("subcats.php",
	{id:event.target.value},
	function(data){		
		$(node).html('<option value="null">--sub-category--</option>' + data);
	},
	'text/html'
	);
}

function mode(){
	$('body').prepend("<div id='hider'><div id='opaq'></div><div id='canvas'></div></div>");
	$('#hider').show(500, 'swing');
	canvas = $('#hider #canvas');
	$(document).bind('keydown', 'Esc', function(){ clear();});
	$(document).scrollTop(0);
}

function clear(){
	$('#hider').css("display","none");
	$('#hider').html('');
	$(document).unbind('keydown');
	action_locked = false;
	current = "";
	$.xhrPool.abortAll();
}

function setCloser(){
	canvas.prepend("<div class='close_btn'><img id='close' src='images/close.png' /></div>");
	$('.close_btn img').click(function(){clear();});
}

// PRODUCT EDITING CODE BEGINS HERE.

function editProduct(event, div, id, desc, qty, price){
	event.preventDefault();
	
	var y = document.getElementById(div).parentNode.offsetTop;
	
	y = (y + 30) + "px";
	$('#edit-form').show(400, function(){
		$('#edit-form').css("visibility", "visible").css("top", y);
	});
	newDets.push('#' + div);
	
	setupForm(desc, qty, price);
	$('#p_id').val(id);
	if(theButt) theButt.style.visibility = "visible";
}

function setupForm(desc, qty, price){
	$('#e_desc').val(desc).select();
	$('#e_qty').val(qty);
	$('#e_price').val(price);
	$('#e_pic').val('');
}

function sendDetails(event){
	event.preventDefault();
	
	var desc = $('#e_desc').val();
	var qty = $('#e_qty').val().replace('"', 'inch');
	var price = $('#e_price').val();
	var pid = $('#p_id').val();
	var resp = $('#resp');
	var hasPhoto = false;
	var loading = '<img src="images/loading.gif" width="24" height="24" style="position:relative; top:7px;" /> uploading details...';
	theButt = event.target;
	
	if($('#e_pic').val() != ''){
		hasPhoto = true;
	}
	
	resp.html(loading);
	resp.css("visibility","visible");
	close_ready = false;
	
	$.post(
	"task/editProduct.php",
	{
		"pid":pid,
		"desc":desc,
		"qty":qty,
		"price":price
	},
	function(data){
		if(data.success == 1){
			newDets.push(desc);
			newDets.push(qty);
			newDets.push(price);
			
			if(hasPhoto){
				document.getElementsByName("updt").item(0).submit(); //alert('');
				resp.html(loading + " uploading photo...");
			}
			else{
				resp.html('<span style="color:green">Product added successfully!</span>');
				close_ready = true;
				theButt.style.visibility = "hidden";
				updateDetails();
			}
		}
		else if(data.success == 0){
			resp.html('<span style="color:red">Error: </span><span style="color:black">' + data.reason + '</span>');
			close_ready = true;
		}
		else{
			resp.html('<span style="color:red">An unspecific error occured during upload. Try again.</span>');
			close_ready = true;
		}
	},
	"json"
	);
}

function updtPic(status, picSrc){//this function checks if the picture for updated product was uploaded successfully.
	if(status == 1){
		$('#resp').html("<span style='color:blue;'>Update was successfull.</span>");
		close_ready = true;
		theButt.style.visibility = "hidden";
		newDets.push(picSrc);
		updateDetails();
	}
	else if(status == -1){
		$('#resp').html("<span style='color:red;'>Photo update error: File not received.</span>");
		close_ready = true;
	}
	else{
		$('#resp').html("<span style='color:#f00;'>Picture upload failed completely. Other details were updated.</span>");
		close_ready = true;
	}
}

function updatefrmClose(){
	if(close_ready){
		$('#edit-form').hide(400, function(){
			$('#edit-form').css("visibility", "hidden");
			$('#resp').css("visibility","hidden").html('<img src="images/loading.gif" width="24" height="24" style="position:relative; top:7px;" /> uploading...');
			close_ready = true;
		});
		$.xhrPool.abortAll();
	}
}

function updateDetails(){
	var div = newDets[0];
	$(div + " .vprod-head").html(newDets[1] + "(" + newDets[2] + ")");
	$(div + " span").html(newDets[3] + '.00/=');
	if(newDets[4] != null) $(div + " .vprod-pic img").attr("src", newDets[4] + "?nnn");
	newDets = [];
}

// PRODUCT REMOVAL CODE BEGINS HERE.

function deleteProduct(pid, div, prod){
	var del = confirm("Are you sure you want to delete " + prod + "?");
	if(del){
		$.post("task/removeProduct.php",
		{
			"pid":pid
		},
		function(data){
			if(data == "1" || data == "-1"){
				trace("<span style='color:green;'>Product: " + prod + " deleted.</span>");
				dropDiv(div);
			}
			else{
				trace("<span style='color:yellow;'>Product deletion failed. Try again later.</span>");
			}
		},
		"text/html"
		);
	}
	else{
		return;
	}
}

function dropDiv(div){//drops div content from canvas.
	$(div).hide(300, function(){
		$(this).css("display", "none").css("visibility", "hidden");
		canvas.remove($(div));
	});
}

//tracer
function trace(text){
	$('#trace').html(text).animate({opacity:1.0},400, function(){
		setTimeout(function(){$('#trace').animate({opacity:0}, 600)}, 2000);
	});
}