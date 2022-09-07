<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\News;
use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData(): array
    {
        $xml = XmlParser::load($this->link);

        return $xml->parse([
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
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
    }

    public function putParseData(array $array)
    {
        foreach ($array as $item) {
            $news = new News;

            $news->category_id = 5;
            $news->title = $item['title'];
            $news->description = $item['description'];
            $news->image = $item['link'];
            $news->author = 'yandex_music_rss';
            $news->status = News::ACTIVE;
            $news->created_at = $item['pubDate'];

            $news->save();
        }
    }
}
