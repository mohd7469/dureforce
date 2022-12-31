<?php

namespace App\Observers;

use App\Helpers\ArrayHelper;
use App\Models\Frontend;
use App\Models\Service;
use App\Models\Software\Software;
use App\Models\Tag;
use App\Models\TagsAssociate;

class TagsObserver
{

    public function updating($service)
    {
        $this->hasTagColumn($service);

    }

    public function created($service)
    {
        $this->hasTagColumn($service);
    }

    private function hasTagColumn($service)
    {
        if (!empty($service->tag)) {

            $this->createOrUpdateTags($service);

            $type = $this->getType($service);
            $tagAssociateData = Tag::whereIn("name", $service->tag)->get()->map(function (Tag $tag) use ($type, $service) {
                return [
                    'tag_id' => $tag->id,
                    'model_id' => $service->id,
                    'model_type' => $type
                ];
            })->all();

            TagsAssociate::where(['model_id' => $service->id,
                'model_type' => $type])->delete();

            TagsAssociate::insert($tagAssociateData);
        }
    }


    private function createOrUpdateTags($service)
    {

        $existentTags = Tag::whereIn("name", $service->tag)->get();
        $existentTagsId = $existentTags->pluck("id")->all();

        $existentTagsName = $existentTags->pluck("name")->all();

        $newTags = [];

        collect($service->tag)->each(function ($tag) use ($existentTagsName, &$newTags) {

            if (!ArrayHelper::inArray($tag, $existentTagsName)) {
                $newTags[] = ['name' => $tag];
            }

        });

        Tag::insert($newTags);

    }

    private function getType($service)
    {
        if ($service instanceof Service) {
            return Tag::TAG_TYPE_SERVICE;
        } else if ($service instanceof Software) {
            return Tag::TAG_TYPE_SOFTWARE;
        } else if ($service instanceof Frontend) {
            return Tag::TAG_TYPE_BLOG;
        }
    }
}
