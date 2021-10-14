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
];
