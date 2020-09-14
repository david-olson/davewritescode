<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSection extends Model
{
    use HasFactory;

    protected $fillable = [
    	'title', 'project_id', 'type', 'media_id', 'content'
    ];

    public function project()
    {
    	return $this->belongsTo('App\Models\Project');
    }

    public function media()
    {
    	return $this->belongsTo('App\Models\Media');
    }


}
