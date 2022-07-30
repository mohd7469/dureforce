<?php

namespace App\Traits;

use App\Helpers\DbHelper;
use App\Helpers\ArrayHelper;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait AppliesQueryParams
{
    /**
     * @param Request $request
     * @return callable
     */
    public function applyFilters(&$request): callable
    {
        return function (Builder $query) use (&$request) {

            $query->when($request->get('id'), function (Builder $query, $id) {
                return $query->where('id', (int)$id);
            });

            $query->when($request->get('category_id'), function (Builder $query, $categoryId) {
                if (ArrayHelper::isArray($categoryId)) {

                    return $query->whereIn('category_id', $categoryId);
                }
                return $query->where('category_id', (int)$categoryId);
            });
            $query->when($request->get('sub_category_id'), function (Builder $query, $categoryId) {

                if (ArrayHelper::isArray($categoryId)) {
                    return $query->whereIn('sub_category_id', $categoryId);
                }

                return $query->where('sub_category_id', (int)$categoryId);
            });

            // hotfix
            if (route('job') !== url()->current()) {
                $query->when($request->get('feature_id'), function (Builder $query, $featureId) {
                    return $query->where('featured', (int)$featureId);
                });
            }

            $query->when($request->get('title'), function (Builder $query, $title) {
                return $query->where('title', 'LIKE', "%{$title}%");
            });

            $query->when($request->get('prices'), function (Builder $query, $prices) {

                $prices = ArrayHelper::stringToArray($prices);

//                dd(explode("-", $prices));
                return $query->where('price', '<', $prices[1])
                    ->where('price', '>', $prices[0]);
            });

            $query->when($request->get('delivery_time'), function (Builder $query, $deliveryTime) {

                $deliveryTime = ArrayHelper::stringToArray($deliveryTime);

//                dd(explode("-", $prices));
                return $query->where('delivery_time', '>', $deliveryTime[1])
                    ->where('delivery_time', '<', $deliveryTime[0]);
            });


            $query->when($request->get('rating'), function (Builder $query, $rating) {

                $rating = ArrayHelper::stringToArray($rating);
//                dd($rating);
//                dd(explode("-", $prices));
                return $query->where('rating', '>=', $rating[0])
                    ->where('rating', '<=', $rating [1]);
            });
        };
    }


    /**
     * @param Request $request
     * @param string $default
     * @return string
     */
    public function getSortDirection(&$request, $default = 'asc'): string
    {
        $dir = $request->get('sortOrder', $default);

        return ArrayHelper::inArray($dir, ['desc', 'descend']) ? 'desc' : 'asc';
    }

    /**
     * @param Request $request
     * @param string $default
     * @return string
     */
    public function getSortField(&$request, $default = 'id'): ?string
    {
        return $request->get('sortField', $default);
    }
}
