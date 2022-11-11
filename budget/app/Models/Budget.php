<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    public static function oldCategory(BudgetItem $item)
    {
        $selectedCategory = ExpenseCategory::where('id', $item->category_id)->get();
        return $selectedCategory[0]->expense_category_name;
    }
    
    public static function oldFrequency(BudgetItem $item)
    {
        $selectedFrequency = Frequency::where('id', $item->frequency_id)->get();
        return $selectedFrequency[0]->frequency;
    }



}
