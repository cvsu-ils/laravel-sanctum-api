<?php

namespace App\Models\Koha;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patron extends Model
{
    use HasFactory;

    protected $connection = 'koha';
    protected $table = 'borrowers';
}