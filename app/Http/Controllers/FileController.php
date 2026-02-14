<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    }
}
