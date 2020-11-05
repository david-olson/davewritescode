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
    public function edit(Request $request, $media)
    {
        $media_item = Media::find($media);

        if ($request->ajax()) {
            return response()->json(view('admin.components.media.edit-modal', compact('media_item'))->render());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $media)
    {
        $media_item = Media::find($media);
        $media_item->update($request->only('name'));
        $field_name = $request->field_name;
        $limit = $request->limit;
        if (preg_match('/media\/*/', $request->headers->get('referer'))) {
            if ($request->ajax()) {
                return response()->json([
                    'view' => view('admin.components.media.table-row', ['media_item' => $media_item])->render(),
                ]);
            }
        }
        if ($request->ajax()) {
            return response()->json([
                'view' => view('admin.components.media.linked', ['media' => [$media_item], 'field_name' => $field_name, 'limit' => $limit])->render(),
            ]);
        }
    }

}
