<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Photoalbum;
use Illuminate\Http\Request;

class PhotoalbumController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $photoalbums = Photoalbum::get();
        return view('photoalbums.index', compact('photoalbums', 'settings'));

    }

    public function create()
    {
        $settings = Setting::where('id', '1')->first();
        return view('photoalbums.create', compact('settings'));

    }

    public function edit($id)
    {
        $settings = Setting::where('id', '1')->first();
        $photoalbum = Photoalbum::find($id);
        return view('photoalbums.edit', compact('photoalbum', 'settings'));


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

        if (request()->file('cover')) {
            $file = request()->file('cover');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }
        if (request()->file('gallery')) {
            $file1 = request()->file('gallery');
            for ($i = 0; $i < count($file1); $i++) {

                $file = $file1[$i];
                $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/uploads', $filename);

                return \Response::make('/uploads/' . $filename, 200, [
                    'Content-Disposition' => 'inline',
                ]);
            }
        }


    }

    public function delete($id)
    {
        $photoalbums = Photoalbum::find($id);
        $photoalbums->delete();
        return redirect('/photoalbums');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'gallery' => 'required',
        ]);

        $data = request()->all();
        $photoalbums = new Photoalbum();
        $photoalbums->title = $data['title'];
        if (!isset($data['gallery'])) {
            $data['gallery'] = [];
        }
        $photoalbums->gallery = $data['gallery'];
        $photoalbums->save();
        return redirect('/photoalbums');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'gallery' => 'required',
        ]);

        $data = request()->all();
        $photoalbums = Photoalbum::find($data['id']);
        $photoalbums->title = $data['title'];
        if (!isset($data['gallery'])) {
            $data['gallery'] = [];
        }
        $photoalbums->gallery = $data['gallery'];
        $photoalbums->save();


        $photoalbums->save();
        return redirect('/photoalbums');

    }
}
