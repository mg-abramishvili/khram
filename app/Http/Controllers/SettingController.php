<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        return view('settings.edit', compact('settings'));
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
        if (request()->file('logo')) {
            $file = request()->file('logo');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);
        }
    }

    public function update(Request $request)
    {
        $data = request()->all();
        $settings = Setting::find($data['id']);

        $settings->theme = $data['theme'];
        $settings->orientation = $data['orientation'];
        $settings->title = $data['title'];

        if (isset($data['logo'])) {
            $settings->logo = $data['logo'];
        }

        if (isset($data['serial_key'])) {
            $settings->serial_key = $data['serial_key'];
        }

        $settings->module_news = $data['module_news'];
        $settings->module_photoalbums = $data['module_photoalbums'];
        $settings->module_videoalbums = $data['module_videoalbums'];
        $settings->module_routes = $data['module_routes'];
        $settings->module_reviews = $data['module_reviews'];

        if (isset($data['smtp_host'])) {
            $settings->smtp_host = $data['smtp_host'];
        } else {
			$settings->smtp_host = NULL;
		}
		
        if (isset($data['smtp_port'])) {
            $settings->smtp_port = $data['smtp_port'];
        } else {
			$settings->smtp_port = NULL;
		}
		
        if (isset($data['smtp_sec'])) {
            $settings->smtp_sec = $data['smtp_sec'];
        } else {
			$settings->smtp_sec = NULL;
		}
		
        if (isset($data['smtp_user'])) {
            $settings->smtp_user = $data['smtp_user'];
        } else {
			$settings->smtp_user = NULL;
		}
		
        if (isset($data['smtp_password'])) {
            $settings->smtp_password = $data['smtp_password'];
        } else {
			$settings->smtp_password = NULL;
		}
		
        if (isset($data['email_from'])) {
            $settings->email_from = $data['email_from'];
        } else {
			$settings->email_from = NULL;
		}
		
        if (isset($data['email_to'])) {
            $settings->email_to = $data['email_to'];
        } else {
			$settings->email_to = NULL;
		}

        $settings->save();

        return back();
    }

    public function activate(Request $request)
    {
        Artisan::call('migrate:fresh --seed');

        $data = request()->all();
        $settings = Setting::find($data['id']);

        if ($data['theme'] == 'default') {
            Artisan::call('db:seed --class=ContentShkolaSeeder');
        }
        if ($data['theme'] == 'vuz') {
            Artisan::call('db:seed --class=ContentShkolaSeeder');
        }
        if ($data['theme'] == 'detsad') {
            Artisan::call('db:seed --class=ContentShkolaSeeder');
        }
        if($data['theme'] == 'med') {
            Artisan::call('db:seed --class=ContentMedSeeder');
        }
        if ($data['theme'] == 'shkola') {
            Artisan::call('db:seed --class=ContentShkolaSeeder');
        }
        if ($data['theme'] == 'muzei') {
            Artisan::call('db:seed --class=ContentShkolaSeeder');
        }

        $settings->theme = $data['theme'];
        $settings->orientation = $data['orientation'];
        $settings->title = $data['title'];
        $settings->nta = $data['nta'];

        if (isset($data['logo'])) {
            $settings->logo = $data['logo'];
        }

        if (isset($data['serial_key'])) {
            $settings->serial_key = $data['serial_key'];
        }

        $settings->module_news = $data['module_news'];
        $settings->module_photoalbums = $data['module_photoalbums'];
        $settings->module_videoalbums = $data['module_videoalbums'];
        $settings->module_routes = $data['module_routes'];
        $settings->module_reviews = $data['module_reviews'];

        $settings->save();

        return 'OK';
    }
}
