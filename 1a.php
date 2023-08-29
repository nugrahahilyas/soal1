<?php 

function timeInWords($h, $m){
    $huruf = [
        1 => "one",
        2 => "two",
        3 => "three",
        4 => "four",
        5 => "five",
        6 => "six",
        7 => "seven",
        8 => "eight",
        9 => "nine",
        10 => "ten",
        11 => "elevan",
        12 => "twelve",
        13 => "thirteen",
        14 => "fourteen",
        15 => "fifteen",
        16 => "sixteen",
        17 => "seventeen",
        18 => "eighteen",
        19 => "nineteen",
        20 => "twenty"
    ]
        $menit = ($m > 30) ? (60 - $m) : $m;
    
        if ($menit == 0) {
            $hasil = $huruf[$h] . " o'clock";
        } elseif ($menit == 15) {
            $hasil = "quarter past " . $huruf[$h];
        } elseif ($menit == 30) {
            $hasil = "half past " . $huruf[$h];
        } elseif ($menit == 45) {
            $hasil = "quarter to " . $huruf[$h + 1];
        } else {
            if ($menit <= 20) {
                $hasil = $huruf[$menit] . " minutes past " . $huruf[$h];
            } else {
                $puluhan = floor($menit / 10) * 10;
                $satuan = $menit % 10;
                $hasil = $huruf[$puluhan];
                if ($satuan > 0) {
                    $hasil .= " " . $huruf[$satuan];
                }
                $hasil .= " minutes past " . $huruf[$h];
            }
        }
    
        return $timeInWords;
    }
    



$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$h = intval(trim(fgets(STDIN)));
$m = intval(trim(fgets(STDIN)));
$result = timeInWords($h, $m);
fwrite($fptr, $result . "\n");
fclose($fptr);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soal 1a</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1>Time To Word</h1>
    <?php if (isset($_POST)) : ?>
        <?php
           $h = $_POST['hour'];
           $m = $_POST['minute'];
           $result = timeInWords($h, $m);
        ?>
    <?php endif; ?>
    <form action="" method="post">
        <input type="" placeholder="insert hours..." name="hour">
        <input type="" placeholder="insert minutes..." name="minute">
        <button type="submit">Submit!</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>