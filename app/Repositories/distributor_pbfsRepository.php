<?php

namespace App\Repositories;

use App\Models\distributor_pbfs;
use App\Repositories\BaseRepository;

/**
 * Class distributor_pbfsRepository
 * @package App\Repositories
 * @version October 16, 2024, 3:22 am UTC
*/

class distributor_pbfsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return distributor_pbfs::class;
    }
}
