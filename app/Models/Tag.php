<?php

namespace App\Models;

use App\Models\Traits\TagsListHelp;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use TagsListHelp;

    protected $fillable = ['name', 'weigth'];

}
