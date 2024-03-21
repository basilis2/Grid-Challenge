<?php

/*
 * Complete the 'gridChallenge' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING_ARRAY grid as parameter.
 */

function gridChallenge($grid) {
$ab = range('a', 'z');
$ab2 = range('A', 'Z');
$array_length=count($ab);
$l=count($grid);

$total_letters = 0;
foreach ($grid as $string) {
    $letters_count = strlen($string);
    $total_letters += $letters_count;
}
$p=$total_letters/$l;
$arr = array_fill(0, $p, 'value');
$l--;
while($l>=0){
    for ($j = 0; $j <$p; $j++){
       $arr[$j]=$grid[$l][$j];
}
sort($arr);
 for ($j = 0; $j <$p; $j++){
       $grid[$l][$j]=$arr[$j];
}
    $l--;
}
foreach ($grid as $row) {
    for ($i = 0; $i < strlen($row); $i++) {
        //echo $row[$i] . " ";
    }
    //echo "\n";
}

$prin=-1;
for ($j = 0; $j <$p; $j++){
 for ($i = 0; $i <count($grid); $i++) {
         for($v=0;$v<$array_length;$v++){
             if(($ab[$v]==$grid[$i][$j])||($ab2[$v]==$grid[$i][$j])){
                 if($v>=$prin){
                     $prin=$v;
                 }else{
                     return 'NO';
                 }
             }
         }
     }
       $prin=0;
} 
  return 'YES';
}





$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $grid = array();

    for ($i = 0; $i < $n; $i++) {
        $grid_item = rtrim(fgets(STDIN), "\r\n");
        $grid[] = $grid_item;
    }

    $result = gridChallenge($grid);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
?>