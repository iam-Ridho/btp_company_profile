<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Dosen extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'dosen';

    protected $fillable = ['nama', 'nip'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->singleFile();
    }
}
