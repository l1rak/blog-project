<?php

namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {

        $first = factory(Post::class)->create();
        $second = factory(Post::class)-> create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        $posts = Post::archives();

        $this->assertCount(2, $posts);
    }
}
