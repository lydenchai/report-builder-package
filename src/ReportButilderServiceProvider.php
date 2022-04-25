<?php

namespace ReportBuilder\PageBuilder;

use Illuminate\Support\ServiceProvider;
use WebsiteBuilder\PageBuilder\Repositories\ReportButilderRepository;
use WebsiteBuilder\PageBuilder\Repositories\ReportButilderRepositoryInterface;

class ReportButilderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ReportButilderRepositoryInterface::class,
            ReportButilderRepository::class
        );
    }

    public function boot()
    {
        $this->registerPublishables();
    }

    protected function registerPublishables(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../Config/ReportButilder_config.php' => config_path(' ReportButilder_config.php'),
            ], 'config');
        }

        if (!class_exists('CreateReportButildersTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_report_butilders_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_report_butilders_table.php'),
            ], 'migrations');
        }
    }
}
