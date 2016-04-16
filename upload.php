
<div id="odmik">

<form method = "post" name = "upload" action = "upload_insert.php" enctype="multipart/form-data">

	       

	        <label>Izberite  tabelo (najbolj optimalna je excel tabela (max 1.5 Mb))</label>

	        <br>

	        <br>

	        <label>Upload:</label>

	        <input type = "file" name = "path">

	        <input type = "submit" name = "submit" value = "Upload!">

	       

	        </form>
</div>
<?php
                if (!empty($_GET['obvestilo'])) {
    $obvestilo=$_GET['obvestilo'];
                echo $obvestilo;
                echo '<br>';
                }
                ?>
