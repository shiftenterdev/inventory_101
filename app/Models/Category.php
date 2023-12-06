<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'parent_id'];

    public function sub_category()
    {
        return $this->hasMany($this,'parent_id','id');
    }

    public function parent()
    {
        return $this->hasOne($this,'id','parent_id');
    }

    public function getProductCountAttribute()
    {
        return count($this->products);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_categories');
    }

    public function getFullCategoryAttribute()
    {
        if ($this->parent) {
            return $this->parent->title.' > '.$this->title;
        }else{
            return $this->title;
        }
    }
}
