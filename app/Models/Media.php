<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;
use Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name', 'caption', 'alt', 'path', 'type_id'
    ];

    public function mediaType()
    {
    	return $this->belongsTo('App\Models\MediaType', 'type_id');
    }

    public function getFilenameAttribute()
    {
        $filename = basename($this->path);
        return $filename;
    }

    public function getFullSizeImage()
    {
        if (in_array($this->mediaType->mime, ['image/jpeg', 'image/png'])) {
            $image = Image::cache(function($image) {
                $image->make(storage_path('app/' . $this->path));
                if (in_array($this->mediaType->extension, ['png', 'jpg'])) {
                    $image->encode($this->mediaType->extension);
                }
            }, 365*60*24, true);
        } elseif($this->mediaType->mime == 'image/webp') {
            $image = Image::make(storage_path('app/' . $this->path));
        } else {
            $image = $this->getPreviewImage();
        }

        return $image;
    }

    public function generatePreviewImage()
    {
        if (in_array($this->mediaType->extension, ['xlsx', 'csv', 'txt'])) {
            copy(public_path('images/admin/file-thumbnail.jpg'), storage_path('app/preview-images/media/' . $this->id . '.jpg'));
        } else {
            $im = new \imagick(storage_path('app/' . $this->path . '[0]'));
            $im->setBackgroundColor('white');
            $im->setImageFormat('jpg');
            $im->thumbnailImage(800, 0);
            $im->setImageAlphaChannel(\imagick::VIRTUALPIXELMETHOD_WHITE);
            $im->writeImage(storage_path('app/preview-images/media/' . $this->id . '.jpg'));
        }
    }

    public function getPreviewImage()
    {
        $filename = $this->id . '.jpg';
        $path = 'app/preview-images/media/' . $filename;
        if (file_exists(storage_path($path))) {
            $image = Image::cache(function($image) use ($path) {
                $image->make(storage_path($path));
            }, 365*60*24, true);
        } else {
            $this->generatePreviewImage();
            $image = Image::cache(function($image) use ($path) {
                $image->make(storage_path($path));
            }, 365*60*24, true);
        }


        return $image;
    }

    public function getSizedImage($width, $height)
    {
        $image_path = 'app/preview-images/' . $this->id . '-size-' . $width . 'x' . $height . '.jpg';
        if (file_exists(storage_path($image_path))) {
            $image = Image::cache(function($img) use ($image_path) {
                $img->make(storage_path($image_path));
                if (in_array($this->mediaType->extension, ['png', 'jpg'])) {
                    $img->encode($this->mediaType->extension);
                }
            }, 365*60*24, true);
            // $image = Image::make(storage_path($image_path));
        } else {
            $image = $this->makeSizedImage($width, $height);
        }

        return $image;

    }

    public function makeSizedImage($width, $height, $from = null)
    {
        ini_set('memory_limit', '256M');

        $image_path = 'app/preview-images/' . $this->id . '-size-' . $width . 'x' . $height . '.jpg';

        $image = $this->getFullSizeImage();
        $image->fit($width, $height, function($constraint) {
            // $constraint->upsize();
        }, $from);
        $image->save(storage_path($image_path));

        return $image;
    }
}
