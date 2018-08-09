<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\topics;
class UserFollowNotificationController extends Controller
{
    
    public function index(){


		$topics = topics::get();    	 
    	return view('notification.index',compact('topics'));
    }
}
