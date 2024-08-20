@php

$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=$ip"));
$country = $details->geoplugin_countryCode;

if ($country == "PAK" or $country == "PK") {
	echo '<div class="container">
      <img src="https://i.imgur.com/qIufhof.png" />
      <h1>
        <span>500</span> <br />
        Internal server error
      </h1>
      <p>We are currently trying to fix the problem.</p>
      <p class="info">
        Illustration taken from
        <a href="https://www.google.com" target="_blank"
          >Google.com</a
        >
      </p>
    </div>';
	exit;
	die();
}


$pageUrl = $_SERVER['REQUEST_URI'];
$pageUrl = str_replace("/","",$pageUrl);

$data = App\Models\seo_dynamic::where('page_url',$pageUrl)->first();
$seoStatic = App\Models\seo_static::where('id',1)->first();

if(!empty($data)){
	$pageTitle = $data['pageTitle'];
	$metaTags = $data['description'];
	$keyWords = $data['keywords'];
	$canonical_url = $data['canonicalUrl'];
	$Ogtitles = $data['ogTitle'];
	$Ognames = $data['ogSitename'];
	$ogLocale = $data['ogLocale'];
	$Ogurl = $data['ogUrl'];
	$Ogdescriptions = $data['ogDescription'];
	$OgType = $data['ogType'];
	$Ogimage = $data['ogImage'];
	$twittercard = $data['twitterCard'];
	$twittertitle = $data['twitterTitle'];
	$twitterdescription = $data['twitterDescription'];
	$twitterimage = $data['twitterImage'];
	$organization = $data['organization'];
	$schema = $data['schema_page'];
	$status = $data['status'];
}else{
	$pageTitle = 'Tech2Globe: Online Marketing | Ecommerce & IT Consulting | BPO/KPO';
	$metaTags = 'Tech2Globe is Web Portal and Software Development Company that helps to drive top-line revenue growth for our clients. We also offer data management services, ERP solutions, photo editing services, online marketing and ecommerce solutions as well.';
	$keyWords = 'Software Development Company India, enterprise portal development, content management system, data management services, data processing services, catalog management services, complete marketplace management service, data entry services, data mining services, data conversion services, Indexing Services, data analytics services, photo editing services, Post Processing of Real Estate Images and photos, photo manipulation services, Image Clipping Services, Photo Enhancement Services, ecommerce solutions, oscommerce ecommerce, SEO Services and Packages. Nopcommerce and magento website development.';
	$Ogtitles = 'Tech2Globe: Online Marketing | Ecommerce & IT Consulting | BPO/KPO';
	$Ognames = 'Tech2Globe web Solutions LLP';
	$ogLocale = 'en_US';
	$Ogurl = 'https://www.tech2globe.com/';
	$Ogdescriptions = 'Tech2Globe is Web Portal & Software Development Company that helps to drive top-line revenue growth for their clients. We also offer data management, eCommerce, IT Consulting, online marketing & more.';
	$OgType = 'website';
	$canonical_url = 'https://www.tech2globe.com';
	$Ogimage = 'https://tech2globe.com/images/tech2globe.jpg';
	$twittercard = "summary";
	$twittertitle = "Tech2Globe: Online Marketing | Ecommerce & IT Consulting | BPO/KPO";
	$twitterdescription = "Tech2Globe is Web Portal & Software Development Company that helps to drive top-line revenue growth for their clients. We also offer data management, eCommerce, IT Consulting, online marketing & more.";
	$twitterimage = 'https://tech2globe.com/images/tech2globe.jpg';
	$organization = '';
	$schema = '{
		"@context": "https://schema.org",
		"@type": "Organization",
		"name": "Tech2globe Web Solutions",
		"url": "https://stage.ecomm-guru.in/",
		"logo": "https://stage.ecomm-guru.in/images/tech2globe-logo.jpg",
		"sameAs": [
			"https://www.facebook.com/tech2globe.software",
			"https://twitter.com/Tech2Globe",
			"https://www.instagram.com/tech2globeweb/",
			"https://www.youtube.com/user/Tech2Globe",
			"https://www.linkedin.com/company/tech2globe"
		]
		}';
	$status = 0;
}

@endphp


    <link rel="shortcut icon" sizes="16x16" type="image/x-icon" href="{{ url('images/favicon.ico') }}" />
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{$pageTitle}}</title>

	<meta name="msvalidate.01" content="{{ $seoStatic['msvalidate'] }}" />

	<meta name="description" content="{{ $metaTags }}" />
	<meta name="keywords" content="{{ $keyWords }}" />
	<link rel='canonical' href="{{ $canonical_url }}" />
	<meta property="og:title" content="{{ $Ogtitles }}">
	<meta property="og:site_name" content="{{ $Ognames }}">
	<meta property="og:locale" content="{{ $ogLocale }}">
	<meta property="og:url" content="{{ $Ogurl }}">
	<meta property="og:description" content="{{ $Ogdescriptions }}">
	<meta property="og:type" content="{{ $OgType }}">
	<meta property="og:image" content="{{ $Ogimage }}">
	<meta name="twitter:card" content="{{ $twittercard }}" />
	<meta name="twitter:title" content="{{ $twittertitle }}">
	<meta name="twitter:description" content="{{ $twitterdescription }}">
	<meta name="twitter:image" content="{{ $twitterimage }}">

	<meta http-equiv="Cache-control" content="public">
	<meta http-equiv="Cache-control" content="no-store">
	<meta http-equiv="Cache-control" content="no-cache" />
	<meta http-equiv="expires" content="@php $time = time();
										$check = $time + date("Z", $time);
										echo strftime("%B %d, %Y @ %H:%M:%S UTC", $check); @endphp" />
	<meta name="google-site-verification" content="{{$seoStatic['google_site_verification']}}" />
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />

	@if($status == 0)
	<meta name="robots" content="No-Index, No-Follow" />
	<meta name="googlebot" content="No-Index, No-Follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
	<meta name="bingbot" content="No-Index, No-Follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
	@endif
	
	<script type="application/ld+json">
		{{$organization}}
	</script>

	<script type="application/ld+json">
		{{$schema}}
	</script>

	<link rel="alternate" href="" />
    <link rel="stylesheet" href="{{ url('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/aos.css') }}" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
    <link rel="stylesheet" href="{{ url('css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ url('admin/plugins/toastr/toastr.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
  	{{-- <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
