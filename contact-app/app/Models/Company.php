<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    // By default, Mass Assignment is not allowed for security reasons in
    // tinker. i.e. no columns can me mass assigned by default. Adding this
    // $guarded property to your Model specifies, which columns are NOT mass
    // assignable. By leaving it blank, we'll be allowed to mass assign all
    // columns in the "companies" table. There is a drawback to this way
    // however. If you try to add a column that does not exist in the table (for
    // example 'contact'), you'll get a "Column not found: 1054 Unknown column
    // 'contact' in 'field list'" error.
    protected $guarded = [];
    // The $fillable property specifies which columns ARE mass assignable
    // through tinker. This will allow you to mass assign any column specified
    // in the array. If you try to add a column that does not exist in the table
    // (for example 'contact'), the additional columns will be skipped and only
    // the ones specified in the $fillable property will be added. 
    protected $fillable = [
        'name', 
        'address', 
        'email', 
        'website'
    ];



    // Define a Relationship Method **********************************
    // The name of the Method should be the name of the table to which this
    // Model will relate. i.e. Which table has the key you're talking about?
    // e.g. The 'companies' table has a one to many relationship to the
    // 'contacts' table; one Company can have many Contacts, but every Contact
    // can only have one Company. 
    // If you follow the naming convention, Laravel will automatically know
    // which column your talking about. In this case, it is the contact_id
    // foreignId specified in the 'create_contacts_table' Migration. If you do
    // not follow the naming convention, you will have to specify the name of
    // the column as the second argument to the hasMany() Method. 
    // You will also have to spell this out in the Contact Model. See that Model
    // for more details. 

    // This method will allow you to access a companies contacts.
    public function contacts() {
        return $this->hasMany(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
