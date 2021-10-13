<?php

namespace App\Repositories;

use App\Status;

/**
 * Class StatusRepository
 * @package App\Repositories
 * @version October 13, 2021, 12:16 am IST
 */
class StatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Status::class;
    }
}
