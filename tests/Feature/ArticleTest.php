<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/api/articles');

        $array = [
			'Я первая статья',
			'Я вторая статья',
			'Я просто статья'
		];

		$response->assertExactJson(["articles" => $array]);


    }
}
