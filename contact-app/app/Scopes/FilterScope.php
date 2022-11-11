<?php

namespace App\Scopes;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


// Writing the scope this way allows you to use it two different ways: 
// First:
// 1. Create a class that extends FilterScope
    // class ContactFilterScope extends FilterScope {}
// 2. Define the filter columns in filterColumns property
    // protected @filterColumns = ['company_id']
// 3. Add the class in the model as a global scope.
    // static::addGlobalScope(new ContactFilterScope);
// Second:
// 1. Assign the FilterScope in the model as a global scope
    // static::addGlobalScope(new FilterScope);
    // class Contact extends Model {}
// 2. Defind the filter columns in filterColumns property
    // protected @filterColumns = ['company_id']
    
class FilterScope implements Scope 
{
    protected $filterColumns = [];

    public function apply(Builder $builder, Model $model){
        $columns = property_exists($model, 'filterColumns') ? $model->filterColumns : $this->filterColumns;
        foreach ($columns as $column){
            if ($value = request($column)) {
            $builder->where($column, $value);
            }
        }
    }
}



 