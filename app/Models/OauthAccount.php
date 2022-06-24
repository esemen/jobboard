<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OauthAccount extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function oauthProvider()
    {
        return $this->belongsTo(OauthProvider::class);
    }
}
