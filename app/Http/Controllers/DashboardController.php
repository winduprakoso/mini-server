<?php

namespace App\Http\Controllers;

use Idev\EasyAdmin\app\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $title;
    private $generalUri;

    public function __construct()
    {
        $this->title = 'Dashboard';
        $this->generalUri = 'dashboard';
    }


    public function index()
    {
        $data['title'] = $this->title;

        return view('backend.idev.dashboard', $data);
    }

}