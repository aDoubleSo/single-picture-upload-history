<?php
    debug_to_console("Starting PHP script...");

    // Create folder structure
    if (!file_exists('small')) {
        mkdir('small', 0777, true);
    }
    if (!file_exists('medium')) {
        mkdir('medium', 0777, true);
    }

    deleteOldPictures(24, 'small');
    deleteOldPictures(24, 'medium');

    if(file_exists('current.jpg')){
        debug_to_console("Image exists and will now be copied to small and medium folders");
        increaseFileNameEnding('small');
        increaseFileNameEnding('medium');
        resizeImage('current.jpg','current_1.jpg', 0.2, 'small');
        resizeImage('current.jpg','current_1.jpg', 0.75, 'medium');
        unlink('current.jpg');
    } else {
        debug_to_console("No image found");
    }

    // Increase file name ending for existing images
    function increaseFileNameEnding($folder){
        debug_to_console("Increasing file name ending...");
        $images = glob($folder . '/*.jpg', GLOB_BRACE);
        natsort($images);
        $images = array_values($images);
        $count = count($images);
        
        if($count > 0){
            debug_to_console("Images found: " . $count);
            // Iterate through all images in the folder
            for($i = $count - 1; $i >= 0; $i--){
                $image = $images[$i] ?? null; // Ensure the index exists
                if ($image) {
                    debug_to_console("Image: " . $image);
                    $ending = getFileNameEnding($image);
                    debug_to_console("File name ending: " . $ending);
                    $newFileName = $folder . '/current_' . ($ending + 1) . '.jpg';
                    if (rename($image, $newFileName)) {
                        debug_to_console("Renamed to: " . $newFileName);
                    } else {
                        debug_to_console("Failed to rename: " . $image);
                    }
                }
            }
        }
    }

    // Delete old images
    function deleteOldPictures(int $valueEnding, string $folder){
        debug_to_console("Delete pictures with an ending higher than: " . $valueEnding);
        $images = glob($folder . '/*.jpg', GLOB_BRACE);
        natsort($images);
        $images = array_values($images);
        $count = count($images);

        if($count > 0){
            debug_to_console("Images found: " . $count);
            // Iterate through all images in the folder
            for($i = $count - 1; $i >= $valueEnding; $i--){
                $image = $images[$i] ?? null; // Ensure the index exists
                if ($image && file_exists($image)) {
                    debug_to_console("Deleting image: " . $image);
                    if (!unlink($image)) {
                        debug_to_console("Failed to delete: " . $image);
                    }
                }
            }
        }
    }

    // Get the file name after the underscore (_)
    function getFileNameEnding($filename){
        $parts = explode('_', basename($filename));
        if (count($parts) > 1) {
            $ending = explode('.', $parts[1]);
            return intval($ending[0]);
        }
        return 0; // Fallback if format is unexpected
    }

    // Resize image and save to folder
    function resizeImage($SourceFileName, $targetFileName, $scale, $folder){
        debug_to_console("Resizing image...");
        list($width, $height) = getimagesize($SourceFileName);
        $new_width = $width * $scale;
        $new_height = $height * $scale;
        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($SourceFileName);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        $savePath = $folder . '/' . $targetFileName;
        debug_to_console("Saving image to " . $savePath . " folder...");
        if (!imagejpeg($image_p, $savePath, 100)) {
            debug_to_console("Failed to save resized image: " . $savePath);
        }

        imagedestroy($image_p);
        imagedestroy($image);
    }

    function debug_to_console($data) {
        if (is_array($data)) {
            $output = "<script>console.log('Debug: " . implode(',', $data) . "');</script>";
        } else {
            $output = "<script>console.log('Debug: " . $data . "');</script>";
        }
        echo $output;
    }
?>
