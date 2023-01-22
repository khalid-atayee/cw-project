<?php

use App\Models\Chapter;
use App\Models\Grade;
use App\Models\Mentor;
use App\Models\Organizer;
use App\Models\Session;
use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('url');
            $table->foreignIdFor(Chapter::class)->constrained();
            $table->foreignIdFor(Student::class)->constrained();
            $table->foreignIdFor(Session::class)->constrained();
            $table->foreignIdFor(Mentor::class)->constrained();
            $table->foreignIdFor(Grade::class)->constrained();
            
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
        Schema::dropIfExists('assignments');
    }
}
