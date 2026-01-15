<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelQuote extends Model
{
    protected $table = 'quote';
    protected $primaryKey = 'quote_id';
    protected $allowedFields = ['quote', 'quote_author', 'quote_judul', 'quote_foto'];

    public function getQuotes()
    {
        return $this->findAll();
    }
}
