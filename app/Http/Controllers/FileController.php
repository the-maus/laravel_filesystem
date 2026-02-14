<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
