<?php

namespace App\Console\Commands;

use App\Parser;
use App\Post;
use Illuminate\Console\Command;
use voku\helper\HtmlDomParser;
class ParseNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse news and store it in DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $providers = Parser::all();
        foreach ($providers as $provider) {
            $this->startParse($provider);
        }
        return 0;
    }

    public function startParse($provider) {
        $startUrl = $provider->start_url;
        $page = $this->sendRequest($startUrl, $startUrl);
        $parser = HtmlDomParser::str_get_html($page);
        $ads = $parser->findMulti($provider->selector_url);
        foreach ($ads as $idx => $ad) {
            // Проходим по ссылкам каждой новости
            if ($ad->hasAttribute('href')) {
                $url = $ad->getAttribute('href');
                // Тут проверяем чтобы ссылка вела на тот же домен, потому что на рбк иногда ведет на их сабдомены, где логика парса уже другая
                if(substr($url,0, strlen($startUrl)) == $startUrl) {
                    $pageInner = $this->sendRequest($url);
                    $parser = HtmlDomParser::str_get_html($pageInner);
                    $contentToPush['url'] = $url;
                    $contentToPush['title'] = $parser->findOne($provider->selector_title)->innerText();
                    $contentToPush['image'] = $parser->findOne($provider->selector_image)->getAttribute($provider->selector_image_attr);
                    $articleContent = $parser->findMulti($provider->selector_content)->innertext();
                    $contentToPush['content'] = strip_tags(implode(' ', $articleContent));
                    // Записываем в БД
                    Post::create($contentToPush);
                }
            }
        }
    }

    public function sendRequest($url) {
        // Отправляем запрос на сайт
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, "google");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($httpcode == '200') { // Если получаем 200 ответ от сервера, то продолжаеи с ней работу
            return $output;
        }
    }
}
