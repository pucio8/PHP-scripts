<?php
// Function to create new Directory

function createWebpDirectory( string $basePath = './' ) {
    // Path to new Directory
    $webpDirPath = $basePath . 'images_webp';
    // Checking if dir exists
    if ( !is_dir( $webpDirPath ) ) {
        // Creating new Directory
        if ( mkdir( $webpDirPath, 0755, true ) ) {
            echo "Directory 'images webp' has been created: $webpDirPath DirPath" . '<br>';
        } else {
            echo "Has failed to create directory 'images_webp' in: $webpDirPath" . '<br>';
        }
    } else {
        echo "Directory 'images_webp' already has existed: $webpDirPath" . '<br>';
    }

    return $webpDirPath;
}

// function to convert image to WebP

function convertToWebP( string $imagePath, string $webpDirectoryPath, int $quality = 80 ) {
    // Checking if dir exists
    if ( file_exists( $imagePath ) ) {
        // Checking file extension ( return only extesion )
        $extension = pathinfo( $imagePath, PATHINFO_EXTENSION );
        // Creating Object img depending in extension type
        if ( $extension == 'jpg' || $extension == 'jpeg' ) {
            $image = imagecreatefromjpeg( $imagePath );
        } elseif ( $extension == 'png' ) {
            $image = imagecreatefrompng( $imagePath );
             // Convert palette-based PNG (PNG-8) to true color (RGB/RGBA)
            if (!imageistruecolor($image)) {
                imagepalettetotruecolor($image);
            }
        } else {
            echo "Unsupported image format $extension." . '<br>';
            return false;
        }
        // Creating file name WebP (in new directory)
        $webpPath = $webpDirectoryPath . '/' . pathinfo( $imagePath, PATHINFO_FILENAME ) . '.webp';

        // Converting Img on WebP and save in new dir 
        imagewebp( $image, $webpPath, $quality );

        // Freeing up mempry 
        imagedestroy( $image );

        echo "Img $imagePath has converting on WebP!" . "<br>";
        return true;
    } else {
        echo "File $imagePath doesn't exist." . "<br>";
        return false;
    }
}

// Images path
$directory = 'C:/Users/ploci/Desktop/images/';

//Create new Directory for webp_img, in images dir
$directoryForImages_webp  = createWebpDirectory( $directory );

// Getting all JPG and PNG files from a directory
$files = glob( $directory . '*.{jpg,jpeg,png}', GLOB_BRACE );

// foreach files and convert them to WebP
foreach ( $files as $file ) {
    convertToWebP( $file, $directoryForImages_webp );
}
?>
