<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AllocationRepository;
use App\Entities\Allocation;
use App\Validators\AllocationValidator;

/**
 * Class AllocationRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AllocationRepositoryEloquent extends BaseRepository implements AllocationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Allocation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
