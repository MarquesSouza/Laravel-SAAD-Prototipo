<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\PPC;

/**
 * Class PPCTransformer
 * @package namespace App\Transformers;
 */
class PPCTransformer extends TransformerAbstract
{

    /**
     * Transform the \PPC entity
     * @param \PPC $model
     *
     * @return array
     */
    public function transform(PPC $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
