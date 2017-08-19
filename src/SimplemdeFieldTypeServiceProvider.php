<?php namespace Oimken\SimplemdeFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

class SimplemdeFieldTypeServiceProvider extends AddonServiceProvider
{
    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'streams/simplemde-field_type/index'           => 'Oimken\SimplemdeFieldType\Http\Controller\FilesController@index',
        'streams/simplemde-field_type/choose'          => 'Oimken\SimplemdeFieldType\Http\Controller\FilesController@choose',
        'streams/simplemde-field_type/selected'        => 'Oimken\SimplemdeFieldType\Http\Controller\FilesController@selected',
        'streams/simplemde-field_type/upload/{folder}' => 'Oimken\SimplemdeFieldType\Http\Controller\UploadController@index',
        'streams/simplemde-field_type/handle'          => 'Oimken\SimplemdeFieldType\Http\Controller\UploadController@upload',
        'streams/simplemde-field_type/recent'          => 'Oimken\SimplemdeFieldType\Http\Controller\UploadController@recent',
    ];
    /**
     * Register the addon.
     *
     * @param SimplemdeFieldType $fieldType
     */
    public function register(SimplemdeFieldType $fieldType)
    {
        $fieldType->on('entry_saved', SimplemdeFieldTypeCallbacks::class . '@onEntrySaved');
        $fieldType->on('entry_deleted', SimplemdeFieldTypeCallbacks::class . '@onEntryDeleted');
        $fieldType->on('entry_translation_saved', SimplemdeFieldTypeCallbacks::class . '@onEntryTranslationSaved');
        $fieldType->on('entry_translation_deleted', SimplemdeFieldTypeCallbacks::class . '@onEntryTranslationDeleted');
    }

}
