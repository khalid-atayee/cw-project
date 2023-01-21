<?php

use App\Models\Chapter;
use App\Models\Mentor;
    use App\Models\Organizer;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

class CreateCurriculamTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('curriculam_templates', function (Blueprint $table) {
            $table->id();
            $table->string('module_name');
            $table->foreignIdFor(Chapter::class)->constrained();
            $table->json('mentor_ids');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculam_templates');
    }
}
