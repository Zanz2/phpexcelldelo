 <?php  
 $connect = mysqli_connect("localhost", "root", "burek123", "phpexcelltest");  
 $sql = "DELETE FROM ostalo WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Podatki zbrisani';  
 }  
 ?>  