<?php

namespace App\Http\Controllers;

use DB;
use Symfony\Component\DomCrawler\Crawler;
use App\Articles as Articles;
use Illuminate\Http\Request;

use App\Http\Requests;

class UpdateController extends Controller
{
    public function index() {
        echo 'JDOIJDOHEOHOEHF';
        $listPage = file_get_contents('http://www.skysports.com/football/news');
        $crawler = new Crawler($listPage);
        $qs = $crawler->filter('a.news-list__figure');

        for ($i=0;$i < count($qs); $i++) {

            //ссылка на статью
            $article_link = $qs->eq($i)->attr('href');
            //id в систему
            $article_data_id = $qs->eq($i)->parents()->attr('data-id');

            //парсим внутренюю страницу
            $innerPage = file_get_contents($article_link);
            $innerCrawler = new Crawler($innerPage);

            //если это live то пропускаем
            $isLive = $innerCrawler->filter('.article.article--livefyre');
            if( count($isLive) ) {
                continue;
            }

            //берем титл одной статьи
            //если в статье нет нужного формата title, то пропускаем ее
            $article_title = $innerCrawler->filter('.article__long-title');
            $if = count($article_title);
            if($if) {
                $article_title = $article_title->html();
            } else {
                continue;
            }

            //берем автора одной стать
            //если в статье нет нужного формата title, то пишем 0
            $writerName = $innerCrawler->filter('.article__writer-name');
            $if = count($writerName);
            if($if) {
                $writerName = trim( $writerName->text() );
            } else {
                $writerName = 0;
            }

            //берем updateTime одной статьи
            //если в статье нет нужного формата title, то пишем 0
            $updateTime = $innerCrawler->filter('.article__header-date-time');
            $if = count($updateTime);
            if($if) {
                $updateTime = $updateTime->html();
            } else {
                $updateTime = 0;
            }

            //берем content одной статьи
            $content = $innerCrawler->filter('.article')->html();




            //парсим картинку
            $previewCrawler = new Crawler($content);
            $imgUrl = $previewCrawler->filter('img[data-src]');
            if (count($imgUrl)) {
                $imgUrl = $imgUrl->attr('data-src');
            }

            $article = Articles::where('data-id', '=', $article_data_id)->first();
            if (!$article) {
                DB::table('articles')->insert(
                    [
                        'title' => $article_title,
                        'link' => $article_link,
                        'content' => $content,
                        'data-id' => $article_data_id,
                        'writerName' => $writerName,
                        'updateTime' => $updateTime,
                        'imgUrl' => $imgUrl,
                        'category' => 'football'
                    ]
                );
            }
        }
    }

}
