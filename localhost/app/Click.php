<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Page;


class Click extends Model
{
    use SoftDeletes;

	protected $fillable=['pages_id', 'x_coord', 'y_coord', 'year', 'month', 'day', 'hour', 'minute', 'second'];

	public function page(){return $this->belongsTo(Page::class, 'pages_id', 'id');}

}
