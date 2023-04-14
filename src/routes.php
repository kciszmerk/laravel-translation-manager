<?php

declare(strict_types=1);

$config = array_merge(config('translation-manager.route'), ['namespace' => 'Barryvdh\TranslationManager']);
Route::group($config, function($router) use ($config)
{
    $router->get('view/{groupKey?}', 'Controller@getView')->name($config['as'].'.view')->where('groupKey', '.*');
    $router->get('/{groupKey?}', 'Controller@getIndex')->name($config['as'].'.groupKey')->where('groupKey', '.*');
    $router->post('/add/{groupKey}', 'Controller@postAdd')->name($config['as'].'.add')->where('groupKey', '.*');
    $router->post('/edit/{groupKey}', 'Controller@postEdit')->name($config['as'].'.edit')->where('groupKey', '.*');
    $router->post('/groups/add', 'Controller@postAddGroup')->name($config['as'].'.groups');
    $router->post('/delete/{groupKey}/{translationKey}', 'Controller@postDelete')->name($config['as'].'.delete')->where('groupKey', '.*');
    $router->post('/import', 'Controller@postImport')->name($config['as'].'.import');
    $router->post('/find', 'Controller@postFind')->name($config['as'].'.find');
    $router->post('/locales/add', 'Controller@postAddLocale')->name($config['as'].'.locales-add');
    $router->post('/locales/remove', 'Controller@postRemoveLocale')->name($config['as'].'.locales-remove');
    $router->post('/publish/{groupKey}', 'Controller@postPublish')->where('groupKey', '.*')->name($config['as'].'.publish');
    $router->post('/translate-missing', 'Controller@postTranslateMissing')->name($config['as'].'.translate-missing');
});
