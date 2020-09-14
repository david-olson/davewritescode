<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaGalleryController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function index(Request $request)
    {
    	$mediaQuery = Media::query();
    	$prependMain = collect();
    	if ($request->selected) {
    	    $selected = explode(',', $request->selected);
    	    $mediaQuery->where('id', '!=', $selected);
    	    $prependMain = Media::whereIn('id', $selected)->get();
    	}

    	$prepend = $prependMain;

    	$media = $mediaQuery->get();
    	return response()->json(view('admin.components.media.gallery', compact('media', 'prepend'))->render());
    }

    public function create(Request $request)
    {
    	$media_ids = $request->media_id;
    	$media = Media::whereIn('id', $media_ids)->get();

    	$field_name = $request->field_name;

    	$table_target = $request->table_target;
    	$limit = $request->limit;

    	return response()->json([
    	    'view' => view('admin.components.media.linked', compact('media', 'field_name', 'limit'))->render(),
    	    'table_target' => $table_target,
    	]);
    }
}
