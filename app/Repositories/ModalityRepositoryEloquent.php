<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ModalityRepository;
use App\Entities\Modality;
use App\Validators\ModalityValidator;

/**
 * Class ModalityRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ModalityRepositoryEloquent extends BaseRepository implements ModalityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Modality::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
