<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Lab extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'lab';

    protected $fillable = ['nama', 'caption'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->singleFile();
    }
}
