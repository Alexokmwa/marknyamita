<?php

/**
 * Image manipulation class
 */

namespace app\models;

defined('ROOTPATH') or exit('Access Denied!');

class Image
{
    
    public function resize($filename, $target_width, $target_height)
{
    $type = mime_content_type($filename);

    if (file_exists($filename)) {
        switch ($type) {
            case 'image/png':
                $image = imagecreatefrompng($filename);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($filename);
                break;
            case 'image/jpeg':
                $image = imagecreatefromjpeg($filename);
                break;
            case 'image/webp':
                $image = imagecreatefromwebp($filename);
                break;
            default:
                return $filename;
        }

        $src_w = imagesx($image);
        $src_h = imagesy($image);

        // Calculate aspect ratio
        $aspect_ratio = $src_w / $src_h;
        $target_aspect_ratio = $target_width / $target_height;

        if ($aspect_ratio > $target_aspect_ratio) {
            // Wider image
            $dst_w = $target_width;
            $dst_h = $target_width / $aspect_ratio;
        } else {
            // Taller image or square
            $dst_h = $target_height;
            $dst_w = $target_height * $aspect_ratio;
        }

        $dst_w = round($dst_w);
        $dst_h = round($dst_h);

        $dst_image = imagecreatetruecolor($target_width, $target_height);

        if ($type == 'image/png') {
            imagealphablending($dst_image, false);
            imagesavealpha($dst_image, true);
        }

        // Create a blank image and copy resized image onto it
        imagecopyresampled($dst_image, $image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
        imagedestroy($image);

        // Fill the background to maintain the target size
        $background_color = imagecolorallocate($dst_image, 255, 255, 255);
        imagefill($dst_image, 0, 0, $background_color);

        switch ($type) {
            case 'image/png':
                imagepng($dst_image, $filename, 8);
                break;
            case 'image/gif':
                imagegif($dst_image, $filename);
                break;
            case 'image/jpeg':
                imagejpeg($dst_image, $filename, 90);
                break;
            case 'image/webp':
                imagewebp($dst_image, $filename, 90);
                break;
            default:
                imagejpeg($dst_image, $filename, 90);
        }

        imagedestroy($dst_image);
    }

    return $filename;
}


public function crop($filename, $target_width = 1000, $target_height = 650)
{
    $type = mime_content_type($filename);

    if (file_exists($filename)) {
        switch ($type) {
            case 'image/png':
                $image = imagecreatefrompng($filename);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($filename);
                break;
            case 'image/jpeg':
                $image = imagecreatefromjpeg($filename);
                break;
            case 'image/webp':
                $image = imagecreatefromwebp($filename);
                break;
            default:
                return $filename;
        }

        $src_w = imagesx($image);
        $src_h = imagesy($image);

        $src_x = ($src_w - $target_width) / 2;
        $src_y = ($src_h - $target_height) / 2;

        $dst_image = imagecreatetruecolor($target_width, $target_height);

        if ($type == 'image/png') {
            imagealphablending($dst_image, false);
            imagesavealpha($dst_image, true);
        }

        imagecopyresampled($dst_image, $image, 0, 0, $src_x, $src_y, $target_width, $target_height, $target_width, $target_height);
        imagedestroy($image);

        switch ($type) {
            case 'image/png':
                imagepng($dst_image, $filename, 8);
                break;
            case 'image/gif':
                imagegif($dst_image, $filename);
                break;
            case 'image/jpeg':
                imagejpeg($dst_image, $filename, 90);
                break;
            case 'image/webp':
                imagewebp($dst_image, $filename, 90);
                break;
            default:
                imagejpeg($dst_image, $filename, 90);
        }

        imagedestroy($dst_image);
    }

    return $filename;
}


public function getThumbnail($filename, $target_width = 1000, $target_height = 650)
{
    if (file_exists($filename)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $dest = preg_replace("/\.{$ext}$/", '_thumbnail.'.$ext, $filename);

        if (file_exists($dest)) {
            return $dest;
        }

        copy($filename, $dest);

        // Resize to ensure it fits within the target dimensions
        $this->resize($dest, $target_width, $target_height);

        // Crop to exact dimensions
        $this->crop($dest, $target_width, $target_height);

        return $dest;
    }

    return $filename;
}


}
