<?php

use App\Models\Chapter;
use App\Models\CurriculamTemplate;
use App\Models\CurriculamTemplateItem;
use App\Models\Mentor;
use App\Models\Organizer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignIdFor(Chapter::class)->constrained();
            $table->foreignIdFor(Mentor::class)->constrained();
            $table->foreignIdFor(CurriculamTemplate::class)->constrained();
            $table->foreignIdFor(CurriculamTemplateItem::class)->constrained();
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
        Schema::dropIfExists('sessions');
    }
}
