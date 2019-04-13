<?php


class Image {

    protected   $name,
        $tmp_name,
        $type,
        $ext,
        $width,
        $height,
        $size;

    public function __construct($image) {
        $this->name = $_FILES[$image]['name'];
        $this->tmp_name = $_FILES[$image]['tmp_name'];
        $this->type = $_FILES[$image]['type'];
        $this->ext = pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION);
        list($width, $height) = getimagesize($_FILES[$image]['tmp_name']);
        $this->width = $width;
        $this->height = $height;

        $this->size = $_FILES[$image]['size'];
    }

    public function resizeAndCompress($folderPath, $newWidth, $newHeight) {

        $imageSource = imagecreatefrom . $ext .($this->name);

        $newImage=imagecreatetruecolor($newWidth,$newHeight);
        imagecopyresampled($newImage, $imageSource, 0, 0, 0, 0, $newWidth, $newHeight, $this->width, $this->height);

        imagejpeg($newImage, $this->tmp_name);
    }

    public function upload() {
        move_uploaded_file($this->tmp_name, "public/images/banners/" . $this->name);
        echo "Votre fichier a été téléchargé avec succès.";
    }

    public function isExtAllowed() {
        $allowed_ext = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");

        return !array_key_exists($this->type, $allowed_ext);
    }

    public function isImageSizeValid() {
        $maxsize = 1 * 1024 * 1024; // Maximum size accepted = 1Mo

        return !($this->size > $maxsize);
    }

    public function isImageNameValid() {
        return !file_exists("public/images/banners/" . $this->name);
    }

}