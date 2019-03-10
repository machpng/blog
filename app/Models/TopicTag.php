<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TopicTag extends Pivot
{
    protected $table = 'topic_tgs';
}
