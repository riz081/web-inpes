<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Mail\SendMail;
use App\Mail\SendMessageToEndUser;
use Mail;

class ContactController extends Controller
{
    public function sendEmail($lang)
    {
        $view = ($lang == 'en') ? 'pages.abouteng' : 'pages.aboutind';

        return view($view);
    }
    public function maildata(Request $request)
    {
        $name    = $request->name;
        $email   = $request->email;
        $sub     = $request->sub;
        $mess    = $request->mess;
        $send_mail = "cs@inpexcellentservice.com";
        Mail::to($send_mail)->send(new SendMail($name, $email, $sub, $mess));

        $senderMessage = "thanks for your message , we will reply you in later";
        Mail::to( $email)->send(new
           SendMessageToEndUser($name,$senderMessage));

        // Simpan informasi bahasa dalam sesi
    $lang = $request->input('lang');
    $request->session()->put('lang', $lang);

    // Pesan sukses yang sesuai dengan bahasa
    $successMessage = ($lang == 'en') ? 'Mail Send Successfully' : 'Pesan Anda berhasil dikirim';

    // Redirect ke halaman yang sesuai setelah pengiriman formulir
    return redirect()->route('about', ['lang' => $lang])->with('success', $successMessage);
    }
}
