<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Route;
use App\Models\Stop;
class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run()
    {
        // 创建多个路线示例
        foreach (range(1, 5) as $routeNumber) {
            $route = Route::create([
                'route_name' => 'Route ' . $routeNumber,
            ]);

            // 为每个路线创建 10 个站点
            foreach (range(1, 10) as $stopNumber) {
                Stop::create([
                    'route_id' => $route->id,
                    'stop_name' => 'Stop ' . $stopNumber,
                    'latitude' => 37.0 + ($stopNumber * 0.01), // 示例经纬度
                    'longitude' => -122.0 - ($stopNumber * 0.01),
                ]);
            }
        }
    }
    }

