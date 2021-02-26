<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($outSideParams)
    {
        $this->myOutSideParams=$outSideParams;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        if($this->myOutSideParams['type']=='createArticle'){
            return $this->subject('樂寫通知信')->view('mail.createArticleMail')->with(['params'=>$this->myOutSideParams]);
        }else if($this->myOutSideParams['type']=='forgotPWD'){
            return $this->subject('樂寫通知信')->view('mail.sendMail')->with(['params'=>$this->myOutSideParams]);
        }else if($this->myOutSideParams['type']=='teacherFinish'){
            return $this->subject('樂寫通知信')->view('mail.teacherFinish')->with(['params'=>$this->myOutSideParams]);
        }else if($this->myOutSideParams['type']=='registerMail'){
            return $this->subject('樂寫通知信')->view('mail.registerMail')->with(['params'=>$this->myOutSideParams]);
        }else if($this->myOutSideParams['type']=='getNoticeRegisterSuccess'){
            return $this->subject('樂寫通知信')->view('mail.userRegisterSuccess')->with(['params'=>$this->myOutSideParams]);
        }
        
        
    }
}
