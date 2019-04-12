<?php
function SubArray($arr1, $arr2, $m, $n) 
{ 
    $i = 0; 
    $j = 0; 
    for ($i = 0; $i < $n; $i++) 
    { 
        for ($j = 0; $j < $m; $j++) 
        { 
            if($arr2[$i] == $arr1[$j]) 
                break; 
        } 

        if ($j == $m) 
            return false; 
    } 

    return true; 
}
