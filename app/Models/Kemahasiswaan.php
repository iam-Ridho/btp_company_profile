<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Kemahasiswaan extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'kemahasiswaan';

    protected $fillable = ['nama', 'judul', 'body'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }
}
