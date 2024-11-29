<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->recaptcha) {
            $site_recaptcha = env('RECAPTCHA_SECRET');
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt(
                $ch,
                CURLOPT_POSTFIELDS,
                'secret=' . $site_recaptcha . '&remoteip=' . $_SERVER['REMOTE_ADDR'] . '&response=' . $request->recaptcha
            );

            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);

            curl_close($ch);

            $recaptcha = json_decode($server_output);

            if (!isset($recaptcha->score)) {
                return redirect()->back()->with('error', __('Message failed to send!'));
            }

            if (isset($recaptcha->score) && $recaptcha->score >= 0.1) {
                $to = 'info@' . strtolower(env('APP_NAME'));
                $subject = 'Contact Form from website';
                $message = $request->message;
                $headers = 'From: ' . $request->email . "\r\n" .
                    'Reply-To: ' . $request->email . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);
            } else {
                return redirect()->back()->with('error', __('Message failed to send!'));
            }

            return redirect()->back()->with('success', __('Message sent successfully!'));
        } else {
            return redirect()->back()->with('error', __('Message failed to send!'));
        }
    }
}
