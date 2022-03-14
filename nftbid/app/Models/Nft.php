<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nft extends Model
{
    use HasFactory, Sluggable;
    protected $fillable=[
        'name',
        'description',
        'base_price',
        'img',
        'token_id',
        'token_standard',
        'blockchain_type',
        'metadata',
        'likes',
        'id_category',
        'id_user',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
