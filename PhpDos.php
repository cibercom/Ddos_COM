<?php
$ip = $_SERVER['REMOTE_ADDR'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

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
    
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<meta name="author" content="">

	<title>PHP DoS, Coded by EXE</title>

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

</head>
<!-- PHP DOS, coded by EXE -->
<style type="text/css">
<!--
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	line-height: normal;
	color: #FFFFFF;
	background-color: #000000;
}



-->
</style>
<!-- PHP DOS, coded by EXE -->
<body>
<center><br><br>
<img src="main.jpg"><br>
<b>Your IP:</b> <font color="red"><?php echo $ip; ?></font>&nbsp;(Don't DoS yourself nub)<br><br>
<form name="input" action="function.php" method="post">
IP:
<input type="text" name="ip" size="15" maxlength="15" class="main" value = "0.0.0.0" onblur = "if ( this.value=='' ) this.value = '0.0.0.0';" onfocus = " if ( this.value == '0.0.0.0' ) this.value = '';">
&nbsp;&nbsp;&nbsp;&nbsp;Time:
<input type="text" name="time" size="14" maxlength="20" class="main" value = "time (in seconds)" onblur = "if ( this.value=='' ) this.value = 'time (in seconds)';" onfocus = " if ( this.value == 'time (in seconds)' ) this.value = '';">
&nbsp;&nbsp;&nbsp;&nbsp;Port:
<input type="text" name="port" size="5" maxlength="5" class="main" value = "port" onblur = "if ( this.value=='' ) this.value = 'port';" onfocus = " if ( this.value == 'port' ) this.value = '';">
<br><br>
<input type="submit" value="    Start the Attack--->    ">
<br><br>
<center>
After initiating the DoS attack, please wait while the browser loads.
</center>

</form>
</center>
<!-- PHP DOS, coded by EXE -->
</body>
</html>