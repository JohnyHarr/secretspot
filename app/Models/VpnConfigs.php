<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpnConfigs extends Model
{
    use HasFactory;

    protected $fillable = [
        'aeza',
        'hostvds'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
