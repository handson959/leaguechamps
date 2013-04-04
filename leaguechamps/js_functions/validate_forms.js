function validateSignINform()
{

var username=document.forms["signIN_form"]["user"].value;

if (username==null || username=="")
  {
	error_placing_ID = "validationError_user";
	appendAfter_Field(error_placing_ID);
  
  return false;
  }
  
var password=document.forms["signIN_form"]["pass"].value;

if (password==null || password=="")
  {
	error_placing_ID = "validationError_pass";
	appendAfter_Field(error_placing_ID);
	
  return false;
  }  
  
}

function validateSignUPform()
{

var first_name=document.forms["signUP_form"]["firstname"].value;

if (first_name==null || first_name=="")
  {
	error_placing_ID = "validationError_fname";
	appendAfter_Field(error_placing_ID);
  return false;
  }

var last_name=document.forms["signUP_form"]["lastname"].value;

if (last_name==null || last_name=="")
  {
	error_placing_ID = "validationError_lname";
	appendAfter_Field(error_placing_ID);
  return false;
  }

var username=document.forms["signUP_form"]["user"].value;

if (username==null || username=="")
  {
	error_placing_ID = "validationError_new_user";
	appendAfter_Field(error_placing_ID);
	
  return false;
  }
  
var password=document.forms["signUP_form"]["pass"].value;

if (password==null || password=="")
  {
	error_placing_ID = "validationError_new_pass";
	appendAfter_Field(error_placing_ID);
  return false;
  }    
}

function appendAfter_Field(error_placing_ID) {
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	getID = this.error_placing_ID;
	
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById(getID).innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","error_msgs/blank_not_allowed.txt",true);
	xmlhttp.send();

} 

var error_placing_ID ='';