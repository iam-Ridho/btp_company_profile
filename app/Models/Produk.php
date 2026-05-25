<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Produk extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'produk';

    protected $fillable = ['nama', 'harga'];

    protected $casts = [
        'harga' => 'integer',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }
}
