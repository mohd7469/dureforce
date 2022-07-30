<?php

use App\Models\Attribute;
use App\Models\EntityField;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEntityAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $entityAttributes = Attribute::all();
        $entityFields     = EntityField::all();

        foreach($entityFields as $key => $fields) {
            foreach($entityAttributes as $key => $attrs) {
                    if(trim($fields->name) === trim($attrs->title)) {
                        $attrs->update([
                            'entity_field_id' => $fields->id,
                        ]);
                    }
            }
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
