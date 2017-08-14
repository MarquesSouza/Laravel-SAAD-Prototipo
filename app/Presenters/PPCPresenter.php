<?php

namespace App\Presenters;

use App\Transformers\PPCTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PPCPresenter
 *
 * @package namespace App\Presenters;
 */
class PPCPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PPCTransformer();
    }
}
