<?php


namespace App\Services;


class FileDBService
{
  public function saveFile(array $data)
  {
  	  $data = serialize($data);
	  return file_put_contents(storage_path('app/db'), $data);
  }
  public function getFile(string $fileName)
  {
  	return file_get_contents($fileName);
  }
}