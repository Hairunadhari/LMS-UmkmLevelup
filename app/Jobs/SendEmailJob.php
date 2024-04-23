<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Mail;
use DB;
use App\Mail\DemoMail;
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mailData;

    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function handle()
    {
        Mail::to($this->mailData['email'])->send(new DemoMail($this->mailData));
            DB::table('users')->where('email',$this->mailData['email'])->update([
                'send_email' => 1
            ]);
        // try {
        //     DB::beginTransaction();
            
        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollback();
        // }
    }
}
