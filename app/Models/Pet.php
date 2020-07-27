<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /**
     * Attributes changeable by the user
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'age', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
