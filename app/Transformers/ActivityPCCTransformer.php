<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ActivityPCC;

/**
 * Class ActivityPCCTransformer
 * @package namespace App\Transformers;
 */
class ActivityPCCTransformer extends TransformerAbstract
{

    /**
     * Transform the \ActivityPCC entity
     * @param \ActivityPCC $model
     *
     * @return array
     */
    public function transform(ActivityPCC $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
