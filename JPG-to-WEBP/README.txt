# PHP Image to WebP Converter

## Description
This PHP script converts images in JPG, JPEG, and PNG formats to the WebP format.
It creates a new directory called `images_webp` (if it doesn't already exist) in the specified folder,
then saves the converted images in that directory.

This script is useful for optimizing images on websites by converting image files to the modern,
lightweight WebP format, which offers better compression while maintaining high image quality.

## Requirements
- A server with PHP support (version 5.5 or higher).
- GD library installed in PHP (for working with JPG, JPEG, PNG, and WebP images).
- A folder containing the images you want to convert.

## How to Use

1. Make sure the GD extension is enabled in PHP (check in `php.ini`).
2. Place the image files in the folder whose path you will specify in the `$directory` variable.
3. Run the PHP script on your server or locally.
4. The script will create the `images_webp` directory in the path specified in the `$directory` variable
(if the directory doesn't already exist).
5. The script will convert the images to the WebP format and save them in the new directory.
6. If a WebP file with the same name already exists, the script will check and rename the file accordingly.

## Script Functions

- **createWebpDirectory($basePath = './')**: Creates the `images_webp` directory in the specified path (if it doesn't already exist).
- **convertToWebP($imagePath, $webpDirectoryPath, $quality = 80)**: Converts an image to WebP format and saves it in the `images_webp` directory with the specified quality (default is 80%).

## Parameters

- `$directory`: The path to the directory where the images to be converted are located.
- `$quality`: The quality of the converted WebP image (a value between 0 and 100; default is 80).