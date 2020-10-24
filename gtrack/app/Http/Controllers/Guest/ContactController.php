<?php

namespace App\Http\Controllers\Guest;
use PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
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
        $recipient=$request->email;
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
        $mail->setFrom($sender, 'GTrack Compostela');
        $mail->addAddress($recipient);
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $request->subject;
        $mail->Body    = $request->message;
    
        $mail->send();

        // $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/mapsample-51a36-firebase-adminsdk-5c38e-cf6600b7d0.json');

        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'\mapsample-51a36-firebase-adminsdk-5c38e-cf6600b7d0.json');
        // $data = [
        //     'email' => $request->email,
        //     'subject' => $request->subject
        // ];
        $database = $firebase->createDatabase();
        $ref = $database->getReference("messages");
        $key=$ref->push()->getKey();
        $datetime=\Carbon\Carbon::now()->toDateTimeString();
        $ref->getChild($key)->set([
            'email' => $request->email,
            'subject' => $request->subject,
            'created_at' => \Carbon\Carbon::parse($datetime)->format('g:i A')." ".\Carbon\Carbon::parse($datetime)->format('d F Y'),
            'seen'=> 0
        ]);
        return back()->with('success','Thanks for contacting us!');
    }
}
