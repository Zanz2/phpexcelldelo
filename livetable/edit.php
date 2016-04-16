 <?php  
 $connect = mysqli_connect("localhost", "root", "burek123", "phpexcelltest");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE ostalo SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Podatki posodobljeni';  
 }  
 ?>  