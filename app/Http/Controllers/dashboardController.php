<?php

namespace App\Http\Controllers;

use App\Http\Requests\changePasswordRequest;
use App\Models\auther;
use App\Models\book;
use App\Models\book_issue;
use App\Models\publisher;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        return view('userNonAdmin/dashboard', [
            'authors' => auther::count(),
            'publishers' => publisher::count(),
            'books' => book::count(),
            'title' => 'Dashboard'
        ]);
    }
    public function indexAdmin()
    {
        if (auth()->user()->role == 0) {
            return view('admin/dashboardAdmin', [
                'authors' => auther::count(),
                'publishers' => publisher::count(),
                'title' => 'Dashboard',
                'books' => book::count(),

            ]);
        } else {
            return view('disallow');
        }
    }


    public function change_password_view()
    {
        return view('reset_password');
    }

    public function change_password(changePasswordRequest $request)
    {
        if (Auth::check(["username" => auth()->user()->username, "password" => $request->c_password])) {
            auth()->user()->password = bcrypt($request->password);
            return redirect()->back()->with(['message' => "Password Changed Successfully!."]);
        } else {
            return "";
        }
    }
}
