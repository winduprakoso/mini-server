<?php

namespace App\Http\Controllers;

use App\Events\ActionEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SampleSocketController extends Controller
{

    public function index()
    {
        return view('sampel-socket');
    }

    public function submit(Request $request)
    {
        $name = $request->name;

        $response = Http::post('http://127.0.0.1:3000/update-monitor', [
            'name' => $name
        ]);

        return $response;
    }
}
