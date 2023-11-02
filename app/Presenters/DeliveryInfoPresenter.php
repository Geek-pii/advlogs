<?php

namespace App\Presenters;

use App\Transformers\DeliveryInfoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DeliveryInfoPresenter.
 *
 * @package namespace App\Presenters;
 */
class DeliveryInfoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DeliveryInfoTransformer();
    }
}
