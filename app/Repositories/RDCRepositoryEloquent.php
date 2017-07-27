<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RDCRepository;
use App\Entities\RDC;
use App\Validators\RDCValidator;

/**
 * Class RDCRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RDCRepositoryEloquent extends BaseRepository implements RDCRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RDC::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
