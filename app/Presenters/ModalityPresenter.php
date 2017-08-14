<?php

namespace App\Presenters;

use App\Transformers\ModalityTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ModalityPresenter
 *
 * @package namespace App\Presenters;
 */
class ModalityPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ModalityTransformer();
    }
}
