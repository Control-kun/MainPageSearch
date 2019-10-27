<?php

namespace App\Controllers;

use App\Core\Controller;

class MainController extends Controller
{

    public function index()
    {
        if ($_REQUEST['url']) {
            $images[] = $this->getImagesFromUrl($_REQUEST['url']);
        }

        $this->view->render('Главная страница');
    }


    /**
     * @param $url
     * @return mixed
     */
    public function getPageContent($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);

        return $output;
    }

    /**
     * @param $url
     */
    public function getImagesFromUrl($url)
    {
        $url = preg_replace("#/$#", "", $url);

        $imagesArr = [];
        $html = file_get_contents($url);
        preg_match_all('/<img[^>]+src="?\'?([^"\']+)"?\'?[^>]*>/i', $html, $images, PREG_SET_ORDER);

        foreach ($images as $image) {
            if (strpos($image[1], 'data:image/') !== false) {
                continue;
            }

            if (substr($image[1], 0, 2) == '//') {
                $image[1] = 'http:' . $image[1];
            }

            $ext = strtolower(substr(strrchr($image[1], '.'), 1));
            if (in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                $img = parse_url($image[1]);
                $imagesArr[] = $url . $img['path'];
            }

        }

        if ($imagesArr) {
            $countResults = count($imagesArr);
            $imagesStr = implode(',', $imagesArr);
            $this->model->setSearchResult($url, trim($imagesStr), $countResults);

        }
    }

}