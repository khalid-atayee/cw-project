<?php

use App\Models\Chapter;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->boolean('gender');
            $table->date('dob');
            $table->string('location');
            $table->string('email');
            $table->char('phone',20);
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Chapter::class)->constrained()->onDelete('no action')->onUpdate('cascade');
            $table->text('inroduction');
            $table->text('experiance_educationLevel');
            $table->boolean('payment')->default(false);
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
        Schema::dropIfExists('students');
    }
}
