<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
	public $table = 't_diary';

	protected $fillable = [
	'judul', 'keterangan'
	];
}
