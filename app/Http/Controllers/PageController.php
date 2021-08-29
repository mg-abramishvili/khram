<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Page;
use App\Models\Icon;
use App\Models\Type;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $pages = Page::get();
        return view('pages.index', compact('pages', 'settings'));

    }

    public function create()
    {
        $settings = Setting::where('id', '1')->first();
        $parentlist = Page::all();
        $icons = Icon::all();
        $types = Type::all();
        return view('pages.create', compact('parentlist', 'icons', 'types', 'settings'));
    }

    public function edit($id)
    {
        $settings = Setting::where('id', '1')->first();
        $page = Page::find($id);
        $parentlist = Page::all();
        $icons = Icon::all();
        $types = Type::all();
        return view('pages.edit', compact('page', 'parentlist', 'icons', 'types', 'settings'));
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
        if (request()->file('pdf')) {
            $file = request()->file('pdf');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }
        if (request()->file('excel')) {
            $file = request()->file('excel');

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
        if (request()->file('video')) {
            $file = request()->file('video');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }


    }

    public function delete($id)
    {
        $pages = Page::find($id);
        $pages->delete();
        $pages->children()->delete();
        $pages->types()->detach();
        $pages->icons()->detach();
        return redirect('/pages');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'types' => 'required',
        ]);
        
        $data = request()->all();
        $pages = new Page();
        $pages->title = $data['title'];
        $pages->text = $data['text'];
        
        if (!isset($data['image'])) {
            $data['image'] = null;
        }
        $pages->image = $data['image'];

        $pages->image_as_icon = $data['image_as_icon'];

        if (!isset($data['gallery'])) {
            $data['gallery'] = [];
        }
        $pages->gallery = $data['gallery'];

        if (!isset($data['pdf'])) {
            $data['pdf'] = null;
        }
        $pages->pdf = $data['pdf'];

        if (!isset($data['excel'])) {
            $data['excel'] = null;
        }
        $pages->excel = $data['excel'];

        if (!isset($data['iframe'])) {
            $data['iframe'] = null;
        }
        $pages->iframe = $data['iframe'];

        if (!isset($data['video'])) {
            $data['video'] = null;
        }
        $pages->video = $data['video'];

        if (!isset($data['parent_id'])) {
            $data['parent_id'] = null;
        }
        $pages->parent_id = $data['parent_id'];
        
        $pages->save();
        $pages->types()->attach($request->types, ['page_id' => $pages->id]);
        $pages->icons()->attach($request->icons, ['page_id' => $pages->id]);
        return redirect('/pages');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $data = request()->all();
        $pages = Page::find($data['id']);
        $pages->title = $data['title'];
        $pages->text = $data['text'];

        if (!isset($data['image'])) {
            $data['image'] = null;
        }
        $pages->image = $data['image'];

        $pages->image_as_icon = $data['image_as_icon'];

        if (!isset($data['gallery'])) {
            $data['gallery'] = [];
        }
        $pages->gallery = $data['gallery'];

        if (!isset($data['pdf'])) {
            $data['pdf'] = null;
        }
        $pages->pdf = $data['pdf'];

        if (!isset($data['excel'])) {
            $data['excel'] = null;
        }
        $pages->excel = $data['excel'];

        if (!isset($data['iframe'])) {
            $data['iframe'] = null;
        }
        $pages->iframe = $data['iframe'];

        if (!isset($data['video'])) {
            $data['video'] = null;
        }
        $pages->video = $data['video'];

        if (!isset($data['parent_id'])) {
            $data['parent_id'] = null;
        }
        $pages->parent_id = $data['parent_id'];
        
        $pages->save();
        $pages->types()->detach();
        $pages->types()->attach($request->types, ['page_id' => $pages->id]);
        $pages->icons()->detach();
        $pages->icons()->attach($request->icons, ['page_id' => $pages->id]);
        return redirect('/pages');

    }

    public function summernoteUpload(Request $request) {
        $path = $request->file('image')->store('', 'uploads');
        return '/uploads/'.$path;
    }
}
