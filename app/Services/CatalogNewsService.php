<?php


namespace App\Services;
use App\Services\FakeNewsService;

class CatalogNewsService
{

    protected $categories = [
        'category_1' => [
            'category_id' => 'category_1',
            'title' => 'Категория 1',
            'news' => []
        ],
        'category_2' => [
            'category_id' => 'category_2',
            'title' => 'Категория 2',
            'news' => []
        ],
        'category_3' => [
            'category_id' => 'category_3',
            'title' => 'Категория 3',
            'news' => []
        ],
    ];

    public function categoryNews () {
        $news = (new FakeNewsService)->getNews();

        foreach ($news as $key => $value) {
            if ($key < 5) {
                $this->categories['category_1']['news'][$key] = $value;
            } elseif ($key >= 5 && $key < 10) {
                $this->categories['category_2']['news'][$key] = $value;
            } elseif ($key >= 10) {
                $this->categories['category_3']['news'][$key] = $value;
            }
        }

        return $this->categories;
    }
}
