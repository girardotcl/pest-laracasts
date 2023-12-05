<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

beforeEach(function() {
    Course::factory(6)
        ->sequence(
            ['title' => 'Course A'],
            ['title' => 'Course B'],
            ['title' => 'Course C'],
        )->create();
});

it('shows courses overview', function() {
    get(route('home'))
        ->assertOk()
        ->assertSeeText([
            'Course A',
            'Course B',
            'Course C',
        ]);
});

it('shows only released courses', function() {
    get(route('home'))->assertOk();
})->todo();

it('shows courses by released date', function() {
    get(route('home'))->assertOk();
})->todo();
