<?php
    debug_to_console("Starting PHP script...");

    // TODO: Exception on current_1.jpg increaseFileNameEnding

    // create folder structure
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

    // increase file name ending for existing images
    function increaseFileNameEnding($folder){
        debug_to_console("Increasing file name ending...");
        $images = glob($folder . '/*.jpg', GLOB_BRACE);
        natsort($images);
        $images = array_values($images);
        if(count($images) > 0){
            debug_to_console("Images found: " . count($images));
            // Iterate trough all images in the folder and log to console
            for($i = count($images); $i >= 0; $i--){
                debug_to_console("Image: " . $images[$i]);
                $ending = getFileNameEnding($images[$i]);
                debug_to_console("File name ending: " . $ending);
                // rename $image to current_ plus ending + 1
                rename($images[$i], $folder . '/current_' . ($ending +1) . '.jpg');

            }
        }
    }

    // delete old images
    function deleteOldPictures(int $valueEnding, string $folder){
        debug_to_console("Delete picture with an ending higher:" . $valueEnding);
        $images = glob($folder . '/*.jpg', GLOB_BRACE);
        natsort($images);
        $images = array_values($images);
        if(count($images) > 0){
            debug_to_console("Images found: " . count($images));
            // Iterate trough all images in the folder and log to console
            for($i = count($images); $i >= $valueEnding; $i--){
                debug_to_console("Image: " . $images[$i]);
                if(file_exists($images[$i])){
                    unlink($images[$i]);
                }
            }
        }
    }

    // get the file name after the _
    function getFileNameEnding($filename){
        $filename = explode('_', $filename);
        $filename = explode('.', $filename[1]);
        return $filename[0];
    }

    // resize image and save to folder
    function resizeImage($SourceFileName, $targetFileName, $scale, $folder){
        debug_to_console("Resizing image...");
        list($width, $height) = getimagesize($SourceFileName);
        $new_width = $width * $scale;
        $new_height = $height * $scale;
        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($SourceFileName);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        debug_to_console("Saving image to " . $folder . " folder...");
        imagejpeg($image_p, $folder . '/' . $targetFileName, 100);
    }

    function debug_to_console( $data ) {
        if ( is_array( $data ) )
            $output = "<script>console.log( 'Debug: " . implode( ',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'Debug: " . $data . "' );</script>";

        echo $output;
    }
?>
