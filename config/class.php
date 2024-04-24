<?php

class db
{
    public function __db($return) {
        $dbInfo=array(
            "hostname" => "localhost",
            "database" => "database",
            "username" => "username",
            "password" => "123456",
        );
        return $dbInfo[$return];
    }
}

class func
{
    public function __base64EncodeImage($image_file){
        $image_info = getimagesize($image_file);
        $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
        $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
        return $base64_image;
    }
}