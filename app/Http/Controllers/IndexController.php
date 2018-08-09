<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\topics;

class IndexController extends Controller
{
    public function index(){

    	$questions = Question::get();
    	
    	$topics = topics::get();

    	return view('welcome',compact('questions','topics'));
    }
}
