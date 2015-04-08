<?php namespace AllanTatter\React\Facades;

use Illuminate\Support\Facades\Facade;

class React extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'react'; }

}
