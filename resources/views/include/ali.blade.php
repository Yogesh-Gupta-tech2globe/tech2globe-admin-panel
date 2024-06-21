<?php 
     $url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $validURL = str_replace("&", "&amp;", $url);
    $word='/';
    $count = substr_count( $validURL,$word );
    if($count > 3 ){echo'<meta name="robots" content="noindex">';
	echo"<script>window.location.href='https://newsite.tech2globe.co.in/'</script>";
	}else{ echo ""; }
?>
