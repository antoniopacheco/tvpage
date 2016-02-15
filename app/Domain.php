<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
	public function getpagesCountAttribute(){

		   $pages =  $this->hasMany('App\Page')->count();
		   $pages = ($pages) ? (int) $pages : 0;
		  	return $pages;
	}
}
