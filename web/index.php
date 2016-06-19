<?php 
require('../vendor/autoload.php')
function run($url){
	$testArr=[];
	exec("timeout 20s ffprobe $url".' 2>&1',$output);
	foreach ($output as $i) {
		if (strpos($i, 'kb/s') !== false) {
    array_push($testArr,$i);
}
	}
	if ($testArr){
		return "good";
	}
	else{
		return "bad";
	}
}

print_r(run("http://91.192.180.66:1935/tv-channels/stream02/playlist.m3u8"));
return "ok";


 ?>