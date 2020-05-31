<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbilityRole extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ability_roles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id', 'ability_id'];

    
}
