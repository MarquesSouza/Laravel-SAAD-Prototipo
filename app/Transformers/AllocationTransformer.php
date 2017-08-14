<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Allocation;

/**
 * Class AllocationTransformer
 * @package namespace App\Transformers;
 */
class AllocationTransformer extends TransformerAbstract
{

    /**
     * Transform the \Allocation entity
     * @param \Allocation $model
     *
     * @return array
     */
    public function transform(Allocation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
