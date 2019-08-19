<?php
include("config.php");

   if(isset($_FILES['myfile'])){
	  $doc_name=$_POST['des'];
	  
	  $name=$_FILES['myfile']['name'];
	  $tmp_name=$_FILES['myfile']['tmp_name'];
	  
	 if($doc_name && $name){
		 
		 $location="document/$name";
		 move_uploaded_file($tmp_name, $location);
		 
		// save address and name to database
		     try{
    $sql=("INSERT into test(name, path)  values(:name, :path )");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name',$doc_name);
    $stmt->bindParam(':path', $location);
    
    $stmt->execute();
   // header('Location: message.html');
   echo "<center>Dear, &nbsp;<b>".strtoupper($doc_name)."</b>. Your file Has Been received ,We will reply you soon.</center>";
   header( "refresh:3;url=index.html" );
}
catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

//end of sending info to database
	 }
	 else{
		 echo "Please select a file";
	 }
     	  
	   
   }  
?>