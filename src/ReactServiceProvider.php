<?php namespace AllanTatter\React;

use Illuminate\Support\ServiceProvider;

class ReactServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/config/config.php' => config_path('react.php'),
		]);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(
			__DIR__ . '/config/config.php', 'react'
		);

		$this->app['react'] = $this->app->share(function($app)
		{
			return $app->make('AllanTatter\React\React');
		});
	}
}
