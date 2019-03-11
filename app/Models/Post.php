<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 01 Mar 2019 12:57:51 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Post
 * 
 * @property int $id
 * @property string $judul
 * @property string $post
 * @property int $id_category
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Category $category
 *
 * @package App\Models
 */
class Post extends Eloquent
{
	protected $casts = [
		'id_category' => 'int'
	];

	protected $fillable = [
		'judul',
		'post',
		'id_category'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class, 'id_category');
	}
}
