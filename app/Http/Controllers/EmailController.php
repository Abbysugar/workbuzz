<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
    	$title = $request->input('title');
      $content = $request->input('content');

      Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
      {

          $message->from('bukksbisuga@gmail.com', 'Bisuga Olubukola');

          $message->to('olubukolabisuga@gmail.com');

      });

      return response()->json(['message' => 'Request completed']);
      }
}
