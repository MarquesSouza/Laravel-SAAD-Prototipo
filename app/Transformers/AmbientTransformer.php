<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Ambient;

/**
 * Class AmbientTransformer
 * @package namespace App\Transformers;
 */
class AmbientTransformer extends TransformerAbstract
{

    /**
     * Transform the \Ambient entity
     * @param \Ambient $model
     *
     * @return array
     */
    public function transform(Ambient $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
