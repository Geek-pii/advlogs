<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\DeliveryInfo;

/**
 * Class DeliveryInfoTransformer.
 *
 * @package namespace App\Transformers;
 */
class DeliveryInfoTransformer extends TransformerAbstract
{
    /**
     * Transform the DeliveryInfo entity.
     *
     * @param \App\Models\DeliveryInfo $model
     *
     * @return array
     */
    public function transform(DeliveryInfo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
