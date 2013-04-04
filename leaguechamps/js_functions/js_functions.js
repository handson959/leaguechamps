var my_theme;
my_theme="dataqa_stylesheet.css";

function loadjscssfile(filename, filetype){
    if (filetype=="js"){ //if filename is a external JavaScript file
        var fileref=document.createElement('script')
        fileref.setAttribute("type","text/javascript")
        fileref.setAttribute("src", filename)
    }
    else if (filetype=="css"){ //if filename is an external CSS file
        var fileref=document.createElement("link")
        fileref.setAttribute("rel", "stylesheet")
        fileref.setAttribute("type", "text/css")
        fileref.setAttribute("href", filename)
    }
    if (typeof fileref!="undefined")
        document.getElementsByTagName("head")[0].appendChild(fileref)
}

function confirm_bid() {
    var selected_radio = "";
    var which_team_radio = document.getElementsByName("which_team");
    for (var i = 0; i < which_team_radio.length; i++) {
        if (which_team_radio[i].checked) {
            selected_radio =  which_team_radio[i].value;
            break;
        }
    }
    if(selected_radio == "DD") selected_radio = "Delhi Daredevils";
    else if(selected_radio == "MI") selected_radio = "Mumbai Indians";
    else if(selected_radio == "RR") selected_radio = "Rajasthan Royals";
    else if(selected_radio == "SH") selected_radio = "Sunrisers Hyderabad";
    else if(selected_radio == "KXIP") selected_radio = "Kings XI Punjab";
    else if(selected_radio == "RCB") selected_radio = "Royal Challengers Bangalore";
    else if(selected_radio == "KKR") selected_radio = "Kolkata Knight Riders";
    else if(selected_radio == "PWI") selected_radio = "Pune Warriors";
    
    var popup_msg = "Are you sure you want to bid on " + selected_radio + "? " + '\n' + "You cannot change/cancel your bid later.";
    popup_msg += "\nIf you do not want to bet, Press Cancel.";
    var r = confirm(popup_msg);	
    return r;	
}
    
/*
 * Returns a new XMLHttpRequest object, or false if this browser
 * doesn't support it
 */
function newXMLHttpRequest() {
  var xmlreq = false;
  if (window.XMLHttpRequest) {  // Create XMLHttpRequest object in non-Microsoft browsers
    xmlreq = new XMLHttpRequest();
  } else if (window.ActiveXObject) {    // Create XMLHttpRequest via MS ActiveX for IE
    try {   // Try to create XMLHttpRequest in later versions of IE
      xmlreq = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e1) {  // Failed to create required ActiveXObject
      try { // Try version supported by older versions of IE
        xmlreq = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e2) {    // Unable to create an XMLHttpRequest with ActiveX
      }
    }
  }
  return xmlreq;
}

function changeMatch(changeType) {
  var req = newXMLHttpRequest();    // Obtain an XMLHttpRequest instance
  // Set the handler function to receive callback notifications from the request object  
  var handlerFunction = function () { // Return an anonymous function that listens to the XMLHttpRequest instance
     if (req.readyState == 4) { // If the request's status is "complete"
       if (req.status == 200) {
           document.getElementById("betArea").innerHTML = req.responseText;    
       }  else { 
         alert("HTTP error "+req.status+": "+req.statusText);   // An HTTP problem has occurred
       }    
     }
  };
  req.onreadystatechange = handlerFunction;
  req.open("GET", "back_end_action/changeMatchNum.php?changeType="+changeType, true);    // Open an HTTP POST connection to the news servlet.
  // Specify that the body (content-type) of the request contains form data
  req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  req.send(); 
}
