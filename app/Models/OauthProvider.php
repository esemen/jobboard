<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OauthProvider extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function oauthAccounts() {
        return $this->hasMany(OauthAccount::class);
    }
}
