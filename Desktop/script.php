<!DOCTYPE html>
<html>

<body>

            <?php
                
                if (bool == true) {


                    $start = microtime(true);
                    date_default_timezone_set('Europe/Moscow');
                    $time = date("d.m.y H:i");
                    $X = $_POST['x'];
                    $Y = $_POST['y'];
                    $R = $_POST['R'];

                    if ($X >= 0 && $Y <= 0) {
                        if ($Y >=  $X - $R) {
                            $poof = "точка входит в область";
                        } else {
                            $poof = "точка нe входит в область";
                        }

                    }
                    if ($X <= 0 && $Y <= 0) {
                        if ($X * $X + $Y * $Y <= $R * $R) {
                            $poof = "точка входит в область";
                        } else {
                            $poof = "точка нe входит в область";
                        }
                    }

                    if ($X < 0 && $Y > 0)
                        $poof = "точка нe входит в область";
                    if ($X >= 0 && $Y >= 0) {
                        if ($X <= $R && $Y <= $R) {

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
                    $X = round($X, 5);
            if (isset($_POST['x']) and isset($_POST['y']) and isset($_POST['R'])) {
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



