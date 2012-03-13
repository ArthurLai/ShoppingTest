<?php
	$link = "http://123.com";
	$picture = "http://123.com/123.jpg";
	$headline = "123";
	$abstract = "456";
	
	
	$syntax = "
	
		<div >
			<div >
				<a href='$link' target='_parent'><img src='$picture' border='0' alt='post_thumbnail'  /></a>
			</div>
			<div >
				<a href='$link' target='_parent'><h3>'$headline'</h3></a>
				<br>'$abstract'</p>
				<br><p ><a href='$link' target='_parent'>...Ä~Äò¾\Åª</a></p></div>
		</div>
		<div > TEST </div>
	
	
	";
	
	
	echo $syntax;
?>