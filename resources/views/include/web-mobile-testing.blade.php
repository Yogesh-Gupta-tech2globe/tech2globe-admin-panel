<?php
$pageName = str_replace(['-', '/', '.php'], ' ', $_SERVER['PHP_SELF']);
$pageName = trim(ucwords($pageName)); // ucwords to capitalize each word
?>
<div class="row mb-4 banner-container-z">
    <div class="col-12">
        <img src="images/web-and-mobile-testing-banner-1.jpg" alt="ecommerce" class="img-responsive banner-top-z">
    </div>
    <div class="text-banner">
        <h2><?php echo $pageName; ?></h2>
    </div>
</div>
