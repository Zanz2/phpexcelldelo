<?php  
header('Content-Type: text/html; charset=utf-8');
 $connect = mysqli_connect("localhost", "root", "burek123", "phpexcelltest");  
 $output = '';  
 $sql = "SELECT * FROM ostalo ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="table2excel">  
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

<!--FUNKCIJA ZA TABLE -> EXCEL -->
 <script type="text/javascript">
        var tableToExcel = (function() {
          var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
          return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
          }
        })()
        </script>
        
        
        <button onclick="tableToExcel(table2excel);">Excel izvoz</button> 