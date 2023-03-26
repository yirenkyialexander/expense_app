<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
public function User()
    {
return $this->hasMany(ExpenseSubCategory::class, 'user_id');
    }

}
