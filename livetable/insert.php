
 <?php  
 $connect = mysqli_connect("localhost", "root", "burek123", "phpexcelltest");  
 $sql = "INSERT INTO ostalo(ime, cena, sifra, k_ime, p_ime) VALUES('".$_POST["ime"]."', '".$_POST["cena"]."', '".$_POST["sifra"]."', '".$_POST["k_ime"]."', '".$_POST["p_ime"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Podatki vstavljeni';  
 }  
 ?>  
