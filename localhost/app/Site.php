<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Page;


class Site extends Model
{
	use SoftDeletes;
	
	protected $fillable=['site_domain'];
	

	
	public function page(){return $this->hasMany(Page::class, 'sites_id', 'id');}


}
