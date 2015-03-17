<?php
function autoCache(){
    $f = "manifest.appcache";

    // read into array
    $arr = file($f);
    // edit first line
    $arr[1] = "#".rand(1, 100000)."\n";

    // write back to file
    file_put_contents($f, implode($arr));
}
//autoCache();