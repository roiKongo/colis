<?php




Route::group(['prefix' => 'install', 'as' => 'Installer::', 'middleware' => ['web', 'install']], function () {

    Route::get('/', [
            'as'   => 'welcome',
            'uses' => 'InstallerController@welcome',
    ]);

    Route::get('environment', [
            'as'   => 'environment',
            'uses' => 'InstallerController@environment',
    ]);

    Route::get('environment/wizard', [
            'as'   => 'environmentWizard',
            'uses' => 'InstallerController@environmentWizard',
    ]);

    Route::post('environment/database', [
            'as'   => 'environmentDatabase',
            'uses' => 'InstallerController@saveDatabase',
    ]);


    Route::get('requirements', [
            'as'   => 'requirements',
            'uses' => 'InstallerController@requirements',
    ]);

    Route::get('permissions', [
            'as'   => 'permissions',
            'uses' => 'InstallerController@permissions',
    ]);

    Route::post('database', [
            'as'   => 'database',
            'uses' => 'InstallerController@database',
    ]);

    Route::get('final', [
            'as'   => 'final',
            'uses' => 'InstallerController@finish',
    ]);
});

Route::group(['prefix' => 'update', 'as' => 'Updater::', 'middleware' => 'web'], function () {

    Route::group(['middleware' => 'update'], function () {
        Route::get('/', [
                'as'   => 'welcome',
                'uses' => 'UpdateController@welcome',
        ]);

        Route::post('/', [
                'as'   => 'verify_product',
                'uses' => 'UpdateController@verifyProduct',
        ]);
    });
});

