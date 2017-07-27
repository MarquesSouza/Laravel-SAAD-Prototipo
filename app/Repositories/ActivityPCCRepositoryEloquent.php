<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ActivityPCCRepository;
use App\Entities\ActivityPCC;
use App\Validators\ActivityPCCValidator;

/**
 * Class ActivityPCCRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ActivityPCCRepositoryEloquent extends BaseRepository implements ActivityPCCRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ActivityPCC::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
