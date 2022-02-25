<?php

namespace Ezhasyafaat\LaravelView\Console\Command;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;

class ViewMakeCommand extends GeneratorCommand 
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'make:view {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new view file';

    /**
     * The type of class being generated.
     * 
     * @var string
     */
    protected $type = 'View';
    
    /**
     * Get the stub file for the generator.
     * 
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/view.stub';
    }

    /**
     * Handle the command.
     * 
     * @return void
     */
    public function handle()
    {
        $dirr   = resource_path('views' . DIRECTORY_SEPARATOR . str_replace('.', DIRECTORY_SEPARATOR, $this->argument('name')).'.blade.php');

        $baseView = $this->files->get($this->getStub());
        $directory = dirname($dirr);
        (new Filesystem)->ensureDirectoryExists($directory);

        (new Filesystem)->put($dirr, $baseView);

        $this->info('Success Create View');
        
    }
}