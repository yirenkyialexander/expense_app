<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //


    protected $fillable = [
        'name',
        'uique_code',
        'user_id',
        'category_id',
        'subcategory_id',
        'amount'
        
    ];

    public function user()
    {
        return $this->hasMany(Expense::class, 'user_id');
    }


}
