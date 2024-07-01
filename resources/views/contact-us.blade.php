
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
        }

        p,
        ul,
        ol,
        li,
        a,
        blockquote,
        figcaption,
        figure,
        span,
        div,
        samp,
        h4,
        h5,
        h6,
        aside,
        strong,
        mark {
            font-family: 'Poppins', sans-serif;
            /* font-size: 16px;
        line-height: 1.8; */
        }

        a,
        a:hover,
        a:focus {
            outline: none;
            transition: all linear .4s;
            -webkit-transition: all linear .4s;
            -moz-transition: all linear .4s;
        }

        .contact-page.feature-banner2 {
            width: 100%;
            height: auto;
            display: inline-block;
            background-image: url('images/new/contact/contact-us-feature-banner.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom center;
            background-blend-mode: multiply;
            background-color: rgba(20, 33, 42, 0.75);
            padding-block: 50px;
        }

        .hv-text:hover {
            color: #c8070bd4 !important;
        }

        .get-touch-input {
            margin-bottom: 20px;
            float: left;
        }

        .feature-banner2 h1 {
            color: #ffffff;
            position: relative;
            margin-bottom: 0px;
            font-family: 'Poppins', sans-serif;
            text-align: left;
        }

        .feature-banner2 h1::after {
            border-bottom: none;
            bottom: 0;
        }

        .contact-page.feature-banner2 ol li p,
        .contact-page.feature-banner2 ol li a,
        .contact-page.feature-banner2 ol li strong {
            color: #ffffff;
            display: block;
        }

        .feature-banner2-caption {
            height: 580px;
            display: flex;
            flex-flow: column;
            align-items: flex-start;
            justify-content: center;
        }

        .feature-banner2 ol {
            padding-left: 0px;
        }

        .feature-banner2 ol li {
            padding-block: 1em;
            list-style-type: none;
        }

        .contact-page.feature-banner2 #contact-us {
            background-color: #ffffff;
            display: inline-block;
            padding: 30px 30px;
            margin-block: 30px;
            width: 100%;
        }

        .contact-page.feature-banner2 #contact-us .get-touch-input {
            width: 100%;
        }

        .contact-page.feature-banner2 #contact-us h3 {
            font-size: 32px;
            font-weight: 400;
            color: #14212a;
        }

        .world-map-addresses {
            width: 100%;
            height: auto;
            display: inline-block;
            position: relative;
            padding-block: 50px;
        }

        .world-map-addresses ol {
            display: flex;
            gap: 10px;
            justify-content: space-between;
            list-style: none;
        }

        .world-map-addresses ol li {
            width: 23%;
            text-align: center;
        }

        .world-map-addresses ol li img {
            display: block;
            margin: 0px auto;
            padding-bottom: 15px;
        }

        .world-map-addresses ol li strong {
            font-size: 20px;
            font-weight: 500;
        }

        .world-map-addresses ol li p {
            color: #667085;
            text-align: center;
            font-size: 14px;
            letter-spacing: -0.5px;
            padding-bottom: 8px;
            min-height: 90px;
        }

        .world-map-addresses ol li small {
            line-height: 24px;
            font-weight: 500;
            color: #C7010C;
        }

        .world-map-addresses ol li iframe {
            height: 250px;
            width: 100%;
            border: 2px solid rgba(0, 0, 0, .2);
            border-radius: 15px;
            box-shadow: 0px 35px 70px rgba(0, 0, 0, .08);
            margin-top: 30px;
        }

        .world-map-locations {
            width: 100%;
            height: auto;
            display: inline-block;
            position: relative;
            background-color: #ffffff;
        }

        .world-map-locations figure {
            text-align: center;
        }

        .world-map-locations h3 {
            font-size: 32px;
            font-weight: 400;
            text-align: center;
            display: block;
            margin-bottom: 0px;
            padding-bottom: 32px;
            padding-top: 100px;
        }

        .map-marker-locations1,
        .map-marker-locations2,
        .map-marker-locations3,
        .map-marker-locations4 {
            display: none;
        }

        .locationMarker {
            margin: 0px;
            width: 8px;
            height: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #fff;
            text-align: center;
            background: rgba(199, 1, 12, 1);
            border-radius: 100%;
            animation: shadow-pulse 1s infinite;
            border: none;
            position: relative;
            padding: 6px;
        }

        .locationMarker::before {
            position: absolute;
            content: '';
            width: 16px;
            height: 16px;
            left: 0;
            top: 0;
            background-color: rgba(199, 1, 12, 0.30);
            border-radius: 100px;
        }

        .world-map-locations figure {
            position: relative;
        }

        .world-map-locations ol li {
            display: inline-block;
            padding: 0;
            margin: 0px;
            line-height: 0px;
        }

        .world-map-locations ol li:first-child {
            top: 50%;
            position: absolute;
            left: 50%;
            margin-left: 190px;
            margin-top: -30px;
        }

        .world-map-locations ol li:first-child .locationMarker::before {
            position: absolute;
            content: '';
            width: 22px;
            height: 22px;
            left: -5px;
            top: -5px;
            background-color: rgba(199, 1, 12, 0.30);
            border-radius: 100px;
        }

        .world-map-locations ol li:nth-child(2) {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -225px;
            margin-top: -60px;
        }

        .world-map-locations ol li:nth-child(2) .locationMarker::before {
            position: absolute;
            content: '';
            width: 22px;
            height: 22px;
            left: -5px;
            top: -5px;
            background-color: rgba(199, 1, 12, 0.30);
            border-radius: 100px;
        }

        .world-map-locations ol li:nth-child(3) {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -265px;
            margin-top: -110px;
        }

        .world-map-locations ol li:nth-child(3) .locationMarker::before {
            position: absolute;
            content: '';
            width: 22px;
            height: 22px;
            left: -5px;
            top: -5px;
            background-color: rgba(199, 1, 12, 0.30);
            border-radius: 100px;
        }

        .world-map-locations ol li:last-child {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -375px;
            margin-top: -100px;
        }

        .world-map-locations ol li:last-child .locationMarker::before {
            position: absolute;
            content: '';
            width: 22px;
            height: 22px;
            left: -5px;
            top: -5px;
            background-color: rgba(199, 1, 12, 0.30);
            border-radius: 100px;
        }


        .map-marker-locations1 {
            position: absolute;
            background-color: #14212a;
            padding: 10px;
            color: #ffffff;
            min-width: 200px;
            border-radius: 10px;
            top: 0;
            left: 0;
            margin-top: -160px;
            margin-left: -100px;
            z-index: 99;
        }

        .map-marker-locations1::after {
            position: absolute;
            content: '';
            width: 0;
            height: 0;
            border-top: 15px solid #14212a;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            left: 50%;
            margin-left: -10px;
            top: 100%;
        }

        .map-marker-locations2 {
            position: absolute;
            background-color: #14212a;
            padding: 10px;
            color: #ffffff;
            min-width: 200px;
            border-radius: 10px;
            top: 0;
            left: 0;
            margin-top: -135px;
            margin-left: -100px;
            z-index: 99;
        }

        .map-marker-locations2::after {
            position: absolute;
            content: '';
            width: 0;
            height: 0;
            border-top: 15px solid #14212a;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            left: 50%;
            margin-left: -10px;
            top: 100%;
        }

        .map-marker-locations3 {
            position: absolute;
            background-color: #14212a;
            padding: 10px;
            color: #ffffff;
            min-width: 200px;
            border-radius: 10px;
            top: 0;
            left: 0;
            margin-top: -135px;
            margin-left: -100px;
            z-index: 99;
        }

        .map-marker-locations3::after {
            position: absolute;
            content: '';
            width: 0;
            height: 0;
            border-top: 15px solid #14212a;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            left: 50%;
            margin-left: -10px;
            top: 100%;
        }

        .map-marker-locations4 {
            position: absolute;
            background-color: #14212a;
            padding: 10px;
            color: #ffffff;
            min-width: 200px;
            border-radius: 10px;
            top: 0;
            left: 0;
            margin-top: -115px;
            margin-left: -100px;
            z-index: 99;
        }

        .map-marker-locations4::after {
            position: absolute;
            content: '';
            width: 0;
            height: 0;
            border-top: 15px solid #14212a;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            left: 50%;
            margin-left: -10px;
            top: 100%;
        }

        .map-marker-locations1 p,
        .map-marker-locations2 p,
        .map-marker-locations3 p,
        .map-marker-locations4 p {
            font-size: 12px;
            color: #ffffff;
            text-align: center;
        }

        span.closeBtn {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #c7010d;
            width: 15px;
            height: 15px;
            font-size: 10px;
            z-index: 11;
            cursor: pointer;
            border-top-right-radius: 8px;
        }

        .myLocoMap .location {
            line-height: 1.8;
        }

        @keyframes shadow-pulse {
            0% {
                box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.2);
            }

            100% {
                box-shadow: 0 0 0 35px rgba(0, 0, 0, 0);
            }
        }

        @keyframes shadow-pulse-big {
            0% {
                box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.1);
            }

            100% {
                box-shadow: 0 0 0 50px rgba(199, 1, 12, 0.40);
            }
        }

        #quiz {
            max-width: 25%;
        }

        .forSum {
            display: flex;
            justify-content: space-between;
        }


        @media (max-width: 1199px) {
            .world-map-locations {
                transform: scale(0.85, 0.85);
            }

            .world-map-addresses ol {
                flex-flow: wrap;
            }

            .world-map-addresses ol li {
                width: 48%;
            }

            .world-map-addresses ol li iframe {
                margin-top: 30px;
                margin-bottom: 100px;
            }

            .feature-banner2-caption {
                height: auto;
            }

            .world-map-addresses ol li p {
                min-height: 110px;
            }

            .world-map-locations ol li:first-child {
                margin-left: 195px;
                margin-top: -15px;
            }

            .world-map-locations ol li:nth-child(2) {
                margin-left: -215px;
                margin-top: -75px;
            }

            .world-map-locations ol li:nth-child(3) {
                margin-left: -260px;
                margin-top: -115px;
            }

            .world-map-locations ol li:last-child {
                margin-left: -375px;
                margin-top: -100px;
            }

            #quiz {
                margin-top: 25px;
            }
        }

        /*1199*/

        @media (max-width: 767px) {
            .contact-page.feature-banner2 #contact-us {
                padding: 10px;
            }

            .world-map-locations ol li:first-child {
                margin-left: 60px;
                margin-top: -15px;
            }

            .world-map-locations ol li:nth-child(2) {
                margin-left: -75px;
                margin-top: -30px;
            }

            .world-map-locations ol li:nth-child(3) {
                margin-left: -100px;
                margin-top: -45px;
            }

            .world-map-locations ol li:last-child {
                margin-left: -125px;
                margin-top: -40px;
            }

            .world-map-addresses ol li {
                width: 100%;
            }

            .world-map-addresses ol li p {
                min-height: auto !important;
            }

            .forSum {
                flex-flow: column;
            }

            #quiz {
                margin-top: 8px;
                max-width: 100%;
            }
        }

        /*767*/
    </style>

    <?php
    // if user from the share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $IP_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    //if user is from the proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $IP_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //if user is from the remote address
    else {
        $IP_address = $_SERVER['REMOTE_ADDR'];
    }
    ?>

    <div class="contact-page feature-banner2">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-lg-11 m-auto col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="feature-banner2-caption">
                                <h1>Contact Us</h1>
                                <ol>
                                    <li>
                                        <p>Drop us your requirements. <br />Our team will get back to you within 1 business
                                            day.</p>
                                    </li><!-- list -->

                                    <li>
                                        <strong>Ask your query:</strong>
                                        <a href="mailto:info@tech2globe.com"><u>Info@tech2globe.com</u></a>
                                    </li><!-- list -->



                                    <li>
                                        <strong>Career with us:</strong>
                                        <p>Helping build dream <a href="/career"
                                                class="text-white d-inline-block text-decoration-underline">careers</a></p>
                                    </li><!-- list -->

                                    <li class="pt-0">
                                        <strong>Contact HR Department:</strong>
                                        <a href="tel:+91-9871102889"><u>+91-9871102889</u></a>
                                        <a href="mailto:career@tech2globe.com"><u>career@tech2globe.com</u></a>
                                    </li><!-- list -->
                                </ol>
                            </div><!-- d flex -->
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                            <!--<?php-->
                                          <!--if (isset($_POST['submit'])) {-->
                            
                                          <!--  // Replace these with your own keys-->
                                          <!--  $recaptchaSecretKey = '6LcgtGUoAAAAAGIub-nETdVlwGJi9m14cPx0_-Az';-->
                                          <!--  $baseurl = $_SERVER['HTTP_HOST'];-->
                            
                                          <!--  $name = $_REQUEST['name'];-->
                                          <!--  $email = $_REQUEST['mailid'];-->
                                          <!--  $phone = $_REQUEST['phone'];-->
                                          <!--  $areaCode = $_REQUEST['countrycode'];-->
                                          <!--  $description = $_REQUEST['comment'];-->
                                          <!--  $IP_address = $_REQUEST['IP_address'];-->
                                          <!--  $country = $_REQUEST['country'];-->
                                          <!--  $region = $_REQUEST['region'];-->
                                          <!--  $city = $_REQUEST['city'];-->
                            
                                          <!--  //$Link = $con->real_escape_string($_REQUEST['pagelinks']);-->
                                          <!--  $Link = $_REQUEST['pagelinks'];-->
                            
                                          <!--  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {-->
                                          <!--    // Handle invalid email-->
                                          <!--    echo json_encode(array('error' => 'Please enter a valid email.'));-->
                                          <!--    exit();-->
                                          <!--  }-->
                            
                                          <!--  // Validate Name-->
                                          <!--  if (empty($name)) {-->
                                          <!--    echo '<script>alert("Name is required.");location.href="' . $Link . '";</script>';-->
                                          <!--    exit();-->
                                          <!--  } else {-->
                                          <!--    // Check if name only contains letters and whitespace-->
                                          <!--    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {-->
                                          <!--      echo '<script>alert("Only letters and white space allowed in Name Field.");location.href="' . $Link . '";</script>';-->
                                          <!--      exit();-->
                                          <!--    }-->
                                          <!--  }-->
                            
                                          <!--  // Validate Email-->
                                          <!--  if (empty($email)) {-->
                                          <!--    echo '<script>alert("Email is required.");location.href="' . $Link . '";</script>';-->
                                          <!--    exit();-->
                                          <!--  } else {-->
                                          <!--    // Check if email address is well-formed-->
                                          <!--    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {-->
                                          <!--      echo '<script>alert("Email is Not in correct format.");location.href="' . $Link . '";</script>';-->
                                          <!--      exit();-->
                                          <!--    }-->
                                          <!--  }-->
                            
                                          <!--  // Validate Phone-->
                                          <!--  if (empty($phone)) {-->
                                          <!--    echo '<script>alert("Phone number is Required.");location.href="' . $Link . '";</script>';-->
                                          <!--    exit();-->
                                          <!--  } else {-->
                                          <!--    // Check if phone only contains numbers and dashes-->
                                          <!--    if (!preg_match("/^[0-9-]*$/", $phone)) {-->
                                          <!--      echo '<script>alert("Only numbers and Dashes allowed in Phone Number.");location.href="' . $Link . '";</script>';-->
                                          <!--      exit();-->
                                          <!--    } else if (strlen($phone) > 11) {-->
                                          <!--      echo '<script>alert("Phone number should be Less than 11 Characters.");location.href="' . $Link . '";</script>';-->
                                          <!--      exit();-->
                                          <!--    } else if (strlen($phone) < 10) {-->
                                          <!--      echo '<script>alert("Phone number should be Greater than 9 Characters.");location.href="' . $Link . '";</script>';-->
                                          <!--      exit();-->
                                          <!--    }-->
                                          <!--  }-->
                            
                                          <!--  // Validate Country Code-->
                                          <!--  if (empty($areaCode)) {-->
                                          <!--    echo '<script>alert("Country Code is Required.");location.href="' . $Link . '";</script>';-->
                                          <!--    exit();-->
                                          <!--  }-->
                            
                                          <!--  // Validate comment-->
                                          <!--  if (empty($description)) {-->
                                          <!--    echo '<script>alert("Please write your Message.");location.href="' . $Link . '";</script>';-->
                                          <!--    exit();-->
                                          <!--  }-->
                            
                                          <!--  if (isset($_POST['cf-turnstile-response'])) {-->
                            
                            
                                          <!--    $turnstile_response = $_POST['cf-turnstile-response'];-->
                                          <!--    if (!$turnstile_response) {-->
                                          <!--      echo '<script>alert("Please check the captcha");location.href="' . $Link . '";</script>';-->
                                          <!--    } else {-->
                                          <!--      $turnstile_secret     = '0x4AAAAAAAZkfus76T5O0CGWCui3vn4frdA';-->
                                          <!--      $url                  = "https://challenges.cloudflare.com/turnstile/v0/siteverify";-->
                                          <!--      $post_fields          = "secret=$turnstile_secret&response=$turnstile_response";-->
                                          <!--      $ch = curl_init($url);-->
                                          <!--      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);-->
                                          <!--      curl_setopt($ch, CURLOPT_POST, true);-->
                                          <!--      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);-->
                                          <!--      $response = curl_exec($ch);-->
                                          <!--      curl_close($ch);-->
                            
                                          <!--      $response_data = json_decode($response);-->
                                          <!--      if ($response_data->success != 1) {-->
                                          <!--        echo '<script>alert("CAPTCHA validation failed. Please try again.");location.href="' . $Link . '";</script>';-->
                                          <!--      } else {-->
                            
                            
                            
                                          <!--        // Define email headers-->
                                          <!--        $from_email = 'info@tech2globe.com';-->
                                          <!--        $static = 'Tech2globe.com';-->
                                          <!--        $your_email = 'info@tech2globe.com';-->
                                          <!--        $email_subject = "Enquiry on Tech2globe.com";-->
                            
                                          <!--        $header = "From: $static <" . $from_eml . ">\r\n";-->
                                          <!--        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";-->
                            
                                          <!--        $headera = "From: $name <" . $email . ">\r\n";-->
                                          <!--        $headera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";-->
                            
                                          <!--        $email_content1 = "Thank you for your enquiry. Our team will get back to you within 1 business day.";-->
                            
                                          <!--        $message = "-->
                                          <!--            <html>-->
                                          <!--            <head>-->
                                          <!--              <title>Enquiry from Tech2globe</title>-->
                                          <!--            </head>-->
                                          <!--            <body>-->
                                          <!--              <p>Name: $name</p>-->
                                          <!--              <p>Country Code: $areaCode</p>-->
                                          <!--              <p>Phone: $phone</p>-->
                                          <!--              <p>Mail ID: $email</p>-->
                                          <!--              <p>Comment: $description</p>-->
                                          <!--              <p>Sender IP Address: $IP_address</p>-->
                                          <!--              <p>Sender Country: $country</p>-->
                                          <!--              <p>Sender Region: $region</p>-->
                                          <!--              <p>Sender City: $city</p>-->
                                          <!--              <table>-->
                                          <!--                <tr><td style='font-size:14px; font-family:Arial, Helvetica, sans-serif;'>Send from Page: $Link<br><br></td></tr>-->
                                          <!--              </table>-->
                                          <!--            </body>-->
                                          <!--            </html>";-->
                            
                            
                                          <!--        // Attempt to send email-->
                                          <!--        if (@mail($your_email, $email_subject, $message, $headera) && @mail($email, "Thank you - Enquiry Received On Tech2globe", $email_content1, $header)) {-->
                                          <!--          // Successful email sending-->
                                          <!--          echo '<script>location.href="https://' . $baseurl . '/thank-you";</script>';-->
                                          <!--        } else {-->
                                          <!--          echo '<div class="alert alert-warning alert-dismissible">-->
                                          <!--              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                                          <!--              <strong>Sorry!</strong> Message could not sent-->
                                          <!--              </div>';-->
                                          <!--          exit();-->
                                          <!--        }-->
                                          <!--      }-->
                                          <!--    }-->
                                          <!--  }-->
                                          <!--}-->
                                          <!--?> ?>-->

                            <form id='contact-us'>

                                <h3>Get in touch</h3>
                                <table width="100%" cellpadding="0" cellspacing="0" border="0" align="left">
                                    <tbody>
                                        <tr>
                                            <td valign="middle" class="get-touch-input">
                                              <input type="text" class="form-control" placeholder="Your Name" name="name" required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" class="get-touch-input">
                                              <input name="pagelink" type="hidden" />
                                              <input type="email" class="form-control" placeholder="Your Email ID" name="mailid" required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="get-touch-input" required>
                                                <select class="form-control input-4 coverCountryCode" name="countrycode" required>

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" class="get-touch-input">
                                                <input type="text" class="form-control" placeholder="Your Phone Number" name="phone" minlength="10" maxlength="13" required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" class="get-touch-input">
                                                <textarea placeholder="Enter Your Text" name="comment" id="" class="form-control" required></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cf-turnstile" data-sitekey="0x4AAAAAAAZkfkKo2ooZlFK4" data-theme="light"></td>
                                        </tr>
                                        <tr>
                                            <td class="get-touch-input mt-3">
                                              <button type="submit" name="submit" class="btn btn-danger">Send Query </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>

        <div class="world-map-locations">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col">
                        <h3>Our Global Branches</h3>

                        <figure>
                            <img src="images/new/contact/contact-us-world-wide-locations.webp" alt="">

                            <ol>
                                <li class="myLocoMap">
                                    <button class="contact-map-marker1 locationMarker" target="1">

                                    </button>

                                    <div class="map-marker-locations1 location">
                                        <span class="closeBtn">&#10005;</span>
                                        <strong>Tech2Globe INDIA</strong>
                                        <p>Location - 606, 6th Floor, Pearls Omaxe Tower-1, Netaji Subhash Place, New
                                            Delhi-110034</p>
                                    </div>
                                </li><!-- list -->

                                <li class="myLocoMap">
                                    <button class="contact-map-marker2 locationMarker" target="2">

                                    </button>

                                    <div class="map-marker-locations2 location">
                                        <span class="closeBtn">&#10005;</span>
                                        <strong>Tech2Globe USA</strong>
                                        <p>Location - 1538, Old Country Road, Plainview, New York, United State - 11803</p>
                                    </div>
                                </li><!-- list -->

                                <li class="myLocoMap">
                                    <button class="contact-map-marker3 locationMarker" target="3">

                                    </button>

                                    <div class="map-marker-locations3 location">
                                        <span class="closeBtn">&#10005;</span>
                                        <strong>Tech2Globe CANADA</strong>
                                        <p>Location - 975 Mid-Way Blvd UNIT 12 Mississauga, ON L5T 2C6, Canada</p>
                                    </div>
                                </li><!-- list -->

                                <li class="myLocoMap">
                                    <button class="contact-map-marker4 locationMarker" target="4">

                                    </button>

                                    <div class="map-marker-locations4 location">
                                        <span class="closeBtn">&#10005;</span>
                                        <strong>Tech2Globe CANADA</strong>
                                        <p>Location - 3836 Keeha Dr Port Alberni, BC, V9Y8C8, Canada</p>
                                    </div>
                                </li><!-- list -->
                            </ol>
                        </figure>
                    </div>
                </div>
            </div><!-- container -->
        </div><!-- world map location -->

        @include('include.company-branch')
    </main>


    <script>
        $(() => {
            $('.locationMarker').click(function() {
                const target = $(this).attr('target');
                $('.location').not('.map-marker-locations' + target).hide();
                $('.map-marker-locations' + target).toggle();
            })

            $('.closeBtn').click(function() {
                $('.location').hide();
            })
        })

        /*get my location on map end here*/

        $(".optimizationChecked").click(function() {
            $(".monthly-budget-list-dropdown").toggle();
        });

        $(".webDesignChecked").click(function() {
            $(".monthly-budget-list-dropdown2").toggle();
        });

        $(".photographyChecked").click(function() {
            $(".monthly-budget-list-dropdown3").toggle();
        });
    </script>
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection