<?php  
 $connect = mysqli_connect("localhost", "root", "burek123", "phpexcelltest");  
 $output = '';  
 $sql = "SELECT * FROM ostalo ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="10%">Ime</th>  
                     <th width="10%">Cena</th>
                     <th width="10%">Šifra</th>  
                     <th width="10%">Kategorija</th>   
                     <th width="10%">Proizvajalec</th>  
                     <th width="10%">Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="ime" data-id1="'.$row["id"].'" contenteditable>'.$row["ime"].'</td>  
                     <td class="cena" data-id2="'.$row["id"].'" contenteditable>'.$row["cena"].'</td>  
                     <td class="sifra" data-id3="'.$row["id"].'" contenteditable>'.$row["sifra"].'</td> 
                      <td class="k_ime" data-id4="'.$row["id"].'" contenteditable>'.$row["k_ime"].'</td> 
                       <td class="p_ime" data-id5="'.$row["id"].'" contenteditable>'.$row["p_ime"].'</td> 
                     <td><button type="button" name="delete_btn" data-id6="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="ime" contenteditable></td>  
                <td id="cena" contenteditable></td>
                <td id="sifra" contenteditable></td>  
                <td id="k_ime" contenteditable></td>  
                <td id="p_ime" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="7">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  