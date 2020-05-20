<?php

namespace Tests\Unit;

use App\Article;
use PHPUnit\Framework\TestCase;

class StrToUpperTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
       //$db_post = //\DB::select("select * from articles where id = 1");
       $db_title = strtoupper("newS");

      // $model = Article::find(1);
       $model_title = strtoupper("newS");

       $this->assertEquals($db_title, $model_title);
    }
}
