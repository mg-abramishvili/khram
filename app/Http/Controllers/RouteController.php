<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Setting;
use App\Models\Scheme;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $routes = Route::get();
        return view('routes.index', compact('routes', 'settings'));
    }

    public function create()
    {
        $settings = Setting::where('id', '1')->first();
        $schemes = Scheme::get();
        return view('routes.create', compact('schemes', 'settings'));
    }

    public function delete($id)
    {
        $routes = Route::find($id);
        $routes->delete();
        return redirect('/routes');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'scheme_id' => 'required',
            'title' => 'required',
            'x_01' => 'required',
        ]);

        $data = request()->all();
        $routes = new Route();
        $routes->title = $data['title'];
        $routes->scheme_id = $data['scheme_id'];
        $routes->scheme2_id = $data['scheme2_id'];
        $routes->t_1_begin = $data['t_1_begin'];
        $routes->t_1_end = $data['t_1_end'];
        $routes->t_2_begin = $data['t_2_begin'];
        $routes->t_2_end = $data['t_2_end'];
        $routes->x_01 = $data['x_01'];
        $routes->y_01 = $data['y_01'];
        $routes->p_x_01 = $data['p_x_01'];
        $routes->p_y_01 = $data['p_y_01'];
        $routes->x_02 = $data['x_02'];
        $routes->y_02 = $data['y_02'];
        $routes->p_x_02 = $data['p_x_02'];
        $routes->p_y_02 = $data['p_y_02'];
        $routes->x_03 = $data['x_03'];
        $routes->y_03 = $data['y_03'];
        $routes->p_x_03 = $data['p_x_03'];
        $routes->p_y_03 = $data['p_y_03'];
        $routes->x_04 = $data['x_04'];
        $routes->y_04 = $data['y_04'];
        $routes->p_x_04 = $data['p_x_04'];
        $routes->p_y_04 = $data['p_y_04'];
        $routes->x_05 = $data['x_05'];
        $routes->y_05 = $data['y_05'];
        $routes->p_x_05 = $data['p_x_05'];
        $routes->p_y_05 = $data['p_y_05'];
        $routes->x_06 = $data['x_06'];
        $routes->y_06 = $data['y_06'];
        $routes->p_x_06 = $data['p_x_06'];
        $routes->p_y_06 = $data['p_y_06'];
        $routes->x_07 = $data['x_07'];
        $routes->y_07 = $data['y_07'];
        $routes->p_x_07 = $data['p_x_07'];
        $routes->p_y_07 = $data['p_y_07'];
        $routes->x_08 = $data['x_08'];
        $routes->y_08 = $data['y_08'];
        $routes->p_x_08 = $data['p_x_08'];
        $routes->p_y_08 = $data['p_y_08'];
        $routes->x_09 = $data['x_09'];
        $routes->y_09 = $data['y_09'];
        $routes->p_x_09 = $data['p_x_09'];
        $routes->p_y_09 = $data['p_y_09'];
        $routes->x_10 = $data['x_10'];
        $routes->y_10 = $data['y_10'];
        $routes->p_x_10 = $data['p_x_10'];
        $routes->p_y_10 = $data['p_y_10'];
        $routes->x_11 = $data['x_11'];
        $routes->y_11 = $data['y_11'];
        $routes->p_x_11 = $data['p_x_11'];
        $routes->p_y_11 = $data['p_y_11'];
        $routes->x_12 = $data['x_12'];
        $routes->y_12 = $data['y_12'];
        $routes->p_x_12 = $data['p_x_12'];
        $routes->p_y_12 = $data['p_y_12'];
        $routes->x_101 = $data['x_101'];
        $routes->y_101 = $data['y_101'];
        $routes->p_x_101 = $data['p_x_101'];
        $routes->p_y_101 = $data['p_y_101'];
        $routes->x_102 = $data['x_102'];
        $routes->y_102 = $data['y_102'];
        $routes->p_x_102 = $data['p_x_102'];
        $routes->p_y_102 = $data['p_y_102'];
        $routes->x_103 = $data['x_103'];
        $routes->y_103 = $data['y_103'];
        $routes->p_x_103 = $data['p_x_103'];
        $routes->p_y_103 = $data['p_y_103'];
        $routes->x_104 = $data['x_104'];
        $routes->y_104 = $data['y_104'];
        $routes->p_x_104 = $data['p_x_104'];
        $routes->p_y_104 = $data['p_y_104'];
        $routes->x_105 = $data['x_105'];
        $routes->y_105 = $data['y_105'];
        $routes->p_x_105 = $data['p_x_105'];
        $routes->p_y_105 = $data['p_y_105'];
        $routes->x_106 = $data['x_106'];
        $routes->y_106 = $data['y_106'];
        $routes->p_x_106 = $data['p_x_106'];
        $routes->p_y_106 = $data['p_y_106'];
        $routes->x_107 = $data['x_107'];
        $routes->y_107 = $data['y_107'];
        $routes->p_x_107 = $data['p_x_107'];
        $routes->p_y_107 = $data['p_y_107'];
        $routes->x_108 = $data['x_108'];
        $routes->y_108 = $data['y_108'];
        $routes->p_x_108 = $data['p_x_108'];
        $routes->p_y_108 = $data['p_y_108'];
        $routes->x_109 = $data['x_109'];
        $routes->y_109 = $data['y_109'];
        $routes->p_x_109 = $data['p_x_109'];
        $routes->p_y_109 = $data['p_y_109'];
        $routes->x_110 = $data['x_110'];
        $routes->y_110 = $data['y_110'];
        $routes->p_x_110 = $data['p_x_110'];
        $routes->p_y_110 = $data['p_y_110'];
        $routes->x_111 = $data['x_111'];
        $routes->y_111 = $data['y_111'];
        $routes->p_x_111 = $data['p_x_111'];
        $routes->p_y_111 = $data['p_y_111'];
        $routes->x_112 = $data['x_112'];
        $routes->y_112 = $data['y_112'];
        $routes->p_x_112 = $data['p_x_112'];
        $routes->p_y_112 = $data['p_y_112'];
        $routes->save();
        return redirect('/routes');
    }
}
