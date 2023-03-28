<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from umkmlevelup.id',
            'body' => 'Harap isi kode otp berikut ini.'
        ];
         
        Mail::to('arifin.officialwork@gmail.com')->send(new DemoMail($mailData));

        return redirect('verifikasiOtp');
           
        // dd("Email is sent successfully.");
    }
}