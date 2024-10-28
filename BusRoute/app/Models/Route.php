<?php

// app/Models/Route.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['route_name'];

    /**
     * 获取此路线的所有站点
     */
    public function stops()
    {
        return $this->hasMany(Stop::class);
    }

    /**
     * 获取此路线的所有车辆位置
     */
    public function vehiclePositions()
    {
        return $this->hasMany(VehiclePosition::class);
    }
}
