<?php

namespace App\Providers\Services;

use App\Services\AccountService;
use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
{
	//protected $defer = true;

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{

	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register(): void
	{
		$this->app->singleton(AccountService::class, function ($app) {
			return new AccountService($app->make('App\Repositories\AccountRepository'));
		});
	}
}
