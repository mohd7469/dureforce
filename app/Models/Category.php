<?php

namespace App\Models;

use Database\Seeders\SkillCategorySeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class Category extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $fillable = ['name','status'];

    public static $Model_Name_Space = "App\Models\Category";
    public static $Redis_key = "categories";
    public static $Is_Active = 1;

    const ServiceType = 1;
    const SoftwareType = 2;
    const JobType = 3;
    const ACTIVE = 1;
    const DE_ACTIVE = 0;

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
    public function scopeWithAll($query){
        $query->with('subCategory')->with('deliverables');
    }
    public static function getByType(int $type)
    {
        return self::where('is_active', self::ACTIVE)->get();
    }

    public static function getSubCategories(int $categoryId)
    {
        return SubCategory::where('category_id', $categoryId)
            //->where('status', self::ACTIVE)
            ->get();
    }

    public function module()
    {
        return $this->hasOne(Module::class,'id','module_id');
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

    public function skill_categories()
    {
        return $this->belongsToMany(SkillCategory::class, 'category_attributes');
    }
    public function skill()
    {
        return $this->belongsToMany(Skills::class, 'category_attributes')->withPivot(['sub_category_id'])->with('skill_categories');
    }
    public function sub_categoires()
    {
        return $this->belongsToMany(SubCategory::class, 'category_attributes');
    }
    public function allDeliverables()
    {
        return $this->belongsToMany(Deliverable::class, 'deliverable_category');
    }
   
}
