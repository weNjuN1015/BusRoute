<?php

namespace Database\Seeders;
use App\Models\Route;
use App\Models\VehiclePosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiclePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 获取所有路线
        $routes = Route::all();

        // 为每条路线创建 10 条车辆位置记录
        foreach ($routes as $route) {
            foreach (range(1, 10) as $vehicleNumber) {
                VehiclePosition::create([
                    'route_id' => $route->id,
                    'latitude' => 37.0 + ($vehicleNumber * 0.005),
                    'longitude' => -122.0 - ($vehicleNumber * 0.005),
                ]);
            }
        }
    }
}
