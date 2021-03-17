<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    /**
   * The database table used by the model.
   *
   * @var string
   */

  protected $table = 'blog_category';

  /**
   * The attributes to be fillable from the model.
   *
   * A dirty hack to allow fields to be fillable by calling empty fillable array
   *
   * @var array
   */

  protected $fillable = [];
  protected $guarded = ['id'];

}
