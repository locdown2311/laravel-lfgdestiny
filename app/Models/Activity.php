<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','category_id','horario','qtd_jogadores','observacao'];
    protected $table = "activity";
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
