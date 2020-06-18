<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
	{
		$uploads = \Auth::user()->uploads;
		//dd($uploads);
		return view('admin.index', ['uploads' => $uploads]);
	}

	public function save(Request $request)
	{
        $title = $request->input('title');
        if($request->hasFile('file')) {
        	$file = $request->file('file');
        	$fileName = $file->getFilename();
        	$path = 'uploads';

        	//save in disk
			\Storage::disk('uploads')->putFileAs($path, $file, $file->getClientOriginalName());

			//save in db
			$created = Upload::create([
				'user_id'  => \Auth::id(),
				'title'    => $title,
				'file'     =>  $file->getClientOriginalName()
			]);

			if($created) {
				 return back()->with('success', 'Success uploaded');
			}

			return back()->with('error', 'Can\'t upload file');
		}

        return back();
	}
}
