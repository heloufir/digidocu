<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transition extends Model
{

    public $table = 'transitions';

    public $fillable = [
        'status_from_id',
        'status_to_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status_from_id' => 'integer',
        'status_to_id' => 'integer'
    ];

    /**
     * The attributes that should be always appended to object.
     *
     * @var array
     */
    protected $appends = [
        'status_from_name',
        'status_to_name'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status_from_id' => 'nullable|exists:statuses,id',
        'status_to_id' => 'required|exists:statuses,id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function statusFrom()
    {
        return $this->belongsTo(\App\Status::class, 'status_from_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function statusTo()
    {
        return $this->belongsTo(\App\Status::class, 'status_to_id', 'id');
    }

    public function getStatusFromNameAttribute() {
        return $this->status_from_id ? $this->statusFrom->name : '-';
    }

    public function getStatusToNameAttribute() {
        return $this->statusTo->name;
    }
}
