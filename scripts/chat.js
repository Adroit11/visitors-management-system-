var onlineTimer;
var popUpTimer;
var noOfUsers;
var username;
var enroll;
var chatRefreshTimer;
var newmsg="yes";
var browserTitle = "Chatroom";
var soundHandle;
var soundFile = "../sound/notify.mp3";
var soundFile1 = "../sound/notify.ogg"; 

$(document).ready(function(){
  $(window).load(showOnline(),popUpChat());
  $("div#online_search_box input").bind("click",function() {
              if($("div#online_search_box input").val()=="Search")
		$("div#online_search_box input").val("");
	});
  $(window).focus(function(){
 	document.title = browserTitle;
  });
});

function showOnline() {	
	var str = "action=checkMyOnlineStatus";
	$.ajax({url:"processRequest.php", type:"POST", dataType:"xml", data:""+str+"", success:function(result){
				var onlineStatus = $(result).find("root").attr("online");
				if(onlineStatus=="yes") {
					$("div#online_users_box").html("Loading...");
				        refreshOnline();
				        onlineTimer = setInterval("refreshOnline()",2500);	

				}
				else
				goOffline();
			}
		});
}

function refreshOnline() {	
	var search = $("div#online_search_box input").val();
        if(search.length!=0 && search!="Search") {
                var str = "search="+search;
                $.ajax({url:"show_online.php", type:"POST", data:""+str+"", success:function(result){
                        $("div#online_users_box").html(result);
                        noOfUsers = $("div#user").toArray();
                        $("div#online_title").html("Search Results ("+noOfUsers.length+")");
                        }
                });
        }
        else {
                $.ajax({url:"show_online.php", success:function(result){
                $("div#online_users_box").html(result);
                noOfUsers = $("div#user").toArray();
                $("div#online_title").html("Who's Online ("+noOfUsers.length+")");
                }});
        }

}

function goOffline() {
	setOnlineStatus("no");
	clearInterval(onlineTimer);
	clearInterval(chatRefreshTimer);
	clearInterval(popUpTimer);
	//$("div.chatbox_user").hide();
	$("div#online_title").text("Offline");
	$("div#min").hide();
	$("div#online_users_box").hide();
	$("div#online_search_box").hide();
	$("div#online_box").css("height","30px");
}

function goOnline() {
	setOnlineStatus("yes");
	$("div#online_title").text("Who's Online");
        $("div#min").show();
        $("div#online_users_box").show();
        $("div#online_search_box").show();
	$("div#online_search_box input").val("Search");
	$("div#online_box").css("height","300px");
	showOnline();
	popUpChat();
}

function setOnlineStatus(onlineStatus) {

		var str = "action=setOnlineStatus&status="+onlineStatus;
		$.ajax({url:"processRequest.php", type:"POST", data:""+str+""});
}

function chatWith(username,enroll) {
	
	minimizeAllChats();
	if($("div#chatbox_"+enroll).length==0) {
		
		constructChatbox(enroll,username);
		startChatSession(enroll);
		clearInterval(chatRefreshTimer);	
		newmsg="yes";
		getChat(enroll,username);
		chatRefreshTimer = setInterval("getChat("+enroll+","+username+")",1500);
	}
	else {
	restructChatbox(enroll,username);
	}
	$("div#chatbox_"+enroll+" div.chatbox_title").css("background-color","#883");
        $("div#chatbox_"+enroll+" div.chatbox_title").text(username);

}

function minimizeAllChats() {

	$("div#minChat").hide();
	$("div.chatbox_text").hide();
	$("div.chatbox_msg").hide();
	$("div.chatbox_user").css({"position":"relative","top":"205px","cursor":"pointer"});

}

function minimizeChat(roll) {

	$("div#chatbox_"+roll+" div#minChat").hide();
        $("div#chatbox_"+roll+" div.chatbox_text").hide();
        $("div#chatbox_"+roll+" div.chatbox_msg").hide();
        $("div#chatbox_"+roll).css({"position":"relative","top":"205px","cursor":"pointer"});

}

function closeChat(roll) {
	$("div#chatbox_"+roll).hide();
}

function constructChatbox(enroll,username) {
	
		$("div#chatbox").append("<div id='chatbox_"+enroll+"' class='chatbox_user' ></div>");	
		$("div#chatbox_"+enroll).append("<div><div class='chatbox_title' onclick='javascript:restructChatbox("+enroll+",&#39;"+username+"&#39;)'>"+username+"</div><div id='minChat' class='opt' onClick='javascript:minimizeChat("+enroll+")'> - </div><div id='closeChat' class='opt' onClick='javascript:closeChat("+enroll+")'>X</div></div>");
		$("div#chatbox_"+enroll).append("<div class='chatbox_msg'></div>");
		$("div#chatbox_"+enroll).append("<div class='chatbox_status'></div>");
		$("div#chatbox_"+enroll).append("<div class='chatbox_text' ><form onSubmit='return sendChat("+enroll+",&#39;"+username+"&#39;)'><input type='text' name='msg' autocomplete='off' onKeyDown='javascript:setWritingStatus("+enroll+",&#39;"+username+"&#39;)'/></form></div>");
		$("div#chatbox_"+enroll+" div.chatbox_text input").focus();
		$("div#chatbox_"+enroll+" div.chatbox_msg").html("<div class='err_msg'>Loading previous messages...</div>");
		
}

function restructChatbox(roll,name) {

	minimizeAllChats();
	$("div#chatbox_"+roll).show();
	$("div#chatbox_"+roll+" div.chatbox_title").css("background-color","#883");
        $("div#chatbox_"+roll+" div.chatbox_title").text(name);
	$("div#chatbox_"+roll+" div#minChat").show();
	$("div#chatbox_"+roll+" div.chatbox_msg").show();
	$("div#chatbox_"+roll+" div.chatbox_text").show();
	$("div#chatbox_"+roll).css({"position":"relative","top":"0px"});
	$("div#chatbox_"+roll+" div.chatbox_text input").focus();
	clearInterval(chatRefreshTimer);
	newmsg="yes";
	getChat(roll,name);
	chatRefershTimer = setInterval("getChat("+roll+","+name+")",1500);
}

function startChatSession(roll) {
	var str = "action=startChatSession&roll="+roll;
	$.ajax({url:"processRequest.php", type:"POST", data:""+str+""});
}

function sendChat(roll,name) {

	var msg = $("div#chatbox_"+roll+" div.chatbox_text input").val();
	var str = "action=sendChat&msg="+msg+"&roll="+roll+"&name="+name;
	if(msg.length!=0) {
		$.ajax({url:"processRequest.php", type:"POST", data:""+str+"", dataType:"xml", success:function(result) {
				var check = $(result).find("root").attr("success");
			
				if(check=="no") {
					
					clearInterval(chatRefreshTimer);
					$("div#chatbox_"+roll+" div.chatbox_msg").empty();
					$("div#chatbox_"+roll+" div.chatbox_msg").html("<div class='err_msg'>"+name+" is unavailable</div>");
				}
				else{
					newmsg="yes";
					getChat(roll,name);
				}
			}
		});
	}
	$("div#chatbox_"+roll+" div.chatbox_text input").val("");

	return false;
}

function getChat(roll,name) {

	var str = "action=getChat&roll="+roll;
	var user;

	$.ajax({url:"processRequest.php", type:"POST", data:""+str+"", dataType:"xml",success:function(result) {

		var count = $(result).find("root").attr("count");
		var sta = $(result).find("root").attr("status");
	
		if(count!=0) {
			
  			if(sta=="yes")
                   	     $("div#chatbox_"+roll+" div.chatbox_status").text($("div#chatbox_"+roll+" div.chatbox_title").text()+" is typing...");
              		else
                        	$("div#chatbox_"+roll+" div.chatbox_status").text("");

			$("div#chatbox_"+roll+" div.chatbox_msg").empty();
			$(result).find("messages").each(function(){
				user = $(this).find("user").text();
				msg = $(this).find("msg").text();
	
				$("div#chatbox_"+roll+" div.chatbox_msg").prepend("<div class='msg_container'><div id='sender'><b>"+user+"</b>: "+msg+"</div><br>");

			});

			if(newmsg=="yes") {
				$("div#chatbox_"+roll+" div.chatbox_msg").scrollTop($("div#chatbox_"+roll+" div.chatbox_msg")[0].scrollHeight);
				if($("div#chatbox_"+roll+" div.chatbox_text input").is(":focus")==false) {
					setBrowserTitle(name);
					playSound();
	                	        $("div#chatbox_"+roll+" div.chatbox_text input").focus();	
				}
				newmsg="no";   //set to no for repetition of chat sound
			}
		}	
	
		else {
			$("div#chatbox_"+roll+" div.chatbox_msg").empty();
			$("div#chatbox_"+roll+" div.chatbox_msg").html("<div class='err_msg'>Start your conversation</div>");
		}
		
	}});

}

function popUpChat() {
	refreshPopUpChat();
	popUpTimer = setInterval("refreshPopUpChat()",3000);
}

function refreshPopUpChat() {
	var str = "action=popUpChat";
	$.ajax({url:"processRequest.php", type:"POST", data:""+str+"", dataType:"xml", success:function(result){
			var c = $(result).find("root").attr("count");
			if(c>0) {
				$(result).find("users").each(function(){ 
					var name = $(this).find("name").text();
					var roll = $(this).find("roll").text();
				
					if($("div#chatbox_"+roll).length==0) {
						setBrowserTitle(name);
						playSound();
						chatWith(name,roll);
					}
					else 
					if($("div#chatbox_"+roll).css("top")=="205px"){
						setBrowserTitle(name);
						playSound();
						$("div#chatbox_"+roll).show();
						$("div#chatbox_"+roll+" div.chatbox_title").css("background-color","#99C");
						$("div#chatbox_"+roll+" div.chatbox_title").text(name+" says...");
					}
					else{
						$("div#chatbox_"+roll).show();
						newmsg="yes";
						getChat(roll,name);
						chatRefreshTimer = setInterval("getChat("+roll+","+name+")",1500);
					}
			
				});
			}
			else
				newmsg="no";
			}
		});	
}

function setWritingStatus(roll,name) {
	
	var len = $("div#chatbox_"+roll+" div.chatbox_text input").val().length;

	if(len==2 || len==15 || len==30) {
		var str = "action=setWritingStatus";
		//alert(str);
		$.ajax({url:"processRequest.php", type:"POST", data:""+str+""});
	}
}

function playSound() {

  soundHandle = document.getElementById('soundHandle');
  soundHandle.src = soundFile;   // for google chrome mp3
  soundHandle.play();
  soundHandle.src = soundFile1;  // for firefox and opera ogg
  soundHandle.play();	

}

function setBrowserTitle(name) {
	document.title=name+" says...";
}

function hello() {
	alert("helo");
}
