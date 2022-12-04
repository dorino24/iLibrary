<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return view('status/status');
        // return view('userNonAdmin/dashboard', [
        //     'authors' => auther::count(),
        //     'publishers' => publisher::count(),
        //     'categories' => category::count(),
        //     'books' => book::count(),
        //     'students' => student::count(),
        //     'issued_books' => book_issue::count(),
        // ]);
    }
}
