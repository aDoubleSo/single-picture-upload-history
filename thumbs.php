<?php
    debug_to_console("Starting PHP script...");

    // TODO: delte images above a certain number
    // TODO: Exception on current_1.jpg increaseFileNameEnding
    // TODO: Delete current.jpg after copying to small and medium folders

    // create folder structure
    if (!file_exists('small')) {
        mkdir('small', 0777, true);
    }
    if (!file_exists('medium')) {
        mkdir('medium', 0777, true);
    }

    if(file_exists('current.jpg')){
        debug_to_console("Image exists and will now be copied to small and medium folders");
        increaseFileNameEnding('small');
        increaseFileNameEnding('medium');
        resizeImage('current.jpg','current_1.jpg', 0.2, 'small');
        resizeImage('current.jpg','current_1.jpg', 0.75, 'medium');
    }

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
            // if($i >= $max_pic){
            //     debug_to_console("Deleting image: " . $images[$i]);
            //     unlink($images[$i]);
            // }
        }
    }
    }

    // get the file name after the _
    function getFileNameEnding($filename){
        $filename = explode('_', $filename);
        $filename = explode('.', $filename[1]);
        return $filename[0];
    }

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
