<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'summary',
        'description',
        'main_ingredient',
        'ingredients',
        'image',
        'nutritional_value',
        'cost',
        'approval_status',
        'comments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


} 
