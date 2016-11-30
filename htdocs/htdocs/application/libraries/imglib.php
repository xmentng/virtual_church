<?php
/*
	Function resize($filename_original,$filename_resized,$new_w,$new_h)
	creates a resized image
	variables:
	$filename_original	Original filename
	$filename_resized	Filename of the resized image
	$new_w		width of resized image
	$new_h		height of resized image
*/	

class Imglib{

public static function resize($filename_original, $filename_resized, $new_w, $new_h) {
	$extension = pathinfo($filename_original, PATHINFO_EXTENSION);

	if ( preg_match("/jpg|jpeg/", $extension) ) $src_img=@imagecreatefromjpeg($filename_original);

	if ( preg_match("/png/", $extension) ) $src_img=@imagecreatefrompng($filename_original);

	if(!$src_img) return false;

	$old_w = imageSX($src_img);
	$old_h = imageSY($src_img);

	$x_ratio = $new_w / $old_w;
	$y_ratio = $new_h / $old_h;

	if ( ($old_w <= $new_w) && ($old_h <= $new_h) ) {
		$thumb_w = $old_w;
		$thumb_h = $old_h;
	}
	elseif ( $y_ratio <= $x_ratio ) {
		$thumb_w = round($old_w * $y_ratio);
		$thumb_h = round($old_h * $y_ratio);
	}
	else {
		$thumb_w = round($old_w * $x_ratio);
		$thumb_h = round($old_h * $x_ratio);
	}		

	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_w,$old_h); 

	if (preg_match("/png/",$extension)) imagepng($dst_img,$filename_resized); 
	else imagejpeg($dst_img,$filename_resized,100); 

	imagedestroy($dst_img); 
	imagedestroy($src_img);

	return true;
}//end function

}
?>