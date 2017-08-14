<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\RDC;

/**
 * Class RDCTransformer
 * @package namespace App\Transformers;
 */
class RDCTransformer extends TransformerAbstract
{

    /**
     * Transform the \RDC entity
     * @param \RDC $model
     *
     * @return array
     */
    public function transform(RDC $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
