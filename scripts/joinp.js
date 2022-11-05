// JavaScript Document
function cvalidate(){
	var form = document.f_cust;
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	if(form.fname.value == ""){
		alert('Please enter your first name');
		form.fname.style.border = "2px solid #F00";
		form.fname.focus();
		return;
	}else if(form.lname.value == ""){
		alert('Please enter your last name');
		form.lname.style.border = "2px solid #F00";
		form.lname.focus();
		return;
	}else if(form.idnum.value == ""){
		alert('Please enter your ID number');
		form.idnum.style.border = "2px solid #F00";
		form.idnum.focus();
		return;
	}else if(form.email.value == ""){
		alert('Please enter your email address');
		form.email.style.border = "2px solid #F00";
		form.email.focus();
		return;
	}else if(form.phone.value == ""){
		alert('Please enter your phone number');
		form.phone.style.border = "2px solid #F00";
		form.phone.focus();
		return;
	}else if(form.pass1.value == "" || form.pass2.value == "" || (form.pass1.value != form.pass2.value)){
		alert('Please enter password [make sure they match]');
		form.pass1.style.border = "2px solid #F00";
		form.pass1.focus();
		return;
	}else if(reg.test(form.email.value) == false){
		alert('Please enter your email. It must be in the form: user @ sever . domain E.g. user@gmail.com.');
		form.email.value = '';
		form.email.style.border = "2px solid #f00";
		form.email.focus();
		return;
	}else if(form.gender.options[form.gender.selectedIndex].value == "NULL"){
		alert('Please select your gender');
		form.gender.style.border = "2px solid #F00";
		return;
	}
	else if(form.pass1.value.length < 8 || form.pass1.value.length > 12){
		alert('Your password should be 8-12 characters.');
		form.pass1.style.border = "2px solid #f00";
		form.pass1.focus();
		return;
	}
	else{
		document.forms["f_cust"].submit();
	}
}
function svalidate(){
	var form = document.f_supp;
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	if(form.sname.value == ""){
		alert('Please enter your supplier name');
		form.sname.style.border = "2px solid #F00";
		form.sname.focus();
		return;
	}else if(form.semail.value == ""){
		alert('Please enter your email address');
		form.smail.style.border = "2px solid #F00";
		form.smail.focus();
		return;
	}else if(form.sphone.value == ""){
		alert('Please enter your phone number');
		form.sphone.style.border = "2px solid #F00";
		form.sphone.focus();
		return;
	}else if(form.spass1.value == "" || form.spass2.value == "" || (form.spass1.value != form.spass2.value)){
		alert('Please enter password [make sure they match]');
		form.spass1.style.border = "2px solid #F00";
		form.spass1.focus();
		return;
	}else if(reg.test(form.semail.value) == false){
		alert('Please enter your email. It must be in the form: user @ sever . domain E.g. user@gmail.com.');
		form.semail.value = '';
		form.semail.style.border = "2px solid #f00";
		form.semail.focus();
		return;
	}
	else if(form.spass1.value.length < 8 || form.spass1.value.length > 12){
		alert('Your password should be 8-12 characters.');
		form.spass1.style.border = "2px solid #f00";
		form.spass1.focus();
		return;
	}
	else{
		document.forms["f_supp"].submit();
	}
}