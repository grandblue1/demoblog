<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\App;
use Illuminate\Pipeline\Pipeline;
use PO;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'price', 'fileName', 'published','image'];
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }


    public function userHasPurchased(User $user): bool {
        $purchased = $user->purchases()->where('product_id',$this->id)->first();
        return $purchased !== null;
        
    }


    public function scopeFiltered(Builder $query,?array $list = []) : Builder {
        
        return app(Pipeline::class)
            ->send($query)
            ->through($list ?? app(App::class)->filters())
            ->thenReturn();
    }
}
