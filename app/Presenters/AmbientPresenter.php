<?php

namespace App\Presenters;

use App\Transformers\AmbientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AmbientPresenter
 *
 * @package namespace App\Presenters;
 */
class AmbientPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AmbientTransformer();
    }
}
