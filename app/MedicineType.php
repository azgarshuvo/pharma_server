<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medicine_types';

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
    protected $fillable = ['name', 'details'];

    public function medicines()
    {
        return $this->hasMany('App\Medicine');
    }
    
}
