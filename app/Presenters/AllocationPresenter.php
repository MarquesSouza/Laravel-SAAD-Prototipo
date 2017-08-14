<?php

namespace App\Presenters;

use App\Transformers\AllocationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AllocationPresenter
 *
 * @package namespace App\Presenters;
 */
class AllocationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AllocationTransformer();
    }
}
