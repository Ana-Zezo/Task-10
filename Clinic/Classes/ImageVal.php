<?php
class ImageValidator
{
    private $image;
    private $nameImage;
    private $tmpName;
    private $errorImage;
    private $sizeImage;
    private $allow_exe = ["jpg", "jpeg", "png", "gif", "webp"];
    private $allow_mim = ["image/png", "image/jpeg", "image/gif", "image/webp"];

    public function __construct($image)
    {
        $this->image = $image;
        $this->nameImage = $this->image["name"];
        $this->tmpName = $this->image["tmp_name"];
        $this->errorImage = $this->image["error"];
        $this->sizeImage = $this->image["size"];
    }

    private function emptyVal()
    {
        return empty($this->nameImage);
    }

    private function exeName()
    {
        $fileExe = pathinfo($this->nameImage, PATHINFO_EXTENSION);
        return in_array($fileExe, $this->allow_exe);
    }

    private function size()
    {
        return $this->sizeImage > 5000000;
    }

    private function error()
    {
        return $this->errorImage == 0;
    }

    private function tmpName()
    {
        $checkTmp = mime_content_type($this->tmpName);
        return in_array($checkTmp, $this->allow_mim);
    }

    public function validate()
    {
        $errors = [];

        if ($this->emptyVal()) {
            return $errors["image"] = "Image Is Required";
        } elseif (!$this->exeName()) {
            return $errors["image"] = "File Must Be Image";
        } elseif (!$this->tmpName()) {
            return $errors["image"] = "Image Not Correct";
        } elseif (!$this->error()) {
            return $errors["image"] = "Error In Image";
        } elseif ($this->size()) {
            return $errors["image"] = "Image Must Be Less Than 5M";
        }

        // return $errors;
    }

    public function moveImage($path)
    {
        $fileExe = pathinfo($this->nameImage, PATHINFO_EXTENSION);
        $newName = uniqid("", true) . "." . $fileExe;
        move_uploaded_file($this->tmpName, $path . $newName);
        return $newName;
    }
    public function getImage()
    {
        $fileExe = pathinfo($this->nameImage, PATHINFO_EXTENSION);
        $newName = uniqid("", true) . "." . $fileExe;
        return $newName;
    }
}