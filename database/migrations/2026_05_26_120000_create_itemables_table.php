<?php

use App\Models\Module;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itemables', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Module::class)->constrained()->cascadeOnDelete();
            $table->morphs('itemable');
            $table->unsignedInteger('order')->default(1);
            $table->timestamps();

            $table->index(['module_id', 'order']);
            $table->unique(['itemable_type', 'itemable_id']);
        });

        if (Schema::hasColumn('modules', 'itemable_type') && Schema::hasColumn('modules', 'itemable_id')) {
            $now = now();

            $moduleItems = DB::table('modules')
                ->select('id', 'itemable_type', 'itemable_id')
                ->whereNotNull('itemable_type')
                ->whereNotNull('itemable_id')
                ->get();

            foreach ($moduleItems as $moduleItem) {
                DB::table('itemables')->insert([
                    'module_id' => $moduleItem->id,
                    'itemable_type' => $moduleItem->itemable_type,
                    'itemable_id' => $moduleItem->itemable_id,
                    'order' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            Schema::table('modules', function (Blueprint $table) {
                $table->dropMorphs('itemable');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('modules', 'itemable_type') && ! Schema::hasColumn('modules', 'itemable_id')) {
            Schema::table('modules', function (Blueprint $table) {
                $table->nullableMorphs('itemable');
            });
        }

        if (Schema::hasTable('itemables')) {
            $moduleItems = DB::table('itemables')
                ->select('module_id', 'itemable_type', 'itemable_id')
                ->get();

            foreach ($moduleItems as $moduleItem) {
                DB::table('modules')
                    ->where('id', $moduleItem->module_id)
                    ->update([
                        'itemable_type' => $moduleItem->itemable_type,
                        'itemable_id' => $moduleItem->itemable_id,
                    ]);
            }
        }

        Schema::dropIfExists('itemables');
    }
};
