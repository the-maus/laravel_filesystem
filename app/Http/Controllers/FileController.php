<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function storageLocalCreate()
    {
        // saves to private folder
        Storage::put('file1.txt', 'File 1 content');
        
        // saves to public folder (available to access via url: "/storage/file1.txt")
        Storage::disk('public')->put('file1.txt', 'File 1 content');

        // saves to private folder also
        Storage::disk('local')->put('file2.txt', 'File 2 content');

        return redirect()->route('home');
    }

    public function storageLocalAppend()
    {
        Storage::append('file3.txt', Str::random(100));

        // specifying disk
        Storage::disk('local')->append('file3.txt', Str::random(100));

        return redirect()->route('home');
    }

    public function storageLocalRead()
    {
        $content = Storage::get('file1.txt'); //or
        // $content = Storage::disk('local')->get('file1.txt');
        echo $content;
    }

    public function storageLocalReadMulti()
    {
        $lines = Storage::get('file3.txt');
        $lines = explode(PHP_EOL, $lines);

        foreach($lines as $line) {
            echo "<p>$line</p>";
        }
    }

    public function storageLocalCheckFile()
    {
        $exists = Storage::exists('file1.txt'); //or
        // $exists = Storage::disk('local')->exists('file1.txt');

        echo $exists ? 'Exists' : 'Doesnt exist';

        echo '<br>';

        echo Storage::missing('file1.txt') ? 'Doesnt exist' : 'Exists';
    }

    public function storeJson()
    {
        $data = [
            [
                'name'  => 'João',
                'email' => 'joao@gmail.com'
            ],
            [
                'name'  => 'Ana',
                'email' => 'ana@gmail.com'
            ],
            [
                'name'  => 'Carlos',
                'email' => 'carlos@gmail.com'
            ],
        ];

        Storage::put('data.json', json_encode($data));
        echo 'JSON file created';
    }

    public function readJson()
    {
        $data = Storage::json('data.json'); // no need to json_decode
        echo '<pre>';
        print_r($data);
    }

    public function listFiles()
    {
        $files = Storage::files(); // default folder (private)
        // $files = Storage::disk('public')->files();
        // $files = Storage::files('my-files'); // from: private/my-files

        echo '<pre>';
        print_r($files);

        $directories = Storage::directories(); // list folders on private folder

        echo '<pre>';
        print_r($directories);

        $directories = Storage::files(null, true); // list files on folder and on subfolders

        echo '<pre>';
        print_r($directories);

    }

    public function deleteFile()
    {
        Storage::delete('file1.txt');
        echo 'File removed successfully';

        // remove all files
        // Storage::delete(Storage::files()); //or you could pass an array of filepaths
    }

    public function createFolder()
    {   
        Storage::makeDirectory('documents');
        Storage::makeDirectory('documents/test');
    }

    public function deleteFolder()
    {
        Storage::deleteDirectory('documents');
    }

    public function listFilesWithMetadata()
    {
        $fileList = Storage::allFiles();

        $files = [];
        foreach ($fileList as $file) {
            $files[] = [
                'name' => $file,
                'size' => round(Storage::size($file) / 1024, 22) . ' Kb',
                'last_modified' => Carbon::createFromTimestamp(Storage::lastModified($file))->format('d-m-Y H:i:s'),
                'mime_type' => Storage::mimeType($file)
            ];
        }

        return view('list-files-with-metadata', compact('files'));
    }

    public function listFilesForDownload()
    {
        // files for download must be in the public directory
        $fileList = Storage::disk('public')->allFiles(); 

        $files = [];
        foreach ($fileList as $file) {
            $files[] = [
                'name' => $file,
                'size' => round(Storage::disk('public')->size($file) / 1024, 22) . ' Kb',
                'file_url' => Storage::url($file), //direct download ULR
                'file' => basename($file),
            ];
        }

        return view('list-files-for-download', compact('files'));
    }
}
