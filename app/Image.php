<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
    protected $guarded = ['image_id'];
    protected $primaryKey = 'image_id';
    protected $dates = ['deleted_at'];

    public function edit()
    {
        return $this->hasOne(Edit::class , 'edit_image_id');
    }

}
