<?php 
$file = 'rdpconnect.txt'; 
$serverName = '';

if(!file_exists($file)) 
{ 
   // File doesn't exist, output error 
   die('file not found'); 
} 
else 
{ 
   $serverName = $_POST['srv'];
   echo "Your Computer Name: " . $serverName;
   
   if(isset($serverName) && preg_match("/^[A-Za-z0-9\.-][A-Za-z0-9\.-][A-Za-z0-9\.-]+$/i",$serverName)) 
   { 
      $rdp_file = file_get_contents($file); 
      // Set headers 
      header("Cache-Control: public"); 
      header("Content-Description: File Transfer"); 
      header("Content-Disposition: attachment; filename=" . $_GET["srv"] . ".rdp"); 
      header("Content-Type: text/plain"); 
      header("Content-Transfer-Encoding: 8bit"); 

      echo str_ireplace("{SERVER_ADDRESS}", $_GET["srv"], $rdp_file); 
   } 
   else 
      die("You must specify a valid server name"); 
} 
?>