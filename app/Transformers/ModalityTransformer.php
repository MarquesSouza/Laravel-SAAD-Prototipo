<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Modality;

/**
 * Class ModalityTransformer
 * @package namespace App\Transformers;
 */
class ModalityTransformer extends TransformerAbstract
{

    /**
     * Transform the \Modality entity
     * @param \Modality $model
     *
     * @return array
     */
    public function transform(Modality $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
