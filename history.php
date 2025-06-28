<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link href="simple-lightbox.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="simple-lightbox.jquery.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }
        
        .feature-image {
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .feature-image img {
            max-width: 100%;
            height: auto;
            border: 2px solid #fff;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
        }
        
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }
        
        .gallery a {
            flex: 0 0 calc(25% - 10px);
            max-width: calc(25% - 10px);
            position: relative;
            transition: transform .15s ease;
            margin-bottom: 10px;
        }
        
        .gallery a img {
            width: 100%;
            height: auto;
            border: 2px solid #fff;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
            display: block;
        }
        
        .gallery a:hover {
            transform: scale(1.05);
            z-index: 5;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .gallery a {
                flex: 0 0 calc(33.333% - 10px);
                max-width: calc(33.333% - 10px);
            }
        }
        
        @media (max-width: 768px) {
            .gallery a {
                flex: 0 0 calc(50% - 10px);
                max-width: calc(50% - 10px);
            }
        }
        
        @media (max-width: 480px) {
            .gallery a {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="feature-image">
            <img src="medium/current_1.jpg" alt="" title="" />
        </div>
        
        <div class="gallery">
            <!-- Image -->
            <a href="medium/current_2.jpg">
                <img src="small/current_2.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_3.jpg">
                <img src="small/current_3.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_4.jpg">
                <img src="small/current_4.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_5.jpg">
                <img src="small/current_5.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_6.jpg">
                <img src="small/current_6.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_7.jpg">
                <img src="small/current_7.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_8.jpg">
                <img src="small/current_8.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_9.jpg">
                <img src="small/current_9.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_10.jpg">
                <img src="small/current_10.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_11.jpg">
                <img src="small/current_11.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_12.jpg">
                <img src="small/current_12.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_13.jpg">
                <img src="small/current_13.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_14.jpg">
                <img src="small/current_14.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_15.jpg">
                <img src="small/current_15.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_16.jpg">
                <img src="small/current_16.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_17.jpg">
                <img src="small/current_17.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_18.jpg">
                <img src="small/current_18.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_19.jpg">
                <img src="small/current_19.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_20.jpg">
                <img src="small/current_20.jpg" alt="" title="">
            </a>
            <!-- Image -->
            <a href="medium/current_21.jpg">
                <img src="small/current_21.jpg" alt="" title="">
            </a>
        </div>
    </div>

    <!-- Script -->
    <script type="text/javascript">
    $(document).ready(function(){
        // Initialize gallery
        var gallery = $('.gallery a').simpleLightbox({ 
            animationSlide: false, 
            animationSpeed: 0, 
            fadeSpeed: 0, 
            scrollZoomFactor: 0.05, 
            maxZoom: 4, 
            disableRightClick: true
        });
    });
    </script>

    <?php
    echo '<script>';
    echo 'console.log("CUSTOM PHP START")';
    echo '</script>';
    ?>
</body>
</html>