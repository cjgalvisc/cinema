<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model{

	protected $table="ciudad";

	public function cinemas(){
		return $this->hasMany('App\Cinema','id_ciudad','id');
	}

}