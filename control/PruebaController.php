<?php

require_once('Controller.php');
require_once('db/medoo.min.php');

class PruebaController extends Controller {

    function process() {
        $bbdd = new medoo();
        $target_dir = "view/images/";
        $target_thub = "view/images/thumbnail/";
        $rand = rand();
        $target_file = $target_dir . $rand .basename($_FILES["fileToUpload"]["name"]);
        $target_thub_file = $target_thub . $rand .basename($_FILES["fileToUpload"]["name"]);
        $thub = new Imagick($_FILES["fileToUpload"]["tmp_name"]);
        $img = new Imagick($_FILES["fileToUpload"]["tmp_name"]);
        
        $img->thumbnailImage(206, 206);
        $thub->thumbnailImage(80, 80);
        
//        $img->writeimage($target_file);
        
        
        
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($target_file);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
//        if (file_exists($target_file)) {
//            echo "Sorry, file already exists.";
//            $uploadOk = 0;
//        }
// Check file size
//        if ($_FILES["fileToUpload"]["size"] > 500000) {
//            echo "Sorry, your file is too large.";
//            $uploadOk = 0;
//        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if ($img->writeimage($target_file)) {
                $img->writeimage($target_thub_file);
                
                $bbdd->insert("images", [
                    "idUser" => $_SESSION['id'],
                    "path" => $target_file,
                    "pathThumb" => $target_thub_file
                ]);
                $this->_view->render($target_file);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

}
