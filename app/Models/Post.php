<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Post extends Model
{
    use HasFactory;
    protected $fillable=['user_id','title','body'];
    public function comments() {

         return $this->hasMany(Comment::class);
    }

    public function addComment($body) {

        $this->comments()->create(compact('body'));

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function scopeFilter($query, $filters){
        if ($month = @$filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = @$filters['year']) {
            $query->whereYear('created_at',$year);
        }

    }

    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get();
    }

    public function tags(){

       return $this->belongsToMany(Tag::class);
    }


}
