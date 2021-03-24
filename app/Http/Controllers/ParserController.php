<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\ParserService;

class ParserController extends Controller
{
    public function __invoke(ParserService $service) {
        $data = $service->start('https://news.yandex.ru/music.rss');
        $this->store($data['news']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $data array
     */
    public function store($data)
    {
        foreach ($data as $news) {
            $title = $news['title'];
            $newsAlreadyHas = News::where('title', $title)->first();
            if (!$newsAlreadyHas){
                News::create($news);
            }
            continue;
        }
    }
}
