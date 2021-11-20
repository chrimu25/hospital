<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'date_of_birth',
        'email',
        'phone',
        'gender',
        'address',
        'status',
        'degree',
        'speciality',
        'profile_pic',
        'role',
        'nid',
        'hospital_id',
        'hospital_name',
        'head',
        'logo',
        'website',
        'linkedin',
        'twitter',
        'instagram',
        'facebook',
        'password',
    ];

    protected $date = ['date_of_birth'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function impairement()
    {
        return $this->hasOne(Disease::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class,'id','doctor');
    }

    public function scopeSearch($query, $key)
    {
        $key = "%$key%";
        $query->where(function($query) use ($key){
            $query->where('name','like',$key)
                    ->orWhere('hospital_name','like',$key)
                    ->orWhere('speciality','like',$key)
                    ->orWhere('degree','like',$key)
                    ->orWhere('address','like',$key)
                    ->orWhere('head','like',$key)
                    ->orWhere('phone','like',$key)
                    ->orWhere('email','like',$key);
        });
    }
}
