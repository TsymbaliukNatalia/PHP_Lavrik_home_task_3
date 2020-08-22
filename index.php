<!-- Домашнее задание после урока No3.
1. Составить функцию для склонения слова.
Например, выбираете слова «минут».
Тогда функция принимает число в диапазоне от 0 до 59, а возвращает слово в правильном
склонении:
 вход: 10, выход: минут
 вход: 21, выход: минута
 вход: 4, выход: минуты

2. (*) Проверить работу функции на всех входных значениях. Как это сделать – решать Вам   -->

<?php
    $h = date('H');
    $m = intval(date('i'));
    $n = show_img($h);
    $hour = add_ending_hour($h);
    $minute = add_ending_minute($m);

    function show_img($h){
        if($h>0&&$h<6){
            return 'night';
        } else if($h>5&&$h<12){
            return 'morning';
        } else if($h>11&&$h<18){
            return 'day';
        } else {
            return 'evening';
        }
    };

    function add_ending_hour($h){
        if($h == 1 || $h == 21){
            return 'час';
        } else if(($h >= 2 && $h <= 4) || ($h >= 22 && $h <= 23)){
            return 'часa';
        } else {
            return 'часов';
        }
    };

    function add_ending_minute($m){
        $n = $m%10;
        if($n == 1 && $m != 11){
            return 'минута';
        } else if($n >= 2 && $n <= 4 && (($m - $m%10)/10) != 1){
            return 'минуты';
        } else {
            return 'минут';
        } 

    };
      
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
        background: url(img/<?php echo $n ?>.jpg);
    	background-size: cover;
    	color: red;
    }	
    </style>
</head>
<body>

    <h1><?php echo "1) $h $hour : $m $minute" ?></h1>
    <div>
    <h2> 2) Тестированье правильности окончания слова "час" </h2>
    <?php 
        for ($i = 0; $i < 24; $i++){
            $res = add_ending_hour($i);
            echo "<p>$i $res</p>";
        };
    ?>
    <h2> Тестированье правильности окончания слова "минута" </h2>
    <?php 
        for ($i = 0; $i < 60; $i++){
            $res = add_ending_minute($i);
            echo "<p>$i $res</p>";
        };
    ?>
    </div>

</body>