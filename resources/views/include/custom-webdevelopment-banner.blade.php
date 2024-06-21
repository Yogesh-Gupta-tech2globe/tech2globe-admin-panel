<?php
$pageName = str_replace(['-', '/', '.php'], ' ', $_SERVER['PHP_SELF']);
$pageName = ucfirst($pageName);
?>
<div class="row mb-4 banner-container-z">
    <div class="col-12">
        <img src="images/custom-webdevelopment-banner.jpg" alt="ecommerce" class="img-responsive banner-top-z">
    </div>
    <div class="text-banner">
    <h2><?php echo $pageName; ?></h2>
    </div>
</div>