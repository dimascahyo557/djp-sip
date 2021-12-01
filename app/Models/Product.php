<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi
    // protected $fillable = [

    // ];

    // Kolom yang tidak boleh diisi
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'product_id', 'id');
    }
}
