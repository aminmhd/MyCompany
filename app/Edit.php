<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edit extends Model
{
    protected $table = 'edits';
    protected $primaryKey = 'edit_id';
    protected $guarded = ['edit_id'];

    public function image()
    {
        return $this->belongsTo(Image::class , 'edit_image_id');
    }
}
