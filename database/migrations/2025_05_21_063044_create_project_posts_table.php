<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('Project_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->text('git_url')->nullable();
            $table->text('project_url')->nullable();
            $table->string('image')->nullable();  // <-- image column added here
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Project_posts');
    }
};
