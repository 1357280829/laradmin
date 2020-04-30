<?php

namespace App\Models;

class Product extends Model
{
    protected $fillable = [
        'title', 'no', 'stock', 'type', 'size', 'color', 'buying_price', 'selling_price',
        'friend_price', 'lowest_price', 'image', 'remark'
    ];

    public static $types = [
        '外套' => '外套',
        '马甲' => '马甲',
        '套装' => '套装',
        '连衣裙' => '连衣裙',
        '开衫' => '开衫',
    ];
}
