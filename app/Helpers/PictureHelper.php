<?php

namespace App\Helpers;

use Intervention\Image\ImageManagerStatic as InterImage;
use Illuminate\Support\Facades\File as File;

class	PictureHelper	{
		
		/**
		 * Store original size picture in 'public/images' and thumbnail copy in 'public/image/thumbnail'
		 * 
		 * @param type $picture
		 * @param type $pictureData
		 * @return string
		 */
		public static function uploadPictureInPublicFolder($picture, $pictureData) {
				$publicPathPictures = public_path('/images');
				$publicPathPicturesThumb = public_path('/images/thumbnail');
				
				if (!file_exists($publicPathPictures)) {
						mkdir($publicPathPictures, 0777, true);
				}
				if (!file_exists($publicPathPicturesThumb)) {
						mkdir($publicPathPicturesThumb, 0777, true);
				}
				
				$fileName = $picture->id. '.'. $pictureData->extension();
				$saveImg = InterImage::make($pictureData);
				$saveImg->save($publicPathPictures.'/'.$fileName);

				$thumbnailPicture = InterImage::make($pictureData);
				$thumbnailPicture->resize(150, 150);
				$thumbnailPicture->save($publicPathPicturesThumb.'/'.$fileName);
				
				return $fileName;
		}
		
		/**
		 * Delete original size picture from public/images and thumbnail copy from public/images/thumbnail
		 * 
		 * @param type $picture
		 */
		public static function removePictureFromPublicFolder($picture) {
				$fileThumb = public_path('/images/thumbnail/').$picture->full_name;
				if (File::exists($fileThumb)) {
						File::delete($fileThumb);
				}
				
				$file = public_path('/images/').$picture->full_name;
				if (File::exists($file)) {
						File::delete($file);
				}
		}
}
