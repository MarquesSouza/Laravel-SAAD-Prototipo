<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PPCRepository;
use App\Entities\PPC;
use App\Validators\PPCValidator;

/**
 * Class PPCRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PPCRepositoryEloquent extends BaseRepository implements PPCRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PPC::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
