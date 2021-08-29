<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Scheme;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $schemes = Scheme::get();
        return view('schemes.index', compact('schemes', 'settings'));

    }

    public function create()
    {
        $settings = Setting::where('id', '1')->first();
        return view('schemes.create', compact('settings'));
    }

    public function edit($id)
    {
        $settings = Setting::where('id', '1')->first();
        $schemes = Scheme::find($id);
        return view('schemes.edit', compact('schemes', 'settings'));


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
        $schemes = Scheme::find($id);
        $schemes->delete();
        return redirect('/schemes');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
        ]);

        $data = request()->all();
        $schemes = new Scheme();
        $schemes->title = $data['title'];
        $schemes->image = $data['image'];
        $schemes->save();
        return redirect('/schemes');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
        ]);
        
        $data = request()->all();
        $schemes = Scheme::find($data['id']);
        $schemes->title = $data['title'];
        $schemes->image = $data['image'];
        $schemes->save();
        return redirect('/schemes');
    }
}
