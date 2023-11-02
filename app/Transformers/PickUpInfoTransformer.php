<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PickUpInfo;

/**
 * Class PickUpInfoTransformer.
 *
 * @package namespace App\Transformers;
 */
class PickUpInfoTransformer extends TransformerAbstract
{
    /**
     * Transform the PickUpInfo entity.
     *
     * @param \App\Models\PickUpInfo $model
     *
     * @return array
     */
    public function transform(PickUpInfo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
