<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();

        Relation::morphMap([
            'course' => \App\Models\Course::class,
            'module' => \App\Models\Module::class,
            'course_objective' => \App\Models\CourseObjective::class,
            'module_objective' => \App\Models\ModuleObjective::class,
            'page' => \App\Models\Page::class,
            'quiz' => \App\Models\Quiz::class,
            'assignment' => \App\Models\Assignment::class,
            'discussion' => \App\Models\Discussion::class,
            'question' => \App\Models\Question::class,
            'question_option' => \App\Models\QuestionOption::class,
        ]);
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
