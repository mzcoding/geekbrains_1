<?php

namespace App\Jobs;

use App\Service\XMLParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;

	/**
	 * Create a new job instance.
	 *
	 * @param string $url
	 */
    public function __construct(string $url)
    {
    	$this->url = $url;
    }

	/**
	 * Execute the job.
	 *
	 * @param XMLParserService $parserService
	 * @return void
	 */
    public function handle(XMLParserService $parserService)
    {
        $parserService->saveNews($this->url);
    }
}
