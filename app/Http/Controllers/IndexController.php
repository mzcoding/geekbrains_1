<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
	{
		 $comment = 'Это коммент<br>';
		 return view('index', [
		 	'comment' => $comment
		 ]);
	}
	public function experience()
	{
		return view('experience');
	}
	public function education()
	{
		return view('education');
	}
}
