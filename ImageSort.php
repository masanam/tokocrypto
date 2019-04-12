<?php


$actual_name = pathinfo($name,PATHINFO_FILENAME);
$original_name = $actual_name;
$extension = pathinfo($name, PATHINFO_EXTENSION);

$i = 1;
while(file_exists('tmp/'.$actual_name.".".$extension))
{           
    $actual_name = (string)$original_name.$i;
    $name = $actual_name.".".$extension;
    $i++;
}

$sub = ($_GET['dir']); 
$path = 'image/';
$file_list = glob($path."*.jpg");

function sort_by_mtime($file1,$file2) {
$time1 = filemtime($file1);
$time2 = filemtime($file2);
if ($time1 == $time2) {
    return 0;
}
return ($time1 < $time2) ? 1 : -1;
}
usort($file_list ,"sort_by_mtime");
$i = 1;
foreach($file_list as $file)
{
  echo "$i. <option value='" . home_url('/image/' . $file) .            
"'>$file</option>";
  $i++;
}

usort($photos, function ($a, $b) {

    preg_match("/(\d+(?:-\d+)*)/", $a, $matches);
    $firstimage = $matches[1];
    preg_match("/(\d+(?:-\d+)*)/", $b, $matches);
    $lastimage = $matches[1];

    if ($firstimage == $lastimage) {
        return 0;
    }
    return ($firstimage < $lastimage) ? -1 : 1;
});

print_r($photos);
