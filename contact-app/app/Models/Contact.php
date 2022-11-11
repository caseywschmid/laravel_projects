<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\FilterScope;
use App\Scopes\ContactSearchScope;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'phone', 
        'email', 
        'address',
        'company_id'
    ];

    public $filterColumns = ['company_id'];

    // Here is where you specify how the 'contacts' table is related to to the
    // 'companies' table. In this case, there is only one Company for each
    // Contact. Same as before, as long as you follow the naming convention,
    // Laravel will know what key you're talking about. 

    // This function will allow you to access a contacts company. 

    public function company() 
    {
        return $this->belongsTo(Company::class);
    }

    // This is a local scope function that defines frequently used DB queries.
    public function scopeLatestFirst($query){
        return $query->orderBy('id', 'desc');
    }


    protected static function booted()
    {
        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new ContactSearchScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
