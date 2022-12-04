<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class borrow extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeFilter($query, array $filters){
      
        $query->when($filters['search'] ?? false, function($query,$search){
            return $query->whereHas('book', function($query) use ($search){
                $query->where('name',$search);})
                ->orwhereHas('user', function($query) use ($search){
                    $query->where('name',$search);});
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class,'user_id','id');
    }


    public function book(): BelongsTo
    {
        return $this->belongsTo(book::class,'book_id','id');
    }

}
