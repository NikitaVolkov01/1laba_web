<DOCTYPE html>
<html lang='en'> 

<head>  
  <title> 1 Laba Web </title> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
  <link rel="stylesheet" type="text/css" href="index.css">  
</head>

  <body background="fon1.jpg">
      <div class="container">

         <div class="header">
            Волков Никита P3230
         </div>

         <div class="sidebar"> 
             <img id="img" src="web.jpg" alt="GG" width=220px height="270px">
         </div>

        

             <div class="content">

                    <div>

                        <form name="myForm" action="index.php" onsubmit="return validateForm()"  method="get">

                        
                          <p class="paragraf">Выберете координату X из предлагаемых:
                           <input type = "radio" name = "x" value="-2" id="-2" > <label for="-2"> -2 </label> 
                           <input type = "radio" name = "x" value="-1.5" id="-1.5" > <label for="-1.5"> -1.5 </label> 
                           <input type = "radio" name = "x" value="-1" id="-1" > <label for="-1"> -1 </label> 
                           <input type = "radio" name = "x" value="-0,5" id="-0.5"> <label for="-0.5"> -0.5 </label> 
                           <input type = "radio" name = "x" value="0" id="0" > <label for="0"> 0 </label> 
                           <input type = "radio" name = "x" value="0,5" id="0.5" > <label for="0.5"> 0.5 </label> 
                           <input type = "radio" name = "x" value="1" id="1" > <label for="1"> 1 </label> 
                           <input type = "radio" name = "x" value="1,5" id="1.5" > <label for="1.5"> 1.5 </label> 
                           <input type = "radio" name = "x" value="2" id="2" > <label for="2"> 2 </label> 
                          </p> 
                                    
                          <p class="paragraf">Введите координату Y (-5 ; 5) : <input type="text" name="y"> </p>
                                    
                          <p class="paragraf">Выберете R из предлагаемых:     
                           <input type="checkbox" name="R" value="1" id="checkbox1"> <label for="checkbox1"> 1 </label>
                           <input type="checkbox" name="R" value="2" id="checkbox2"> <label for="checkbox2"> 2 </label>
                           <input type="checkbox" name="R" value="3" id="checkbox3"> <label for="checkbox3"> 3 </label>
                           <input type="checkbox" name="R" value="4" id="checkbox4"> <label for="checkbox4"> 4 </label>
                           <input type="checkbox" name="R" value="5" id="checkbox5"> <label for="checkbox5"> 5 </label>
                          </p>
                        
                          <input class="knopka" type="submit" value="Нажми , чтобы отправить данные"   >
                       
                        </form> 

                    </div> 

            </div>
              <?php
              session_start();
              if (!isset($_SESSION['counter'])) $_SESSION['counter']=0;
              if (isset($_GET['x']) and isset($_GET['y']) and isset($_GET['R'])) {
                  $_SESSION['counter']++;
              }
              ?>

                <?php
                include 'script.php'; 
                ?>

                  <script type="text/javascript">
                    
                    var inputs = document.getElementsByName("R");
                          for(var i = 0; i < inputs.length; i++) inputs[i].onchange = checkboxHandler;
                     
                        function checkboxHandler(e) {
                          for(var i = 0; i < inputs.length; i++)
                                if(inputs[i].checked && inputs[i] !== this) inputs[i].checked=false;
                            }

                                function validateForm()
                                  {
                                    var bool=true;
                                    var radio_check_val = "";
                                        for (i = 0; i < document.getElementsByName('x').length; i++) {
                                            if (document.getElementsByName('x')[i].checked) {
                                               
                                                radio_check_val = document.getElementsByName('x')[i].value;        
                                            }        
                                        }
                                        if (radio_check_val === "")
                                        {
                                            alert("Координата X долнжа быть выбрана");
                                            bool=false;
                                        }     
                      

                                
                              var checkbox_check_val = "";
                              for (i = 0; i < document.getElementsByName('R').length; i++) {
                                  if (document.getElementsByName('R')[i].checked) {
                                     
                                      checkbox_check_val = document.getElementsByName('R')[i].value;        
                                  }        
                              }
                              if (checkbox_check_val === "")
                              {
                                  alert("значение R долнжо быть выбрано");
                                  bool=false;
                              } 

                      var x=document.forms["myForm"]["y"].value;
                        if (x==null || x==""){
                          alert("Y обязательно должно быть введено");
                          bool=false;
                          }
                          else{
                          r1 = /^-{0,1}[0-4]\.\d*$/;
                          r2 = /^-{0,1}[0-4]$/;
                          if(r1.test(x)==false && r2.test(x)==false){
                            alert('Значение Y введено неправильно');
                          bool=false;
                            }
                          }
                          return bool;
                        }
                        if(typeof window.history.pushState == 'function') {
                        window.history.pushState({}, "Hide", "https://se.ifmo.ru/~s285595/1.0/index.php"); }

                  </script>
     </div>

  </body>

</html>



