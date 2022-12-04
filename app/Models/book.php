<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class book extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the auther that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function scopeFilter($query, array $filters){
      
        $query->when($filters['search'] ?? false, function($query,$search){
            return $query->where('name','like','%'. $search.'%')
                        ->orwhereHas('auther', function($query) use ($search){
                            $query->where('name',$search);})
                        ->orwhereHas('publisher', function($query) use ($search){
                            $query->where('name',$search);});
        });

        $query->when($filters['auther'] ?? false, function($query, $auther){
            return $query->whereHas('auther', function($query) use ($auther){
                $query->where('name',$auther);
            });
        });
        
        $query->when($filters['publisher'] ?? false, function($query, $publisher){
            return $query->whereHas('publisher', function($query) use ($publisher){
                $query->where('name',$publisher);
            });
        });
    }

    public function auther(): BelongsTo
    {
        return $this->belongsTo(auther::class,'auther_id','id');
    }

    /**
     * Get the category that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    /**
     * Get the publisher that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(publisher::class);
    }
    
    public function status(): BelongsTo
    {
        return $this->belongsTo(status::class,'status_id','id');
    }

}
