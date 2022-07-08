<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Category extends Model
{
    use HasFactory;

    const ServiceType = 1;
    const SoftwareType = 2;
    const JobType = 3;
    const ACTIVE = 1;
    const DE_ACTIVE = 0;

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    public static function getByType(int $type)
    {
        return self::where('type_id', $type)->where('status', self::ACTIVE)->get();
    }

    public static function getSubCategories(int $categoryId)
    {
        return SubCategory::where('category_id', $categoryId)
//            ->where('status', self::ACTIVE)
            ->get();
    }

    public static function types(): array
    {
        return [

            ['name' => 'Software', 'id' => self::SoftwareType],
            ['name' => 'Services', 'id' => self::ServiceType],
            ['name' => 'Job', 'id' => self::JobType],
        ];
    }

    public static function groupByType()
    {

        return self::get()
            ->groupBy(function (Category $category) {
                return self::getTypeNameById($category->type_id);
            });
    }

    public static function getTypeNameById(int $typeId)
    {
        $types = self::types();
        $index = array_search($typeId, array_column(self::types(), 'id'));

        if ($index !== false) {
            return $types[$index]['name'];
        }
    }
}
