<?php

namespace App\Http\Controllers;

use App\Jobs\JobNewsParsing;


class ParserController extends Controller
{
    public function __invoke() {
        $parsingLinks = [
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/championsleague.rss',
        ];
        foreach ($parsingLinks as $link) {
            JobNewsParsing::dispatch($link);
        }

        echo 'Задачи добавлены в очередь';
    }




}
