<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class books extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "books";
    protected $guarded = [];
    public function author()
    {
        return $this->belongsTo('App\Models\authors','author_id','id');
    }
    
    protected $dates = [ 'deleted_at' ];
}
