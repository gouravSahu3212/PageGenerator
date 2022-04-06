<?php

namespace App\Http\Controllers;
use App\Models\Pages;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pages = Pages::select('*')->where('user_id', session('AuthUser')->id)->orderBy('title')->paginate(3);
        return view('dashboard')->with('pages', $pages);
    }
}
