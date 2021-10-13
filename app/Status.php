<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    public $table = 'statuses';

    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transitionFrom()
    {
        return $this->hasMany(\App\Transition::class, 'status_from_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transitionTo()
    {
        return $this->hasMany(\App\Transition::class, 'status_to_id', 'id');
    }
}
