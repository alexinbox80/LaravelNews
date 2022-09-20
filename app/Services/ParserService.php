<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
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
        $imageFiles = Storage::files('public/news');

        foreach ($imageFiles as $imageFile) {
            $e = \explode("/", $imageFile);
            $filesName[] = $e[1] . '/' .$e[2];
        }

        foreach ($array as $item) {
            $news = new News;

            $news->category_id = 5;
            $news->title = $item['title'];
            $news->description = $item['description'];
            //$news->image = $item['link'];
            $news->image = $filesName[rand(0, count($filesName) - 1)];
            $news->author = 'rambler_rss';
            $news->status = News::ACTIVE;
            $news->created_at = $item['pubDate'];

            $news->save();
        }
    }

    public function saveParseData(): void
    {
        $xml = XmlParser::load($this->link);

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
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,author,description,pubDate]'
            ]
        ]);

        $e = \explode("/", $this->link);
        $fileName = end($e);
        $jsonEncode = json_encode($data);

        Storage::append('news/' . $fileName, $jsonEncode);

        $this->putParseData($data['news']);
    }
}
