<?php

namespace Ezhasyafaat\LaravelView\Tests;

class LaravelViewTest extends TestCase
{
    /**
     * Test make a view file.
     */

     public function test_create_view()
     {
         $this->artisan('make:view', ['name' => 'Test/TestCreateView'])->assertExitCode(0);
     }
}