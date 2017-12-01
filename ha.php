				
<form enctype="multipart/form-data" method="post" action="#">
Choose your file here:
<input name="uploaded_file" type="file"/><br /><br />
<input type="submit" value="Upload It"/>
</form>

<?php 
		// Access the $_FILES global variable for this specific file being uploaded
		// and create local PHP variables from the $_FILES array of information
		$fileName = $_FILES["uploaded_file"]["name"]; // The file name
		$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"]; // File in the PHP tmp folder
		$fileType = $_FILES["uploaded_file"]["type"]; // The type of file it is
		$fileSize = $_FILES["uploaded_file"]["size"]; // File size in bytes
		$fileErrorMsg = $_FILES["uploaded_file"]["error"]; // 0 for false... and 1 for true
		$kaboom = explode(".", $fileName); // Split file name into an array using the dot
		$fileExt = end($kaboom); // Now target the last array element to get the file extension
		// START PHP Image Upload Error Handling --------------------------------------------------
		if (!$fileTmpLoc) { // if file not chosen
		    echo "ERROR: Please browse for a file before clicking the upload button.";
		    exit();
		} else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
		    echo "ERROR: Your file was larger than 5 Megabytes in size.";
		    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
		    exit();
		} else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
		     // This condition is only if you wish to allow uploading of specific file types    
		     echo "ERROR: Your image was not .gif, .jpg, or .png.";
		     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
		     exit();
		} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
		    echo "ERROR: An error occured while processing the file. Try again.";
		    exit();
		}

	
		$target_file = "assets/img/profilepicture/$fileName";
		$resized_file = "assets/img/upload/resized_$fileName";
		$wmax = 225;
		$hmax = 225;
		ak_img_resize($fileTmpLoc, $resized_file, $wmax, $hmax, $fileExt);
	

		function ak_img_resize($target, $newcopy, $w, $h, $ext) {
	    list($w_orig, $h_orig) = getimagesize($target);
	    $scale_ratio = $w_orig / $h_orig;
	    if (($w / $h) > $scale_ratio) {
	           $w = $h * $scale_ratio;
	    } else {
	           $h = $w / $scale_ratio;
	    }
	    $img = "";
	    $ext = strtolower($ext);
	    if ($ext == "gif"){ 
	      $img = imagecreatefromgif($target);
	    } else if($ext =="png"){ 
	      $img = imagecreatefrompng($target);
	    } else { 
	      $img = imagecreatefromjpeg($target);
	    }
	    $tci = imagecreatetruecolor($w, $h);
	    // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
	    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
	    imagejpeg($tci, $newcopy, 80);
		}
		
 ?>