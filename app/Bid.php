<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Bid extends Model
{
    protected $fillable = [
    	'nickname', 'description','photo_before_url', 'photo_after_url', 'status', 'category_id', 'user_id', 'com'
    ];

    public function getStatus(){
    	if($this->status === 2)
    		return "Обработка данных";
    	if($this->status === 3)
    		return "Услуга оказана";
    	return 'Новая';
    }

    public function category(){
    	return $this->beLongsTo(Category::class);
    }
}
