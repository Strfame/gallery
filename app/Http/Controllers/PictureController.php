<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use App\Helpers\PictureHelper;

class PictureController extends Controller
{
    /**
     * Display a listing of the Pictures.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
			 $title = $request->get('searchTitle');
				
        $pictures = Picture::sortable()
																->where('title', 'LIKE', '%'.$title.'%')																
																->paginate(5);
								
			  return view('pictures.index', ['pictures' => $pictures, 'searchTitle' => $title]);				
    }


    /**
     * Store a newly created Picture in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {					
				$request->validate([
								'title' => 'required|min:3|max:100',
								'description' => 'required|max:500',
								'img_source' => 'required|image|mimes:jpeg,gif,png|max:1024'
				]);
						
				$imageData = $request->file('img_source');
				$image = Picture::create($request->toArray());
				
				if($imageData) {
						$fileName = PictureHelper::uploadPictureInPublicFolder($image, $imageData);

						// Update the image record in DB with full name (example: 1.png)
						$image->full_name = $fileName;
						$image->save();
				}
				
				return redirect()
            ->back()
            ->with('success', 'The picture was saved.');
    }

    /**
		* 
		* Display the specified Picture.
		*  
		* @param Picture $picture
		* @return type
		*/
    public function show(Picture $picture)
    {
        return view('pictures.show', compact('picture'));
    }

    /**
		* 
		*  Remove the Picture.
		* 
		* @param Picture $picture
		* @return type
		*/
    public function destroy(Picture $picture)
    {
         $picture->delete();
				
				PictureHelper::removePictureFromPublicFolder($picture);
				
				return redirect()->back()->with('success', 'The picture was deleted.');
    }
}
