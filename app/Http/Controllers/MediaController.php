<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\MediaType;
use Illuminate\Http\Request;
use Auth;
use Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table_target_id = $request->table_target_id;
        $file = $request->file;
        $field_name = $request->field_name;
        $limit = $request->limit;
        $user = Auth::guard('web')->user();
        $type = MediaType::where('mime', $file->getMimeType())->first();
        if (is_object($file) && get_class($file) == 'Illuminate\Http\UploadedFile') {
            $saved_file = $file->store('media');
            if ($media_item = Media::create([
                'type_id' => $type->id,
                'path' => $saved_file
            ])) {
                // $media_item->generatePreviewImage();
                return response()->json([
                    'view' => view('admin.components.media.uploaded', compact('media_item', 'table_target_id', 'field_name', 'limit'))->render(),
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $media)
    {

        $media = Media::find($media);
        if ($request->size) {
            $size = explode('x', $request->size);
            $image = $media->getSizedImage($size[0], $size[1]);
        } else {
            $image = $media->getFullSizeImage();
        }

        if (is_object($image)) {
            return $image->response();
        }

        return Storage::get($image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}
