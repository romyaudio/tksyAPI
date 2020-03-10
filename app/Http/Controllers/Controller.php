<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifyEmail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function email(){
    	$data = array('name'=>'corsu');
      return Mail::send('mail.verifyEmail',$data, function($message){
      	$message->from('no-reply@ticketssy.com','romy');
      	$message->to('romyaudio@gmail.com', 'romyaudio')->subject('test');
      });
      return "se envio";
    }
}
