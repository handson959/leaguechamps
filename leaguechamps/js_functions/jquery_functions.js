$(document).ready(function(){
  $("input[name=login_type]:radio.signUP_form").click(function(){
    $("form.signUP_form").show();
	$("form.signIN_form").hide();
  });
  
  $("input[name=login_type]:radio.signIN_form").click(function(){
    $("form.signIN_form").show();
	$("form.signUP_form").hide();
  });
  
 $("#chose_theme").click(function(){
    $("div.#Themes_DropDown").toggle();
  }); 
 
 $("input[name=which_team]:radio#home_team_radio_button").click(function(){
    $("#home_photo").css("border", "5px solid grey");
	$("#home_photo").css("border-radius", "12px");
	$("#away_photo").css("border", "none");
  });
  $("input[name=which_team]:radio#away_team_radio_button").click(function(){
    $("#away_photo").css("border", "5px solid grey");
	$("#away_photo").css("border-radius", "12px");
	$("#home_photo").css("border", "none");
  });
 
 
 /* Hide Vertical Drop Down Themes Menu when clicked outside BEGINS*/
 
 $("#chose_theme").click(function(e) {
  e.stopPropagation(); //stops click event from reaching document
});
$(document).click(function() {
  $("#Themes_DropDown").hide(); //click came from somewhere else
});

/* Hide Vertical Drop Down Themes Menu when clicked outside ENDS */  
  
});
