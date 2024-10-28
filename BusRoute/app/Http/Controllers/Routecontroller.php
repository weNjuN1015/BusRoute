<?php

namespace App\Http\Controllers;
use App\Models\Route;
use Illuminate\Http\Request;

class Routecontroller extends Controller
{
     /**
     * 获取所有路线及其站点信息
     */
    public function index()
    {
        // 获取所有路线并加载站点
        $routes = Route::with('stops')->get();
        return response()->json($routes);
    }

    /**
     * 获取特定路线的详细信息
     */
    public function show($id)
    {
        // 获取指定的路线及其站点
        $route = Route::with('stops')->findOrFail($id);
        return response()->json($route);
    }
}
