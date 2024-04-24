<?php
include_once('../config/Database.php');
header('content-type: image/svg+xml');
error_reporting(0);

$db = new db;
$func = new func;

if($_GET['theme'] == 'asoul'){
    $domain = '../theme/asoul';
}elseif($_GET['theme'] == 'moebooru'){
    $domain = '../theme/moebooru';
}elseif($_GET['theme'] == 'moebooru-h'){
    $domain = '../theme/moebooru-h';
}elseif($_GET['theme'] == 'rule34'){
    $domain = '../theme/rule34';
}else{
    $domain = '../theme/moebooru';
}

$length = 7; // 最大单位为百万 即7位数
$count = $NAME_COUNT['count'];
$complete = str_repeat('0' , $length - strlen($count)) . $count; // 自动补全
$imageArray = str_split($complete); // 将字符串分割为字符数组
?>

<svg width="315" height="100" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>Moe Count</title>
    <g>
        <?php
        // 输出图片
        $x_loacl = 0;
        for($i = 0; $i <= 6; $i+=1){
            if($_GET['theme'] == 'rule34'){
                $image_file_local = $func->__base64EncodeImage($domain . "/" . $imageArray[$i] . '.gif');
            }else{
                $image_file_local = $func->__base64EncodeImage($domain . "/" . $imageArray[$i] . '.png');
            }
            echo "<image x='".$x_loacl."' y='0' width='45' height='100' xlink:href='".$image_file_local."' />";
            $x_loacl = $x_loacl + 45;
        }
        
        ?>
    </g>
</svg>