<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Site;
use App\Click;


class Page extends Model
{
    use SoftDeletes;
	
	protected $fillable=['page_full_url', 'sites_id'];
	
	
	public function site(){return $this->belongsTo(Site::class, 'sites_id', 'id');}
	public function click(){return $this->hasMany(Clicke::class, 'pages_id', 'id');}
	
	
}
