<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Etude;
use App\Models\Universite;
use App\Models\Personnalite;
use Illuminate\Http\Request;
use App\Models\CentreInteret;

class DashboardController
{
    public function index(){

        return view('admin.dashboard.index');
    }
}
