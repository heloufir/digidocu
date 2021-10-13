<?php

namespace App\Repositories;

use App\Setting;
use App\Repositories\BaseRepository;
use App\Transition;

/**
 * Class TransitionRepository
 * @package App\Repositories
 * @version October 13, 2021, 11:28 am IST
*/

class TransitionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_from.name',
        'status_to.name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transition::class;
    }
}
