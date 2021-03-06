<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
   * The database table used by the model.
   *
   * @var string
   */

  protected $table = 'categories';

  /**
   * The attributes to be fillable from the model.
   *
   * A dirty hack to allow fields to be fillable by calling empty fillable array
   *
   * @var array
   */

  protected $fillable = [];
  protected $guarded = ['id'];

  /**
   * this function describe inverser many to many relationship with blog
   */
  public function blog()
  {
      return $this->belongsToMany(Blog::class);
  }
}
