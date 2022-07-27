<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    // remove the need for timestamps if not needed (this to remove $table->timestamps() also from migration)
    public $timestamps = false;
    //mass assignment
    protected $fillable = [
        'user_id', 'address', 'phone', 'birth',
    ];

    // this help laravel determine to which table to model must link to if the name are weird of the plural is uncertain.
    // overwrite laravel convention of singular Model Name = plural table
    protected $table = 'users_details';


    // function to enact relations between models/tables in db
    //fx named after the other tab
    public function user(){
        //return $this->asOne() //in the tab WITHOUT foreign key
        return $this->belongsTo('App\Models\User'); //in the tab WITH foreign key
    }
}
