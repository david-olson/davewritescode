<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessCode extends Model
{
    use HasFactory;

    protected $fillable = [
    	'code'
    ];

    public function guests()
    {
    	return $this->hasMany('App\Models\ActiveGuest', 'code_id');
    }

    public function getLastUsedAttribute()
    {
    	$lastUse = $this->guests()->latest()->first();

    	if ($lastUse) {
    		return $lastUse->created_at;
    	}

    	return null;
    }
}
