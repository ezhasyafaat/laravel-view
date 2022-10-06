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
    protected $signature = 'make:view {name} {--resource}';

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
        return __DIR__ . '/stubs/view.stub';
    }

    /**
     * Handle the command.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->option('resource')) {
            /** Create a default resource view */
            $resources = [
                'index',
                'create',
                'edit',
                'show',
            ];

            foreach ($resources as $resource) {
                $dirr = resource_path('views' . DIRECTORY_SEPARATOR . strtolower($this->argument('name')) . DIRECTORY_SEPARATOR . str_replace('.', DIRECTORY_SEPARATOR, $resource) . '.blade.php');

                $baseView = $this->files->get($this->getStub());

                $directory = dirname($dirr);

                (new Filesystem())->ensureDirectoryExists($directory);

                (new Filesystem())->put($dirr, $baseView);

                $this->info('Success Create View ' . strtolower($this->argument('name')) . '/' . $resource . '.blade.php');
            }
        } else {
            $dirr = resource_path('views' . DIRECTORY_SEPARATOR . str_replace('.', DIRECTORY_SEPARATOR, $this->argument('name')) . '.blade.php');

            $baseView = $this->files->get($this->getStub());

            $directory = dirname($dirr);

            (new Filesystem())->ensureDirectoryExists($directory);

            (new Filesystem())->put($dirr, $baseView);

            $this->info('Success Create View');
        }
    }
}
