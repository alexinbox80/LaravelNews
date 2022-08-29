<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = "categories";

    public static $selectedFields = [
        'id',
        'title',
        'author',
        'description',
        'created_at'
    ];

    protected $fillable = [
        'title',
        'author',
        'image',
        'description'
    ];
}
