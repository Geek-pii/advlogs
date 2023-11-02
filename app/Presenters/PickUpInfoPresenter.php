<?php

namespace App\Presenters;

use App\Transformers\PickUpInfoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PickUpInfoPresenter.
 *
 * @package namespace App\Presenters;
 */
class PickUpInfoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PickUpInfoTransformer();
    }
}
