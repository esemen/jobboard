<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use Notifiable, HasApiTokens, HasFactory, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'town', 'city', 'phone', 'postcode', 'user_mode'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function representations()
    {
        return $this->hasMany(Representation::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'representations')
            ->using(Representation::class)
            ->withTimestamps();
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @param Company $company
     * @return Representation
     */
    public function forCompany(Company $company)
    {
        return $this->representations()->where('company_id', $company->id)->first();
    }

    public function companyRoles()
    {
        return $this->representations()
            ->with('roles')
            ->with('company')
            ->get()
            ->map(function ($item) {
                return [
                    "company" => $item->company,
                    "role" => $item->roles->pluck("name")
                ];
            });
    }

    public function cvs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Cv::class);
    }
}
