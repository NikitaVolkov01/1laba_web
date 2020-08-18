<!DOCTYPE html>
<html>    

    <head>
        <title> 1 Laba Web </title> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <link rel="stylesheet" type="text/css" href="index.css">     
    </head>

<body>
            <?php

                $start = microtime(true);
                date_default_timezone_set('Europe/Moscow');
                $time= date("d.m.y H:i");
                $X=$_GET['x'];
                $Y=$_GET['y'];
                $R=$_GET['R'];

                if($X>=0 && $Y>=0) {
                    if($Y<=-2*$X+$R){
                        $poof="точка входит в область";
                    }
                    else{
                        $poof="точка нe входит в область";
                    }

                }
                if($X<0 && $Y>0) {
                    if ($X*$X+$Y*$Y<=$R*$R) {
                        $poof="точка входит в область";
                    }
                    else{
                        $poof="точка нe входит в область";
                    }
                }

                if($X>0 && $Y<0) 
                    $poof="точка нe входит в область";
                if($X<=0 && $Y<=0){
                    if($X >= -$R && $Y >= -$R ){
                        
                        $poof="точка входит в область";
                    }
                    else{
                        $poof="точка нe входит в область";
                    }
                }
                

                        $finish = microtime(true);
                        $timeWork=$finish-$start;
                        $timeWork=round($timeWork,7);
                        $ses=$_SESSION['counter'];
                        $ses++;
                        $_SESSION['row'][$ses]="<tr>
                                        <td> $time </td>
                                        <td> $timeWork </td>
                                        <td> $X </td>
                                        <td> $Y </td>
                                        <td> $R </td>
                                        <td> $poof </td>
                                    </tr>";
            ?>
                          
            <h3><center><? echo $poof; ?></center></h3>
                    <br>
                    <center>
                       <div class="table2"> 
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
                                    for($m=1;$m<=$ses;$m++){
                                        echo $_SESSION['row'][$m];
                                    }
                                ?>
                        
                        </table>
                       </div> 
                    </center>
                   


</body>



