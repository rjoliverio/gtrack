<?php

namespace App\Http\Controllers\Guest;
use PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
class ContactController extends Controller
{
    public function index()
    {
        return view('guest.contact');
    }
    public function send(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $sender='simscodemembership@gmail.com';
        $recipient='gtrack32@gmail.com';
        $mail = new PHPMailer\PHPMailer();
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $sender;                     // Your gmail address
        $mail->Password   = '@Simscode';                               // Your gmail password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom($sender, 'GTrack');
        $mail->addAddress($recipient);
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $request->subject;
        $mail->Body    = $request->message;
    
        $mail->send();
        return back()->with('success','Thanks for contacting us!');
    }
}
