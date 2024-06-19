<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recaptcha;
use App\Mail\ThankYouMail;
use Mail;

class mailController extends Controller
{
    function mail(Request $request){
        $recaptcha = recaptcha::find(1);
        $data = $request->all();

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'countrycode' => 'required',
            'phone' => 'required|numeric',
            'comment' => 'required',
           
        ];

        $customMessages = [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email',
            'countrycode.required' => 'Country Code is required',
            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Phone number have allowed only numeric characters',
            'comment.required' => 'Please enter your query',
            
        ];

        $this->validate($request,$rules,$customMessages);

        $email = $data['email'];
        $name = $data['name'];
        $countrycode = $data['countrycode'];
        $phone = $data['phone'];
        $comment = $data['comment'];
        $Link = str_replace("http:", "https:", $data['pagelink']);
        $turnstile_response = $data['cf-turnstile-response'];

        Mail::to($request->email)->send(new ThankYouMail($data));

        if (!empty($turnstile_response)) {

            $turnstile_secret     = $recaptcha['secret_key'];
            $url                  = "https://challenges.cloudflare.com/turnstile/v0/siteverify";
            $post_fields          = "secret=$turnstile_secret&response=$turnstile_response";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
            $response = curl_exec($ch);
            curl_close($ch);

            $response_data = json_decode($response);
            if ($response_data->success != 1) {
                return response()->json(['error'=>'CAPTCHA validation failed. Please try again.']);
            }else{
                // Send the thank you email
                Mail::to($request->email)->send(new ThankYouMail($data));
            } 
            // else {
            //     $from_eml = 'info@tech2globe.com';
            //     $static = 'Tech2globe.com';
            //     $your_email = "info@tech2globe.com";
            //     // $your_email = "yogesh.tech2globe@gmail.com";
            //     // $your_email = "navneet.baid@tech2globe.in";

            //     $email_subject = "Enquiry on Tech2globe.com";
            //     $header = "From: $static <" . $from_eml . ">\r\n";
            //     $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            //     $headera = "From: $name <" . $email . ">\r\n";
            //     $headera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            //     // Create the email message
            //     $message = '
            //     <html>
            //     <head>
            //         <title>Enquiry from Tech2globe</title>
            //     </head>
            //     <body style="font-family:Arial, Helvetica, sans-serif;">
            //         <p>Name: ' . $name . '</p>
            //         <p>Countrycode: ' . $countrycode . '</p>
            //         <p>Phone: ' . $phone . '</p>
            //         <p>Mail ID: ' . $email . '</p>
            //         <p>Comment: ' . $comment . '</p>
            //         <table>
            //             <tr><td style=" font-size:14px; font-family:Arial, Helvetica, sans-serif;">Send from Page: ' . $Link . '<br><br></td></tr>
            //         </table>
            //     </body>
            //     </html>';

            //     $email_content1 = "Thank you for your enquiry. Our team will get back to you within 1 business day.";

            //     // Send emails and handle errors
            //     if (@mail($your_email, $email_subject, $message, $headera) && @mail($email, "Thank you - Enquiry Received On Tech2globe", $email_content1, $header)) {
            //         return response()->json(['message'=>'Form Submitted']);
            //     } else {
            //         return response()->json(['error'=>'Something went wrong']);
            //     }
            // }
        }
    }
}
