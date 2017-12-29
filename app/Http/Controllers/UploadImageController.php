<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use Illuminate\Support\Facades\DB;
use App\UploadExample;

class UploadImageController extends Controller
{
    public function changePic(Request $request)
  {

    $destinationPath = base_path().'/public/i/users/';
    // $destinationPath = "http://192.168.0.32:8000".'/public/i/users/';
		// $name =$request->name;
		// $my_extension = $request->extension;
		// $my_image=$_FILES['image']['tmp_name'];
		// $file_path =$destinationPath.$name.$my_extension;	
	 //  file_put_contents($file_path,base64_decode($my_image));
        $name =$request->name;
		$fileinfo =pathinfo($_FILES['image']['name']);
		$extension = $fileinfo['extension'];
		$file_path =$destinationPath. $name.'.'.$extension;
		move_uploaded_file($_FILES['image']['tmp_name'], $file_path);

		$user = UploadExample::create([
        'name'=>$name,
        'image'=>$file_path
         ]);



  }


}
