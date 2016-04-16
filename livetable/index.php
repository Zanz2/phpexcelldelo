<html>  
      <head>  
           <title>Admin tabela</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">Live admin tabela</h3><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var ime = $('#ime').text();  
           var cena = $('#cena').text();  
           var sifra = $('#sifra').text();  
           var k_ime = $('#k_ime').text();  
           var p_ime = $('#p_ime').text();  
           
           if(ime == '')  
           {  
                alert("Vnesite ime");  
                return false;  
           }  
           if(cena == '')  
           {  
                alert("Vnesite ceno");  
                return false;  
           }  
           if(sifra == '')  
           {  
                alert("Vnesite šifro");  
                return false;  
           }  
           if(k_ime == '')  
           {  
                alert("Vnesite kategorijo");  
                return false;  
           }  
           if(p_ime == '')  
           {  
                alert("Vnesite proizvajalca");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{ime:ime, cena:cena, sifra:sifra, k_ime:k_ime, p_ime:p_ime},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.ime', function(){  
           var id = $(this).data("id1");  
           var ime = $(this).text();  
           edit_data(id, ime, "ime");  
      });  
      $(document).on('blur', '.cena', function(){  
           var id = $(this).data("id2");  
           var cena = $(this).text();  
           edit_data(id,cena, "cena");       
      }); 
      $(document).on('blur', '.sifra', function(){  
           var id = $(this).data("id3");  
           var sifra = $(this).text();  
           edit_data(id,sifra, "sifra");       
      }); 
      $(document).on('blur', '.k_ime', function(){  
           var id = $(this).data("id4");  
           var k_ime = $(this).text();  
           edit_data(id,k_ime, "k_ime");       
      }); 
      $(document).on('blur', '.p_ime', function(){  
           var id = $(this).data("id5");  
           var p_ime = $(this).text();  
           edit_data(id,p_ime, "p_ime");       
      }); 
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id6");  
           if(confirm("Ali ste prepričani da želite zbrisati ta vnos?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>  