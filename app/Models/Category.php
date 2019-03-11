<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 01 Mar 2019 12:57:51 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $nama_category
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $posts
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $table = 'category';

	protected $fillable = [
		'nama_category'
	];

	public function posts()
	{
		return $this->hasMany(\App\Models\Post::class, 'id_category');
	}
}
