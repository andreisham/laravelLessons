<?php declare(strict_types=1);

namespace App\Services;

use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService
{

    protected string $url;
    public function __construct(string $url) {
        $this->url = $url;
    }

    public function start():array {
        $xml = XmlParser::load($this->url);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
        return $data;
    }
}
