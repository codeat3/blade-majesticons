<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeMajesticIcons\BladeMajesticIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('majestic-academic-cap-line')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg fill="currentColor" viewBox="0 0 24 24"><path d="M12.486 5.414a1 1 0 00-.972 0L5.06 9l6.455 3.586a1 1 0 00.972 0L18.94 9l-6.455-3.586zm-1.943-1.749a3 3 0 012.914 0l8.029 4.46a1 1 0 010 1.75l-8.03 4.46a3 3 0 01-2.913 0l-8.029-4.46a1 1 0 010-1.75l8.03-4.46z"/><path d="M21 8a1 1 0 011 1v7a1 1 0 11-2 0V9a1 1 0 011-1zM6 10a1 1 0 011 1v5.382l4.553 2.276a1 1 0 00.894 0L17 16.382V11a1 1 0 112 0v6a1 1 0 01-.553.894l-5.105 2.553a3 3 0 01-2.684 0l-5.105-2.553A1 1 0 015 17v-6a1 1 0 011-1z"/></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('majestic-academic-cap-line', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12.486 5.414a1 1 0 00-.972 0L5.06 9l6.455 3.586a1 1 0 00.972 0L18.94 9l-6.455-3.586zm-1.943-1.749a3 3 0 012.914 0l8.029 4.46a1 1 0 010 1.75l-8.03 4.46a3 3 0 01-2.913 0l-8.029-4.46a1 1 0 010-1.75l8.03-4.46z"/><path d="M21 8a1 1 0 011 1v7a1 1 0 11-2 0V9a1 1 0 011-1zM6 10a1 1 0 011 1v5.382l4.553 2.276a1 1 0 00.894 0L17 16.382V11a1 1 0 112 0v6a1 1 0 01-.553.894l-5.105 2.553a3 3 0 01-2.684 0l-5.105-2.553A1 1 0 015 17v-6a1 1 0 011-1z"/></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('majestic-academic-cap-line', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" fill="currentColor" viewBox="0 0 24 24"><path d="M12.486 5.414a1 1 0 00-.972 0L5.06 9l6.455 3.586a1 1 0 00.972 0L18.94 9l-6.455-3.586zm-1.943-1.749a3 3 0 012.914 0l8.029 4.46a1 1 0 010 1.75l-8.03 4.46a3 3 0 01-2.913 0l-8.029-4.46a1 1 0 010-1.75l8.03-4.46z"/><path d="M21 8a1 1 0 011 1v7a1 1 0 11-2 0V9a1 1 0 011-1zM6 10a1 1 0 011 1v5.382l4.553 2.276a1 1 0 00.894 0L17 16.382V11a1 1 0 112 0v6a1 1 0 01-.553.894l-5.105 2.553a3 3 0 01-2.684 0l-5.105-2.553A1 1 0 015 17v-6a1 1 0 011-1z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-majestic-icons.class', 'awesome');

        $result = svg('majestic-academic-cap-line')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" fill="currentColor" viewBox="0 0 24 24"><path d="M12.486 5.414a1 1 0 00-.972 0L5.06 9l6.455 3.586a1 1 0 00.972 0L18.94 9l-6.455-3.586zm-1.943-1.749a3 3 0 012.914 0l8.029 4.46a1 1 0 010 1.75l-8.03 4.46a3 3 0 01-2.913 0l-8.029-4.46a1 1 0 010-1.75l8.03-4.46z"/><path d="M21 8a1 1 0 011 1v7a1 1 0 11-2 0V9a1 1 0 011-1zM6 10a1 1 0 011 1v5.382l4.553 2.276a1 1 0 00.894 0L17 16.382V11a1 1 0 112 0v6a1 1 0 01-.553.894l-5.105 2.553a3 3 0 01-2.684 0l-5.105-2.553A1 1 0 015 17v-6a1 1 0 011-1z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-majestic-icons.class', 'awesome');

        $result = svg('majestic-academic-cap-line', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.486 5.414a1 1 0 00-.972 0L5.06 9l6.455 3.586a1 1 0 00.972 0L18.94 9l-6.455-3.586zm-1.943-1.749a3 3 0 012.914 0l8.029 4.46a1 1 0 010 1.75l-8.03 4.46a3 3 0 01-2.913 0l-8.029-4.46a1 1 0 010-1.75l8.03-4.46z"/><path d="M21 8a1 1 0 011 1v7a1 1 0 11-2 0V9a1 1 0 011-1zM6 10a1 1 0 011 1v5.382l4.553 2.276a1 1 0 00.894 0L17 16.382V11a1 1 0 112 0v6a1 1 0 01-.553.894l-5.105 2.553a3 3 0 01-2.684 0l-5.105-2.553A1 1 0 015 17v-6a1 1 0 011-1z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeMajesticIconsServiceProvider::class,
        ];
    }
}
