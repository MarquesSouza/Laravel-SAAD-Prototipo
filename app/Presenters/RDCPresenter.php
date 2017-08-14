<?php

namespace App\Presenters;

use App\Transformers\RDCTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RDCPresenter
 *
 * @package namespace App\Presenters;
 */
class RDCPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RDCTransformer();
    }
}
