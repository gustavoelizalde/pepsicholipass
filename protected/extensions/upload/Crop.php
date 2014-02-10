<?php

class Crop 
{

/**
 * ******************
 *	Makes the thumb from the given selection of the oringal image
 * 
 * @param Str $original_path 
 *    Path to Where image is from
 * 	  Default = Null 
 * 
 * @param Str $original_filename 
 *    Current filename
 * 
 * @param Str $new_path
 *    Path for new pic togo to
 *    Default = null;
 * 
 * @param Str $new_filename
 * 	  New file name
 * 
 * @param Int $topleft_x
 *    Top left x co-ordinate, on the original image
 * 
 * @param Int $topleft_y
 * 	  Top left y co-ordinate on the original image
 * 
 * @param Int $crop_width
 *    Width of the cropping box
 * 
 * @param Int $crop_height 
 *    Height of the cropping box
 * 
 * @param Int $thumb_width 
 *    Width of the thumb to be made
 * 
 * @param Int $thumb_height
 *    Height of the thumb to be made
 * 
 */	
function CropImg($original_path = null, $original_filename, $new_path = null, $new_filename, $topleft_x, $topleft_y, $crop_width, $crop_height,$thumb_width, $thumb_height)
{
	/**
	 * ***************
	 * Things to know
	 * 	 1. This will be memory heavy and slow
	 *		Best to not run it through any kind of loop..etc
	 * 
	 * Need todo 2 things here
	 * 	 1. Get the cropped version of the selection
	 *   2. Resize it down to the right size.
	 * 
	 * Todo:
	 *   1. Integrate with ImageMagic.	 * 
	 *      Note: with GD/GD2 final image quality will be severly degraded 
	 */			

	$size = getimagesize($original_path.$original_filename);	

	# Creates the pallet from the original image
	$gdimg = $this->GDImage($size[2], $original_path.$original_filename);
	
	# Makes the blank image 	
	$bigthumb = imagecreatetruecolor($crop_width, $crop_height);
	
	# Crops the spefied section from gd and puts onto the blank $thumb image
	imagecopy($bigthumb, $gdimg, 0, 0, $topleft_x, $topleft_y, $crop_width, $crop_height);
	
	# If the cropping ara is bigger than what the final size should be for the thumb, resize it
	if($crop_width > $thumb_width || $crop_height > $thumb_height)
	{
		# Make the blank image
		$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
		
		# Resize the picture to the final thumb size
		imagecopyresampled(
			$thumb, $bigthumb, 
			0, 0, 
			0, 0, 
			$thumb_width, $thumb_height, 
			$crop_width, $crop_height);
			
	}
	else
	{
		$thumb = $bigthumb;
	}
	
	
	
	$savefilename = ($new_path == null) ? $new_filename : $new_path.$new_filename; 
	# Save it as a jpg
	imagejpeg($thumb, $savefilename, 100);
	
	return $filename;
}



/**
 * ******************
 * Return a gd image of the image
 * 
 * @param Int $imagetype
 *   Is one of the IMAGETYPE_XXX constants indicating the type of the image
 *   retrieved from getimagesize => [2] 
 * 
 * @param Str $Original 
 *   Path to the original image working from 
 */
function GDImage($imagetype, $Original)
{
	$gdimage = null; 
	
	switch($imagetype)
	{
		case 1: $gdimage = imagecreatefromgif ($Original); break;	
		case 2: $gdimage = imagecreatefromjpeg($Original); break;	
		case 3: $gdimage = imagecreatefrompng ($Original); break;
	}
	
	if(!$gdimage) die('Failed GDImage');
	
	return $gdimage;
}


}


?>
