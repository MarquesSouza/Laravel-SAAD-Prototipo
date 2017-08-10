<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AmbientRepository;
use App\Entities\Ambient;
use App\Validators\AmbientValidator;

/**
 * Class AmbientRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AmbientRepositoryEloquent extends BaseRepository implements AmbientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ambient::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
