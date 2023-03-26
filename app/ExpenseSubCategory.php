<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseSubCategory extends Model
{
    //

    public function ExpenseSubCategory()
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }
}
