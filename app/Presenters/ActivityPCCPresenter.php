<?php

namespace App\Presenters;

use App\Transformers\ActivityPCCTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ActivityPCCPresenter
 *
 * @package namespace App\Presenters;
 */
class ActivityPCCPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ActivityPCCTransformer();
    }
}
