<!DOCTYPE html>
<html>    

    <head>
        <title> Волков Никита P3230 </title> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <link rel="stylesheet" type="text/css" href="index.css">     
    </head>

<body>

<script type="text/javascript">


    var inputs = document.getElementsByName("R");
    for(var i = 0; i < inputs.length; i++) inputs[i].onchange = checkboxHandler;




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


</script>
            <?php
                
                if (bool == true) {


                    $start = microtime(true);
                    date_default_timezone_set('Europe/Moscow');
                    $time = date("d.m.y H:i");
                    $X = $_GET['x'];
                    $Y = $_GET['y'];
                    $R = $_GET['R'];

                    if ($X >= 0 && $Y >= 0) {
                        if ($Y <= -2 * $X + $R) {
                            $poof = "точка входит в область";
                        } else {
                            $poof = "точка нe входит в область";
                        }

                    }
                    if ($X < 0 && $Y > 0) {
                        if ($X * $X + $Y * $Y <= $R * $R) {
                            $poof = "точка входит в область";
                        } else {
                            $poof = "точка нe входит в область";
                        }
                    }

                    if ($X > 0 && $Y < 0)
                        $poof = "точка нe входит в область";
                    if ($X <= 0 && $Y <= 0) {
                        if ($X >= -$R && $Y >= -$R) {

                            $poof = "точка входит в область";
                        } else {
                            $poof = "точка нe входит в область";
                        }
                    }


                    $finish = microtime(true);
                    $timeWork = $finish - $start;
                    $timeWork = round($timeWork, 7);
                    $ses = $_SESSION['counter'];
                    $ses++;
                    $Y = round($Y, 5);
            if (isset($_GET['x']) and isset($_GET['y']) and isset($_GET['R'])) {
                $_SESSION['row'][$ses] = "<tr>
                                        <td> $time </td>
                                        <td> $timeWork </td>
                                        <td> $X </td>
                                        <td> $Y </td>
                                        <td> $R </td>
                                        <td> $poof </td>
                                    </tr>";
            }
                }
            ?>
        <div class="footer">
            <h3><? echo $poof; ?></h3>
                    <br>
                   
                        <table>
                            <tr>
                                <td>Дата и время запроса</td>
                                <td>Время выполнения</td>
                                <td>Координата X</td>
                                <td>Координата Y</td>
                                <td>Параметр R</td>
                                <td>Результат</td>
                            </tr>
                         
                                <?php

                                    for ($m = 1; $m <= $ses; $m++) {
                                        echo $_SESSION['row'][$m];
                                    }

                                ?>
                        
                        </table> 
                   
        </div>


</body>



