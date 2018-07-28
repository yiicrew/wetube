<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\ExitCode;
use yii\console\Controller;

/**
 * This command scrapes video listings from demo sites.
 *
 * @author alrazi <saytoally@hotmail.com>
 * @since 0.1
 */
class ScrapeController extends Controller
{
    public $url = 'https://demo.clipbucket.com/free/videos.php';

    /**
     * This command scrapes entered url.
     * @param string $url the url to be scraped.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $data = $this->fetchVideos();
        $path = Yii::getAlias("@tests/fixtures/data/videos.php");
        file_put_contents($path, $data);

        return ExitCode::OK;
    }

    public function fetchVideos()
    {
        $html = file_get_contents($this->url);

        $s = new Selector($html);
        $data = [];
        foreach ($s->select('.item-video .cb_quickie') as $i) {
            ['vlink' => $link] = $i['attributes'];
            $data[] = $this->parseVideo($link, $i['attributes']);
        }
        $data = implode(",\n", $data);

        return <<<HTML
<?php

use yii\db\Expression;
use app\models\Video;

return [
{$data}
];
HTML;
    }

    public function parseVideo($link, $attributes)
    {
        $key = md5($link);
        $html = Yii::$app->cache->get($key);
        if ($html === null) {
            $html = file_get_contents($link);
            Yii::$app->cache->set($key, $html);
        }

        $s = new Selector($html);
        $title = $attributes['vtitle'];
        $poster = $attributes['vthumb'];
        $duration = $attributes['vduration'];

        // $title = preg_replace('/[^a-zA-Z0-9\_\-\@\s\[\]\#]/', '', $title);
        // $title = preg_replace('/\s+/', ' ', $title);

        $file = file_get_contents($poster);
        $filename = basename($poster);
        $filepath = Yii::getAlias("@uploads/thumbs/") . $filename;
        
        if (!file_exists($filepath)) {
            file_put_contents($filepath, $file);
        }

        return <<<HTML
    [
        "user_id" => 1,
        "category_id" => 1,
        "title" => "$title",
        "image" => "$filename",
        "duration" => "$duration",
        "status" => Video::STATUS_ACTIVE,
        "created_at" => new Expression("NOW()"),
        "updated_at" => new Expression("NOW()"),
    ]
HTML;
    }
}
