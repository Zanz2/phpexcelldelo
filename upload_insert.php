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
    echo '<pre>'; print_r($rowData); echo '</pre><br><br>';
    foreach ($rowData as $value) {
        
        
        
        
        
        
        $value0 = mysqli_real_escape_string($link,$value[0]);
        $sql = "INSERT INTO proizvajalec (ime)
VALUES ('$value0')";
       
        if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
        echo '<br>';
        
        
       
        
        
        
        
        
        $value1 = mysqli_real_escape_string($link,$value[1]);
        $sql = "INSERT INTO kategorija (ime)
VALUES ('$value1')";
        
        if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
        echo '<br>';
        
        
        $value2 = mysqli_real_escape_string($link,$value[2]);
        $value3 = mysqli_real_escape_string($link,$value[3]);
        $value4 = mysqli_real_escape_string($link,$value[4]);
        $sql = "INSERT INTO ostalo (cena,sifra,ime)
VALUES ('$value2' , '$value3' , '$value4')";
        
        if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
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
