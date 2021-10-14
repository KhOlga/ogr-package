<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Gravatar API credentials
	|--------------------------------------------------------------------------
	|
	| This is the credentials for Gravatar API service.
	|
	*/

	'host' => env('GRAVATAR_API_HOST'),
	'key' => env('GRAVATAR_API_KEY', ''),

	/*
	|--------------------------------------------------------------------------
	| OgrPackage directory and file names
	|--------------------------------------------------------------------------
	|
	| This part contains default path and names of files
	| that will be used for storing avatars. You may need to
	| customize the path and names of files.
	| You may change the path and names of files as you need it.
	|
	*/

	'path' => env('OGR_PACKAGE_FILE_PATH', 'public/ogr_images'),
	'file' => env('OGR_PACKAGE_FILE_NAME', 'ogr'),

	/*
	|--------------------------------------------------------------------------
	| OgrPackage Models
	|--------------------------------------------------------------------------
	|
	| You may set yours model's name if it is necessary. For example
	|
	*/

	'models' => [

		'metric' => Okh\OgrPackage\Models\Metric::class,
	],

	/*
	|--------------------------------------------------------------------------
	| OgrPackage table names
	|--------------------------------------------------------------------------
	|
	| When using the OgrPackage trait from this package, we need to know which
	| table should be used to retrieve your data. We have chosen a basic
    | default value,  but you may easily change it to any table you like.
	|
	*/

	'table_names' => [
		'metrics' => 'metrics',
		'users_metrics' => 'users_metrics'
	],

	/*
	|--------------------------------------------------------------------------
	| OgrPackage column  names
	|--------------------------------------------------------------------------
	|
	| Change this if you want to name the related model primary key other than
	| `user_id`.
	|
	*/

	'column_name' => [
		'user_id' => 'user_id',
	],
];
