<?php
include_once 'db.php';
        //  Include PHPExcel_IOFactory
include 'Classes/PHPExcel/IOFactory.php';

Error_reporting(-1);
if($_FILES["path"]["size"] < 1700000)
{
if($_FILES["path"]["type"] == "application/vnd.ms-excel" 
        // || $_FILES["path"]["type"] == "application/octet-stream" 
        || $_FILES["path"]["type"] == "application/msexcel"
        || $_FILES["path"]["type"] == "application/x-msexcel"
        || $_FILES["path"]["type"] == "application/x-ms-excel"
        || $_FILES["path"]["type"] == "application/x-excel"
        || $_FILES["path"]["type"] == "application/x-dos_ms_excel"
        || $_FILES["path"]["type"] == "application/xls"
        || $_FILES["path"]["type"] == "application/x-xls"
        || $_FILES["path"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
      

    
     { // the limit is around 100 kb

	 if($_FILES["path"]["error"] > 0)

	   echo "An error has occured!".$_FILES["path"]["error"]."<br/ >";

	 

	else

	    echo "Upload: " . $_FILES["path"]["name"] . "<br />";

	    echo "Type: " . $_FILES["path"]["type"] . "<br />";

	    echo "Size: " . ($_FILES["path"]["size"] / 1024) . " Kb<br />";

	    echo "Stored in: " . $_FILES["path"]["tmp_name"];

	    echo '<br> Uspeh <br>'; 
          //  $user_id=$_SESSION['user_id'];
            $user_id=1; //za zbrisat pol
            if (!file_exists("upload/$user_id/")) 
                {
    mkdir("upload/$user_id/", 0777, true);
}
	 

	  if (file_exists("upload/$user_id/" . $_FILES["path"]["name"])) //checks if the file already exists in the directory

	      {

	      header("Location: upload.php?obvestilo=Datoteka s tem imenom že obstaja");die();

	      }

	    else

	      {
$ime=$_FILES["path"]["name"];
	      move_uploaded_file($_FILES["path"]["tmp_name"],
	      "upload/$user_id/" .$_FILES["path"]["name"]);
            //  mysqli_query($link, "INSERT INTO upload
          //  (login_id, name) VALUES ('$user_id','$ime')")or die(mysqli_error($link));
              
	      echo "Stored in: " . "upload/$user_id/" . $_FILES["path"]["name"];
echo "<br><br><a href=upload.php>Nazaj</a>";




echo"<br>";
$inputFileName = "upload/$user_id/" . $_FILES["path"]["name"];
echo $inputFileName;
//  Read your Excel workbook
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
//  Loop through each row of the worksheet in turn
for ($row = 1; $row <= $highestRow; $row++){ 
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                    NULL,
                                    TRUE,
                                    FALSE);
    //  Insert row data array into your database of choice here
    //echo '<pre>'; print_r($rowData); echo '</pre><br><br>';
    foreach ($rowData as $value) {
        
        
        
        
        
        
        $valuepro = mysqli_real_escape_string($link,$value[0]);
        $sql = "INSERT INTO proizvajalci (ime)
VALUES ('$valuepro')";
       
        if (mysqli_query($link, $sql)) {
  //  echo "New record created successfully";
} else {
   // echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
        echo '<br>';
        
        
       
        
        
        
        
        
        $valuekat = mysqli_real_escape_string($link,$value[1]);
        $sql = "INSERT INTO kategorije (ime)
VALUES ('$valuekat')";
        
        if (mysqli_query($link, $sql)) {
   // echo "New record created successfully";
} else {
   // echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
        echo '<br>';
        $valuesifra=md5(uniqid());
        
        $valuecena = mysqli_real_escape_string($link,$value[2]);
        $valueime = mysqli_real_escape_string($link,$value[3]);
        $valuekid = (mysqli_query($link,"SELECT ime FROM kategorije WHERE ('$valuekat'=ime)"));
        $valuepid = (mysqli_query($link,"SELECT ime FROM proizvajalci WHERE ('$valuepro'=ime)"));
        $rowkid = mysqli_fetch_array($valuekid);
        $rowpid = mysqli_fetch_array($valuepid);
    
        $sql = "INSERT INTO ostalo (cena,sifra,ime,k_ime,p_ime)
VALUES ('$valuecena' , '$valuesifra' , '$valueime' , '$rowkid[0]' , '$rowpid[0]')";
        
        if (mysqli_query($link, $sql)) {
  //  echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
       
        
 
    }
    
} 
unlink("upload/$user_id/" . $_FILES["path"]["name"]);
       





	      }

	}

	else // in case the above criteria was not met

	  header("Location: upload.php?obvestilo=Datoteka ni excel file");die();
}
else
        header("Location: upload.php?obvestilo=Datoteka je pre velika");die();


?>
