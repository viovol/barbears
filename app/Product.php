<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
      'title', 'description', 'img_url','price','category_id',
  ];
  protected $hidden = [
      'remember_token',
  ];
  public function category(){
  return $this->belongsTo("App\Category");
}

}
