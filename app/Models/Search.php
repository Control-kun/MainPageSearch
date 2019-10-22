<?php

namespace App\Models;

use App\Core\Model;

class Search extends Model
{
    public function getSearchResult()
    {
        return $this->db->row('SELECT * FROM test');
    }
}