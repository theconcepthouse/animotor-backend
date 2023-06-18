<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class backupController extends Controller
{

    function Send($excludeFolders, $postUrl) {



        // Define the maximum allowed file size in bytes
        $maxFileSize = 1048576; // 1 MB


        // Define the folders to exclude
        $excludeFolders = ['vendor', 'node_modules'];

// Define the URL to send the zip file to
        $postUrl = 'https://example.com/upload';

// Call the zipAndSend function
        $response = zipAndSend($excludeFolders, $postUrl);

// Check the response from the other endpoint
        if ($response->getStatusCode() == 200) {
            echo 'Zip file sent successfully';
        } else {
            echo 'Failed to send zip file';
        }






        //CHECK IF ZIP IS INSTALLED
        if (class_exists('ZipArchive')) {
            echo 'ZipArchive extension is installed';
        } else {
            echo 'ZipArchive extension is not installed';
        }
    }


    function zipAndSend($excludeFolders, $postUrl, $maxFileSize) {

        // Set the name of the zip file to create
        $zipFileName = 'my_project.zip';



        // Get the path to the project directory
        $projectPath = base_path();

        // Get an array of all the folders in the project directory
        $folders = File::directories($projectPath);

        // Remove any excluded folders from the array
        $folders = array_diff($folders, $excludeFolders);

        // Create a new ZipArchive object
        $zip = new ZipArchive;

        // Create a new zip file and open it for writing
        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new Exception('Unable to create zip file');
        }

        // Add each folder to the zip file
        foreach ($folders as $folder) {
            // Get the name of the folder (without the path)
            $folderName = str_replace($projectPath . '/', '', $folder);
            // Add the folder to the zip file
            $zip->addEmptyDir($folderName);
            // Add all the files in the folder to the zip file
            $files = File::allFiles($folder);
            foreach ($files as $file) {
                $filePath = $file->getRealPath();
                $fileName = str_replace($folder . '/', '', $filePath);
                $zip->addFile($filePath, $folderName . '/' . $fileName);
            }
        }

        // Close the zip file
        $zip->close();

        // Check the size of the zip file
        $fileSize = Storage::size($zipFileName);
        if ($fileSize > $maxFileSize) {
            throw new Exception('Zip file size is too large');
        }

        // Send the zip file to the other endpoint using an HTTP POST request
        $fileData = Storage::get($zipFileName);
        $fileUrl = url($zipFileName);
        $fileName = basename($zipFileName);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $postUrl, [
            'multipart' => [
                [
                    'name' => 'zip_file',
                    'contents' => $fileData,
                    'filename' => $fileName,
                ],
            ],
        ]);

        // Delete the zip file from storage
        Storage::delete($zipFileName);

        return $response;
    }

}
