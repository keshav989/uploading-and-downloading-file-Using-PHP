<!DOCTYPE html>
<html lang="en">
<head>
  <title>Review PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
       .table-bordered{
        width:70%;
        
      }
      th{
          text-align:center;
          background:green;
          color:white;
      }
  </style>
</head>

<body>
<table class="table table-bordered">
    <thead>
      <tr>
	  <th>ID</th>
        <th>Description</th>
  
        <th>Filename</th>
        
        
      </tr>
    </thead>
    <tbody>
        <?php 
        //here begins the php code
        $dbh=new PDO("mysql:host=localhost;dbname=spectrum","root","");
         $stat=$dbh->prepare("SELECT * from test");
         $stat->execute();
         while($row=$stat->fetch()){
        
     echo "<tr>";
        echo "<td>".$row['id']. "</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td> <a href='download.php?dow=".$row['path']."' > Download </a></td>";
        
      echo "</tr>";
   
         }
  ?>
   </tbody>
  </table>
    </body>
 </html>
