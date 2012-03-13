#!/usr/bin/php -q
<?php 
	rename('/home/pirateslog/log/output.log', '/home/pirateslog/log/'.date('Ymd').'_output.log');
?>