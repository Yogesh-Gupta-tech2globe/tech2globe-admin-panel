<?php

if (isset($_POST['contact_form_submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['tel'];
    $website = $_POST['website'];
    $message = $_POST['message'];
    $Link = $_POST['pagelinks'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email
        echo json_encode(array('error' => 'Please enter a valid email.'));
        exit();
    }

    $from_email = 'info@tech2globe.com';
    $static = 'Tech2globe.com';
    $your_email = 'yogesh.tech2globe@gmail.com';
    $email_subject = "Enquiry on Tech2globe.com";

    $header1 = "From: $static <" . $from_email . ">\r\n";
    $header2 = "From: $fname $lname <" . $email . ">\r\n";
    $header1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $header2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $email_content1 = "Thank you for your enquiry. Our team will get back to you within 1 business day.";

    $message = "
        <html>
        <head>
          <title>Enquiry from Tech2globe</title>
        </head>
        <body>
          <p>First Name: $fname</p>
          <p>Last Name: $lname</p>
          <p>Phone: $phone</p>
          <p>Mail ID: $email</p>
          <p>Website: $website</p>
          <p>Message: $message</p>
          <table>
            <tr><td style='font-size:14px; font-family:Arial, Helvetica, sans-serif;'>Send from Page: $Link<br><br></td></tr>
          </table>
        </body>
        </html>";


    // Attempt to send email
    if (@mail($your_email, $email_subject, $message, $header2) && @mail($email, "Thank you - Enquiry Received On Tech2globe", $email_content1, $header1)) {
        // Successful email sending
        echo "<script>
            window.location.replace('https://canada.tech2globe.co.in/thank-you');</script>";
    } else {
        // Email sending failed
        echo "<script>alert('Something went wrong.');
            window.location.replace('https://canada.tech2globe.com/" . $Link . "');</script>";
    }
}

?>

<?php

if (isset($_POST['query_form'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $Link = $_POST['pagelinks'];


    $from_email = 'info@tech2globe.com';
    $static = 'Tech2globe.com';
    $your_email = 'info@tech2globe.com';
    $email_subject = "Enquiry on Tech2globe.com";

    $header = "From: $name <" . $from_email . ">\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


    $message = "
        <html>
        <head>
          <title>Enquiry from Tech2globe</title>
        </head>
        <body>
          <p>Name: $name</p>
          <p>Phone: $phone</p>
          <table>
            <tr><td style='font-size:14px; font-family:Arial, Helvetica, sans-serif;'>Send from Page: $Link<br><br></td></tr>
          </table>
        </body>
        </html>";


    // Attempt to send email
    if (@mail($your_email, $email_subject, $message, $header)) {
        // Successful email sending
        echo "<script>
            window.location.replace('https://canada.tech2globe.co.in/thank-you');</script>";
    } else {
        // Email sending failed
        echo "<script>alert('Something went wrong.');
            window.location.replace('https://canada.tech2globe.com/" . $Link . "');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="title" content="Data Extraction Services | Hire Virtual Assistant Experts - Tech2Globe">
    <meta name="description" content="Tech2Globe's virtual assistant experts specialize in data extraction services. Extract valuable insights from your data efficiently." />
    <meta name="keywords" content="Data Entry Services ,  Data Processing Services , Data Conversion Services ,Data Extraction Services ,Data Scraping Services ,Customer Support Services ,Call Center Services ,Backend Support Services ,data support services ,Chat Support Services ">
    <meta name="author" content="tech2globe">
    <link rel="icon" type="image/png" sizes="32x32" href="/hire-virtual-assistant/images/favicon.ico">
    <title>Hire Virtual Assistant</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap5 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- slick cdn css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

    <style>
        .select-box ol li .country-name {
            font-size: 15px !important;
        }

        .select-box .option strong {
            font-weight: 500 !important;
        }

        .selected-option{
            position: relative;
        }
        .selected-option::before {
            position: absolute;
            content: '';
            width: 0;
            height: 0;
            border-top: 5px solid #000;
            border-left: 3px solid transparent;
            border-right: 3px solid transparent;
            right: auto;
            left: 60px;
            top: 16px;
        }
    </style>
</head>

<body>
    <header class="main-header bg-white position-fixed w-100 start-0 top-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand w-25" href="#"><img class="w-75" src="images/tech2globe-logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#our-services">What We Do</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#why-choose">Why Choose Tech2Globe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#our-customers">Our Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#our-contact">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- hero section start -->

    <section class="section-a">
        <div class="container">
            <div class="row sub-section-a d-flex justify-content-between align-items-center">
                <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                    <h1 class="text-dark main-heading">Virtual Assistants Are the Solution For Your Business</h1>
                    <p class="" style="color: #f26e4f;">Get In Touch With Us Today</p>
                    <div class="button-container">
                        <a href="#our-contact" class="main-button">Get Started</a>
                        <a href="tel:+1-250-206-8787" class="main-button call-us-btn">Call Us</a>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                    <figure class="w-100">
                        <img class="w-100" style="border-radius: 20px;" src="/hire-virtual-assistant/images/businesswomen.jpg" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- hero section end -->

    <!-- service section start -->
    <section class="section-b" id="our-services">
        <div class="container padding-block-container">
            <div class="row d-flex justify-content-center">
                <h3 class="text-center heading-3">Virtual Assistant Services We Offer</h3>
                <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 20%;"></span>
                <p class="text-center pt-2 pb-2">Curb the struggle of managing extensive administration tasks, and scale your business growth with contemporary solutions. Hire virtual assistants from the global service provider Tech2Globe Web Solutions. We utilize the latest tools, techniques, and processes to provide world-class and 100% accurate services. Furthermore, we allocate you tech-savvy and proactive VAs that have aptitude in various fields to run admin errands for you and support challenges that you may be facing. Our comprehensive solutions include, but are not limited to</p>

                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                    <div class="card">
                        <div class="heading-container">
                            <figure class="icon w-25">
                                <img class="w-100" src="/hire-virtual-assistant/images/data-entry-service.png" alt="">
                            </figure>
                            <div class="heading-4">
                                <h4 class="text-dark text-center">Data Entry Services</h4>
                            </div>
                        </div>
                        <div class="content-container text-center">
                            <p class="text-dark">We have been in the data entry business for over 12 years, and our services are backed by this solid experience in handling diverse requirements.</p>
                            <a href="https://tech2globe.com/data-entry-services" class="sub-button">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                    <div class="card">
                        <div class="heading-container">
                            <figure class="icon w-25">
                                <img class="w-100" src="/hire-virtual-assistant/images/data-processing.png" alt="">
                            </figure>
                            <div class="heading-4">
                                <h4 class="text-dark text-center">Data Processing Services</h4>
                            </div>
                        </div>
                        <div class="content-container text-center">
                            <p class="text-dark">Data processing is critical to get the most out of your data. We make data processing easy so you can focus on higher-value tasks.</p>
                            <a href="https://tech2globe.com/data-processing-services" class="sub-button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                    <div class="card">
                        <div class="heading-container">
                            <figure class="icon w-25">
                                <img class="w-100" src="/hire-virtual-assistant/images/data-conversion.png" alt="">
                            </figure>
                            <div class="heading-4">
                                <h4 class="text-dark text-center">Data Conversion Services</h4>
                            </div>
                        </div>
                        <div class="content-container text-center">
                            <p class="text-dark">Our team of data experts have been handling data conversion requirements for a diverse clientele from across the world.</p>
                            <a href="https://tech2globe.com/data-conversion-services" class="sub-button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                    <div class="card">
                        <div class="heading-container">
                            <figure class="icon w-25">
                                <img class="w-100" src="/hire-virtual-assistant/images/data-extraction.png" alt="">
                            </figure>
                            <div class="heading-4">
                                <h4 class="text-dark text-center">Data Extraction Services</h4>
                            </div>
                        </div>
                        <div class="content-container text-center">
                            <p class="text-dark">Extracting data from huge databases can take time and effort. Our team leverages the power of scripts to browse through massive databases.</p>
                            <a href="https://tech2globe.com/data-extraction-services" class="sub-button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                    <div class="card">
                        <div class="heading-container">
                            <figure class="icon w-25">
                                <img class="w-100" src="/hire-virtual-assistant/images/data-scraping.png" alt="">
                            </figure>
                            <div class="heading-4">
                                <h4 class="text-dark text-center">Data Scraping Services</h4>
                            </div>
                        </div>
                        <div class="content-container text-center">
                            <p class="text-dark">Online data extraction is a tedious, time-consuming process that requires multiple expensive software, servers, and resources.</p>
                            <a href="https://tech2globe.com/web-scraping-services" class="sub-button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                    <div class="card">
                        <div class="heading-container">
                            <figure class="icon w-25">
                                <img class="w-100" src="/hire-virtual-assistant/images/customer-support-service.png" alt="">
                            </figure>
                            <div class="heading-4">
                                <h4 class="text-dark text-center">Customer Support Services</h4>
                            </div>
                        </div>
                        <div class="content-container text-center">
                            <p class="text-dark">We prioritise customer satisfaction and provide prompt support to address any concerns or inquiries. </p>
                            <a href="https://tech2globe.com/customer-support-services" class="sub-button">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                    <div class="card">
                        <div class="heading-container">
                            <figure class="icon w-25">
                                <img class="w-100" src="/hire-virtual-assistant/images/business-process-outsourcing.png" alt="">
                            </figure>
                            <div class="heading-4">
                                <h4 class="text-dark text-center">Call Center Services</h4>
                            </div>
                        </div>
                        <div class="content-container text-center">
                            <p class="text-dark">Experience the tailored call center service to meet the diverse needs of your customers and ensure they receive top-notch assistance every time.</p>
                            <a href="https://tech2globe.com/call-center-consulting" class="sub-button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                    <div class="card">
                        <div class="heading-container">
                            <figure class="icon w-25">
                                <img class="w-100" src="/hire-virtual-assistant/images/backend-support-services.png" alt="">
                            </figure>
                            <div class="heading-4">
                                <h4 class="text-dark text-center">Backend Support Services</h4>
                            </div>
                        </div>
                        <div class="content-container text-center">
                            <p class="text-dark">Tailored solutions to cater your unique demands. With Tech2Globe’s comprehensive database management keep your systems updated, secure, and optimized.</p>
                            <a href="https://tech2globe.com/sales-support-services" class="sub-button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                    <div class="card">
                        <div class="heading-container">
                            <figure class="icon w-25">
                                <img class="w-100" src="/hire-virtual-assistant/images/knowledge-process-outsourcing.png" alt="">
                            </figure>
                            <div class="heading-4">
                                <h4 class="text-dark text-center">Data Support Services</h4>
                            </div>
                        </div>
                        <div class="content-container text-center">
                            <p class="text-dark">Harness the power of your company’s data for crucial and informed decision-making. Our Data Support professionals have the knowledge to help you leverage your data effectively.</p>
                            <a href="https://tech2globe.com/data-management-services" class="sub-button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                    <div class="card">
                        <div class="heading-container">
                            <figure class="icon w-25">
                                <img class="w-100" src="/hire-virtual-assistant/images/chat-support-services.png" alt="">
                            </figure>
                            <div class="heading-4">
                                <h4 class="text-dark text-center">Chat Support Services</h4>
                            </div>
                        </div>
                        <div class="content-container text-center">
                            <p class="text-dark">Upgrade customer engagement and support with professional Chat Support Services. Our agents are trained to provide prompt responses and 24/7 assistant.</p>
                            <a href="https://www.tech2globe.com/chat-support-services" class="sub-button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->

    <!-- why should you hire start -->
    <section class="section-c padding-block-container" id="why-choose">
        <h3 class="text-center heading-3">Why Should You Hire Virtual Assistants From Tech2gobe?</h3>
        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px" style="width: 40%;"></span>

        <div class="container">
            <div id="counter" class="row">
                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                    <div class="item">
                        <span class="count" data-number="40"></span><span class="symbol">%</span>
                        <p class="text">Cost Reduction</p>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                    <div class="item">
                        <span class="count" data-number="24"></span>
                        <p class="text">Hrs Turnaround</p>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                    <div class="item">
                        <span class="count" data-number="500"></span><span class="symbol">+</span>
                        <p class="text">Satisfied Client</p>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                    <div class="item">
                        <span class="count" data-number="250"></span><span class="symbol">+</span>
                        <p class="text">Skilled Agents</p>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                    <div class="item">
                        <span class="count" data-number="100"></span><span class="symbol">%</span>
                        <p class="text">Accuracy</p>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                    <div class="item">
                        <span class="count" data-number="12"></span>
                        <p class="text">Years Experience </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- why should you hire end -->


    <!-- valued customer start -->
    <section class="section-d padding-block-container" id="our-customers">
        <h3 class="text-center heading-3">Our Valued Customers</h3>
        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
        <div class="container mt-2">
            <div class="row my-5 text-center d-flex justify-content-between align-items-center our-valued-customer gap-4">
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <figure>
                        <img src="/hire-virtual-assistant/images/aonHewit.png" alt="">
                    </figure>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <figure>
                        <img src="/hire-virtual-assistant/images/follett.png" alt="">
                    </figure>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <figure>
                        <img src="/hire-virtual-assistant/images/foodora-1.png" alt="">
                    </figure>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <figure>
                        <img src="/hire-virtual-assistant/images/go-mechanic.png" alt="">
                    </figure>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <figure>
                        <img src="/hire-virtual-assistant/images/hp.png" alt="">
                    </figure>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <figure>
                        <img src="/hire-virtual-assistant/images/nike.png" alt="">
                    </figure>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <figure>
                        <img src="/hire-virtual-assistant/images/sales-warp.png" alt="">
                    </figure>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <figure>
                        <img src="/hire-virtual-assistant/images/SmartSense_Logo_Color.jpg" alt="">
                    </figure>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <figure>
                        <img src="/hire-virtual-assistant/images/wellist.png" alt="">
                    </figure>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                    <figure>
                        <img src="/hire-virtual-assistant/images/zebit-logo-rgb.png" alt="">
                    </figure>
                </div>
            </div>

        </div>
    </section>
    <!-- valued customer end -->

    <!-- testimonial start -->

    <section class="section-e">

        <div class="container padding-block-container">
            <h3 class="text-center heading-3">Testimonials</h3>
            <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
            <div class="row responsive">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="details">
                        <p>Choosing Tech2Globe’s Virtual Assistant services was one of the best decisions we made for our business. Their team of skilled professionals has consistently delivered top-notch support, helping us streamline our operations and boost productivity. We highly recommend Tech2Globe to anyone in need of reliable virtual assistant services.
                        </p>
                    </div>
                    <div class="description">
                        <div class="name">
                            <strong>- Eva Smith</strong>
                        </div>
                        <div class="designation my-2">
                            <p>Relations Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="details">
                        <p>We've been working with Tech2Globe Web Solutions for over a year now, and their virtual assistants have become an integral part of our daily operations. Their dedication, attention to detail, and ability to adapt to our unique requirements have exceeded our expectations. Tech2Globe is our trusted partner for all our virtual assistant needs.
                        </p>
                    </div>
                    <div class="description">
                        <div class="name">
                            <strong>- James Baker</strong>
                        </div>
                        <div class="designation my-2">
                            <p>MD</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="details">
                        <p>Tech2Globe's virtual assistants have truly been a game-changer for our small business. Their professionalism and commitment to delivering high-quality work have allowed us to focus on our core activities while they handle tasks such as customer support, data entry, and research. We couldn't be happier with their services.
                        </p>
                    </div>
                    <div class="description">
                        <div class="name">
                            <strong>- Raechel Bennette</strong>
                        </div>
                        <div class="designation my-2">
                            <p>Co-Owner</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="details">
                        <p>As a busy entrepreneur, I was looking for a reliable virtual assistant service provider, and I found exactly what I needed with Tech2Globe. Their team is not only skilled but also efficient, ensuring that tasks are completed promptly and accurately. Tech2Globe has become an indispensable part of my business.
                        </p>
                    </div>
                    <div class="description">
                        <div class="name">
                            <strong>- Louis Davis</strong>
                        </div>
                        <div class="designation my-2">
                            <p>Operations Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="details">
                        <p>Tech2Globe Web Solutions has been instrumental in helping us scale our business operations. Their virtual assistants are not just assistants; they are a valuable extension of our team. Their professionalism and expertise in various tasks have consistently exceeded our expectations. Highly recommended!
                        </p>
                    </div>
                    <div class="description">
                        <div class="name">
                            <strong>- Howard Roberts</strong>
                        </div>
                        <div class="designation my-2">
                            <p>Department Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial end -->

    <!-- contact us section-f start -->
    <section class="section-f padding-block-container" id="our-contact">
        <div class="container">
            <h3 class="text-center text-white heading-3">Get Started with Remote Professionals Today</h3>
            <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px"></span>

            <div class="row">
                <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12 m-auto">
                    <?php $actual_link = str_replace('.php', '', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']); ?>
                    <form class="shadow-sm p-4 d-flex justify-content-center align-items-center flex-column bg-white form-a" action="" method="post">
                        <input name="pagelinks" value="<?php echo $actual_link; ?>" type="hidden" />
                        <div class="row w-100 mb-3">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" name="fname" required>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" name="lname">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <input type="email" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Official Email" name="email" required>
                            </div>
                            <div id="flag-container-hire-virtual-assistant" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 position-relative flag-ca">
                                <div class="select-box">
                                    <div class="selected-option">
                                        <div>
                                            <span class="iconify" data-icon="flag:us-4x3"></span>
                                            <strong>+1</strong>
                                        </div>
                                        <input type="tel" name="tel" placeholder="1111-000-1234" minlength="10" required id="phoneInput">
                                    </div>
                                    <div class="options">
                                        <input type="text" class="search-box" placeholder="Search Country Name">
                                        <ol>

                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Website* -- Ex: http://www.example.com" name="website" required>
                            </div> -->

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="message" required></textarea>
                            </div>
                            <div class="col-xs-12">
                                <button type="submit" class="main-button rounded-0" name="contact_form_submit">Submit</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- contact us section-f end -->

    <!-- section-g start -->
    <section class="section-g">
        <div class="have-query-section">
            <div class="container-fluid" id="have_queries">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                        <h3 class="text-capitalize text-extra-dark-gray mb-3 font-weight-700 md-w-100 d-block text-center text-white main-heading">have queries?</h3>
                        <small class="text-white text-center w-100 d-block pb-5 text-capitalize">get a call back today!</small>

                        <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
                            <form action="" method="post">
                                <input name="pagelinks" value="<?php echo $actual_link; ?>" type="hidden" />
                                <input type="text" placeholder="Name" name="name" required>
                                <input type="tel" placeholder="Phone Number" name="phone" required maxlength="15">
                                <input type="submit" value="submit" name="query_form">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                        <p>&copy; Copyright 2023 Tech2globe All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section-g start -->

    <script>
        let count = document.querySelectorAll(".count")
        let arr = Array.from(count)
        arr.map(function(item) {
            let startnumber = 0

            function counterup() {
                startnumber++
                item.innerHTML = startnumber

                if (startnumber == item.dataset.number) {
                    clearInterval(stop)
                }
            }

            let stop = setInterval(function() {
                counterup()
            }, 50)

        })
    </script>

    <script src="script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- slick min -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $('.responsive').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 2,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>

    <script>
        // Get a reference to the input field
        const phoneInput = document.getElementById('phoneInput');

        // Add an event listener to the input field
        phoneInput.addEventListener('input', function() {
            // Remove any non-numeric characters from the input
            this.value = this.value.replace(/[^0-9+]/g, '');

            // Optionally, you can set a maximum length for the phone number
            const maxLength = 15; // Change this to your desired maximum length
            if (this.value.length > maxLength) {
                this.value = this.value.slice(0, maxLength);
            }
        });
    </script>


</body>

</html>