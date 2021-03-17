<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
   * The database table used by the model.
   *
   * @var string
   */

  protected $table = 'blogs';

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
   * add user inserted blog into database
   */
  public function addBlogData($request, $userId)
  {
      return Blog::create([
          'user_id' => $userId,
          'blog_title' => $request['title'],
          'blog_content' => $request['content']
      ]);
  }

  /**
   * this function describe inverse relationship between blog and user
   */
  public function user()
  {
      return $this->belongsTo(User::class);
  }

  /**
   * this function describe many to many relationsip of blog with category
   */
  public function categories()
  {
      return $this->belongsToMany(Category::class, 'blog_category');
  }
}
