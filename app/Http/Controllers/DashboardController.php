<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
class DashboardController extends Controller
{
    public function index()
    {
    	return Inertia::render('Dashboard',[
    		'filters' => \Request::all('search'),
    		'posts' => Post::where('user_id',auth()->id())
    			->orWhere('is_public',1)
    			->filter(\Request::only('search'))
    			->orderBy('id', 'DESC')
    			->paginate(10)
    			->withQueryString()
    	]);
    }
}
