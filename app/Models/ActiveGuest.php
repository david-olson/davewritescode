<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveGuest extends Model
{
    use HasFactory;

    protected $fillable = [
    	'code_id', 'expires_at', 'user_ip'
    ];

    protected $dates = ['expires_at'];

    public function code()
    {
    	return $this->belongsTo('App\AccessCode', 'code_id');
    }
}
