<?php namespace Oimken\SimplemdeFieldType\Command;

use Oimken\SimplemdeFieldType\SimplemdeFieldType;
use Illuminate\Filesystem\Filesystem;

/**
 * Class DeleteDirectory
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class DeleteDirectory
{

    /**
     * The editor field type instance.
     *
     * @var SimplemdeFieldType
     */
    protected $fieldType;

    /**
     * Create a new DeleteDirectory instance.
     *
     * @param SimplemdeFieldType $fieldType
     */
    public function __construct(SimplemdeFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Filesystem $files
     */
    public function handle(Filesystem $files)
    {
        $path = $this->fieldType->getStoragePath();

        if ($path && $files->isDirectory(dirname($path))) {
            $files->deleteDirectory(dirname($path));
        }
    }
}
