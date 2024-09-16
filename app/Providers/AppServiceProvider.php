<?php declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

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
        Model::preventLazyLoading(!$this->app->isProduction());
        Model::preventSilentlyDiscardingAttributes();
        Model::preventAccessingMissingAttributes();

        Builder::morphUsingUuids();

        Relation::enforceMorphMap([
//            'shift_managers' => App\Models\ShiftManager::class,
//            'worker_shifts' => App\Models\WorkerShift::class,
//            'shifts' => App\Models\Shift::class,
        ]);
    }
}
