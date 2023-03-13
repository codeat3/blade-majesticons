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
        $result = svg('majestic-cookie-line')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.419 12c0-6.4 5.358-8 8.037-8h1.005v4h3.014v3h4.019v1c0 6.4-5.024 8-8.038 8-3.014 0-8.037-1.6-8.037-8zm5.023-4h.001m-2.01 4h0m5.023 1h.001m-2.01 3h0m6.028-1h0"/></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('majestic-cookie-line', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.419 12c0-6.4 5.358-8 8.037-8h1.005v4h3.014v3h4.019v1c0 6.4-5.024 8-8.038 8-3.014 0-8.037-1.6-8.037-8zm5.023-4h.001m-2.01 4h0m5.023 1h.001m-2.01 3h0m6.028-1h0"/></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('majestic-cookie-line', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.419 12c0-6.4 5.358-8 8.037-8h1.005v4h3.014v3h4.019v1c0 6.4-5.024 8-8.038 8-3.014 0-8.037-1.6-8.037-8zm5.023-4h.001m-2.01 4h0m5.023 1h.001m-2.01 3h0m6.028-1h0"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-majestic-icons.class', 'awesome');

        $result = svg('majestic-cookie-line')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.419 12c0-6.4 5.358-8 8.037-8h1.005v4h3.014v3h4.019v1c0 6.4-5.024 8-8.038 8-3.014 0-8.037-1.6-8.037-8zm5.023-4h.001m-2.01 4h0m5.023 1h.001m-2.01 3h0m6.028-1h0"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-majestic-icons.class', 'awesome');

        $result = svg('majestic-cookie-line', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.419 12c0-6.4 5.358-8 8.037-8h1.005v4h3.014v3h4.019v1c0 6.4-5.024 8-8.038 8-3.014 0-8.037-1.6-8.037-8zm5.023-4h.001m-2.01 4h0m5.023 1h.001m-2.01 3h0m6.028-1h0"/></svg>
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
