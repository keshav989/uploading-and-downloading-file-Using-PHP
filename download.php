<?php  
 $dbh = new PDO("mysql:host=localhost;dbname=spectrum","root","");
 if(isset($_GET['dow'])){
	 
	 $path=$_GET['dow'];
	 
$stat = $dbh->prepare("SELECT * from test where path='$path'");
$stat->bindParam(1,$path);
$stat->execute();
$row = $stat->fetch();

header("Content-Type: application/octet-stream");
header('Content-Disposition: attachment; filename="'.basename($path).'" ');
header('Content-Length: '.filesize($path));
readfile($path);
 }
?>


