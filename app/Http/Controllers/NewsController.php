<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $news = News::get();
        return view('news.index', compact('news', 'settings'));

    }

    public function create()
    {
        $settings = Setting::where('id', '1')->first();
        return view('news.create', compact('settings'));

    }

    public function edit($id)
    {
        $settings = Setting::where('id', '1')->first();
        $news = News::find($id);
        return view('news.edit', compact('news', 'settings'));


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
        $news = News::find($id);
        $news->delete();
        return redirect('/news');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);

        $data = request()->all();
        $news = new News();
        $news->title = $data['title'];
        $news->text = $data['text'];
        if (isset($data['image'])) {
            $news->image = $data['image'];
        }
        $news->save();
        return redirect('/news');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);

        $data = request()->all();
        $news = News::find($data['id']);
        $news->title = $data['title'];
        $news->text = $data['text'];
        if (isset($data['image'])) {
            $news->image = $data['image'];
        } else {
            $news->image = NULL;
        }
        $news->save();
        return redirect('/news');
    }
}
