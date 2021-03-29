<?php

namespace App\Jobs;

use App\Models\News;
use App\Services\ParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobNewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $url;

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
     * @return void
     */
    public function handle()
    {
        $service = new ParserService($this->url);
        $data = $service->start();
        $newsData = $data['news'];
        foreach ($newsData as $news) {
            $title = $news['title'];
            $newsAlreadyHas = News::where('title', $title)->first();
            if (!$newsAlreadyHas){
                News::create($news);
            }
            continue;
        }
    }
}
