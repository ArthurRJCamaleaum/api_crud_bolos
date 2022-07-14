<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedEmail extends Model
{
    use HasFactory;

    protected $table = 'interested_emails';

    protected $fillable = ['id', 'email', 'cake_id'];
}
