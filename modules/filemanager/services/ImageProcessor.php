<?php

/**
 * Source class:
 * File: SimpleImage.php
 * Author: Simon Jarvis
 * Copyright: 2006 Simon Jarvis
 * Date: 08/11/06
 * Link: http://www.white-hat-web-design.co.uk/articles/php-image-resizing.php
 *
 *
 * Class ImageProcessor
 */

class ImageProcessor {

    var $image;
    var $image_type;

    function load($filename) {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if( $this->image_type == IMAGETYPE_JPEG ) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif( $this->image_type == IMAGETYPE_GIF ) {
            $this->image = imagecreatefromgif($filename);
        } elseif( $this->image_type == IMAGETYPE_PNG ) {
            $this->image = imagecreatefrompng($filename);
        }
    }

    public function makeThumbnail () {
        $thumbnailHeight = 100;
        $thumbnailWidth = 100;

        $thumbnailRatio = $thumbnailWidth / $thumbnailHeight;

        $imageHeight = imagesy($this->image);
        $imageWidth = imagesx($this->image);

        $coordinateX = $coordinateY = 0;

        // If target image should be from right/left
        if($thumbnailRatio < $imageWidth / $imageHeight) {
            $croppedImageHeight = $imageHeight;
            $croppedImageWidth = round($imageHeight * $thumbnailRatio);
            $coordinateX = round($imageWidth / 2) - round($croppedImageWidth / 2);
        // If target image should be cut from top/bottom
        } else {
            $croppedImageWidth = $imageWidth;
            $croppedImageHeight = round($imageWidth / $thumbnailRatio);
            $coordinateY = round($imageHeight / 2) - round($croppedImageHeight / 2);
        }

        $thumbnailImage = imagecreatetruecolor( $thumbnailWidth, $thumbnailHeight);
        imagecopyresized($thumbnailImage, $this->image, 0, 0, $coordinateX, $coordinateY, $thumbnailWidth, $thumbnailHeight, $croppedImageWidth, $croppedImageHeight );

        header('Content-Type: image/jpeg');
        imagejpeg($thumbnailImage);
    }

    function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image,$filename,$compression);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image,$filename);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image,$filename);
        }
        if( $permissions != null) {
            chmod($filename,$permissions);
        }
    }

    function output($image_type=IMAGETYPE_JPEG) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($this->image);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($this->image);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($this->image);
        }
    }
    function getWidth() {
        return imagesx($this->image);
    }
    function getHeight() {
        return imagesy($this->image);
    }
/*    function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width,$height);
    }
    function resizeToWidth($width) {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width,$height);
    }
    function scale($scale) {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getheight() * $scale/100;
        $this->resize($width,$height);
    }
    function resize($width,$height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }*/

}