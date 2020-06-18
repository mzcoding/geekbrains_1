<?php


namespace App\Service;


class XMLParserService
{
   public function saveNews(string $url)
   {
        \Storage::disk('public')->put('test.txt', $url);
   }
}