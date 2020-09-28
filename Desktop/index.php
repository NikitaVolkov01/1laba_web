<DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>1 Laba Web</title>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body background="web.gif">
    <div class="container">

        <div class="header">
            Волков Никита и Карпова Софья P3230 Вариант 2613
        </div>

        <div class="sidebar">
            <img id="img" src="web.jpg" alt="GG" width=220px height="270px">
        </div>

        

             <div class="content">

                    <div>

                        <form name="myForm" action="index.php" onsubmit="return validateForm()"  method="post">


                            <input type = "text" name ="x" placeholder="X [-5; 5]">
                            <br>
                            <input id="y_input" class="form_input" placeholder="Y" disabled>
                            <label for="y_input"></label>
                            <select id = "y-input" name = "y">
                                <option value="-4">-4</option>
                                <option value="-3">-3</option>
                                <option value="-2">-2</option>
                                <option value="-1">-1</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <br>
                            <input id="r_input" class="form_input" placeholder="R" disabled>
                            <br>
                            <br>
                            <label for="form_radio_group"> </label>
                            <div id="valueR">

                                <div class="form_radio_btn">
                                    <input id="radio-1" type="radio" name="R" value="1" checked>
                                    <label for="radio-1">1</label>
                                </div>

                                <div class="form_radio_btn">
                                    <input id="radio-2" type="radio" name="R" value="2" checked>
                                    <label for="radio-2">2</label>
                                </div>

                                <div class="form_radio_btn">
                                    <input id="radio-3" type="radio" name="R" value="3" checked>
                                    <label for="radio-3">3</label>
                                </div>

                                <div class="form_radio_btn">
                                    <input id="radio-4" type="radio" name="R" value="4" checked>
                                    <label for="radio-4">4</label>
                                </div>

                                <div class="form_radio_btn">
                                    <input id="radio-5" type="radio" name="R" value="5" checked>
                                    <label for="radio-5">5</label>
                                </div>

                            </div>
                            <br>
                            <br>
                          <input class="knopka" type="submit" value="Нажми, чтобы отправить данные, пожалуйста"   >
                       
                        </form> 

                    </div> 

            </div>
              <?php
              session_start();
              if (!isset($_SESSION['counter'])) $_SESSION['counter']=0;
              if (isset($_POST['x']) and isset($_POST['y']) and isset($_POST['R'])) {
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
                                        for (i = 0; i < document.getElementsByName('R').length; i++) {
                                            if (document.getElementsByName('R')[i].checked) {
                                               
                                                radio_check_val = document.getElementsByName('R')[i].value;
                                            }        
                                        }
                                        if (radio_check_val === "")
                                        {
                                            alert("Значение R долнжа быть выбрана");
                                            bool=false;
                                        }     
                      


                      var x=document.forms["myForm"]["x"].value;
                                      var r1;
                                      if (x == null || x == "") {
                                          alert("X обязательно должно быть введено");
                                          bool = false;
                                      } else {

                                          r1 = /[+-]?([0-9]*[.])?[0-9]+$/;

                                          if (r1.test(x) == false) {
                                              alert('Значение X введено неправильно');
                                              bool = false;
                                          }
                                          else {

                                              if ((Number(x) > 5) || (Number(x) < -5)){
                                                  alert('Значение X введено вне диапазона');
                                                  bool=false;
                                          }
                                      }

                          }
                          return bool;
                        }

                  </script>
     </div>

  </body>

</html>



