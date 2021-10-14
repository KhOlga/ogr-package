<?php

namespace Okh\OgrPackage;

use Illuminate\Support\ServiceProvider;

class OgrPackageServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any package services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/../config/ogr.php' => config_path('ogr.php')
		], 'ogr-config');
	}

	public function register()
	{
		$this->app->singleton(OgrPackage::class, function () {
			return new OgrPackage();
		});
	}
}