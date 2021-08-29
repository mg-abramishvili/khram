<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $banners = Banner::get();
        return view('banners.index', compact('banners', 'settings'));

    }

    public function create()
    {
        $settings = Setting::where('id', '1')->first();
        return view('banners.create', compact('settings'));

    }

    public function edit($id)
    {
        $settings = Setting::where('id', '1')->first();
        $banner = Banner::find($id);
        return view('banners.edit', compact('banner', 'settings'));


    }

    public function file($type)
    {

        switch ($type) {
            case 'upload':
                return $this->upload();


        }

        return \Response::make('success', 200, [
            'Content-Disposition' => 'inline',
        ]);
    }

    public function upload()
    {

        if (request()->file('image')) {
            $file = request()->file('image');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }

    }

    public function delete($id)
    {
        $banners = Banner::find($id);
        $banners->delete();
        return redirect('/banners');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
        ]);

        $data = request()->all();
        $banners = new Banner();
        $banners->title = $data['title'];
        $banners->image = $data['image'];
        $banners->save();
        return redirect('/banners');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
        ]);

        $data = request()->all();
        $banners = Banner::find($data['id']);
        $banners->title = $data['title'];
        $banners->image = $data['image'];
        $banners->save();
        return redirect('/banners');
    }
}
