<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    use HasFactory;

    protected $fillable = [
    	'label', 'mime', 'extension'
    ];

    // public function media()
    // {
    // 	// return $this->hasMany('App\Models\Media', 'type_id');
    // }
}
