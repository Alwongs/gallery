<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vizit extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'user_agent', 'city', 'country', 'query_string', 'request_uri'];
}
