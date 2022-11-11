<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    use HasFactory;

    protected $fillable = [
        'frequency',
    ];

    public function budgetItems()
    {
        return $this->hasMany(BudgetItem::class);
    }
}
