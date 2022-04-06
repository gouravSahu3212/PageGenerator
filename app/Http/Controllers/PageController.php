<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Pages;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{

    public function add_page($page_uid)
    {   
        $pages = Pages::select('title')->where('user_id', '2')->orderBy('title')->get();
        $data = Pages::select('description')->where('page_uid', $page_uid)->first();
        return view('add_page')
                ->with('pages', $pages)
                ->with('data', $data);
    }

    public function save_page(Request $request)
    {
        // print_r($request->all());
        // die();
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $page_uid = rand(10, 99)."".time()."".rand(100, 999);
        $url = 'http://localhost:5000/page/'.$page_uid;
        $qr_data = QrCode::errorCorrection('H')->size(200)->generate($url);

        $page = new Pages;
        $page->title = $request->title;
        $page->description = $request->description;
        $page->user_id = session('AuthUser')->id;
        $page->page_uid = $page_uid;
        $page->qr_img = $qr_data;
        $page->save();
        // return redirect()->back()->with('success', 'You have created a new page successfully');
        return redirect('qr-image/'.$page_uid);
    }

    public function show_qr($page_uid)
    {
        $data = Pages::select('qr_img')->where('page_uid', $page_uid)->first();
        if($data){
            return view('qrCode')
                    ->with('qr_data', $data)
                    ->with('page_uid', $page_uid);
        }else{
            echo "Check the link you've entered!!";
        }
    }

    public function show_page($page_uid)
    {
        $data = Pages::select('description', 'title', 'created_at', 'updated_at')->where('page_uid', $page_uid)->first();
        return view('page')
                ->with('data', $data);
    }
    public function delete_page(Request $request)
    {
        $page_uid = $request->id;
        $success = Pages::where('page_uid', $page_uid)->delete();
        if($success){
            return redirect()->back()->with('success', 'Deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'an error occured, please try after some time.');
        }
    }

    public function edit_page($page_uid)
    {
        $data = Pages::select('title', 'description', 'page_uid')
                        ->where('page_uid', $page_uid)
                        ->first();

        return view('edit')
                ->with('data', $data);
    }

    public function update_page(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        
        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];
        $success = Pages::where('page_uid', $request->page_uid)->update($data);
        if($success){
            return redirect('/dashboard')->with('success', 'Page updated successfully.');
        }else{
            return redirect()->back()->with('error', 'an error occured, please try after some time.');
        }
    }

    public function preview_theme($title){
        $data = Pages::select('description', 'page_uid', 'created_at', 'updated_at')->where('title', $title)->first();

        return view('preview')
                ->with('data', $data);
    }

    // public function add_theme($page_uid)
    // {
    //     $data = Pages::select('description')->where('page_uid', $page_uid)->first();
    //     return redirect('/add-page')->with('theme', $data->description);
    // }
}
