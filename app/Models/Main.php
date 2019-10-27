<?php

namespace App\Models;

use App\Core\Model;

class Main extends Model
{
    /**
     * @return array
     */
    public function getSearchResult()
    {
        return $this->db->row('SELECT * FROM search_results');
    }

    /**
     * @param $url
     * @param $str
     * @param $count
     * @return bool|\PDOStatement
     */
    public function setSearchResult($url, $str, $count)
    {
        return $this->db->query("INSERT INTO search_results(url, results, count) VALUES('$url', '$str',$count)");
    }
}