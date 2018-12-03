<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {
  /**
   * @var array
   */
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title', 'date', 'content'
  ];

  /**
   * @return mixed
   */
  public function authors() {
    return $this->belongsTo('App\Author', 'author_id');
  }

  /**
   * @return mixed
   */
  public function tags() {
    return $this->hasMany('App\Tag');
  }
}
