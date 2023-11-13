<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'is_freetrial',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teacher(){
        return $this->hasOne('App\Models\Teacher') ;
    }
    public function role(){
        
        return $this->belongsTo(Role::class) ;
    }

        public function isTeacher(){
            return $this->role_id == 3 ; 
        }

        public function isStudent(){
            return $this->role_id == 1 ; 
        }
        public function isUser(){
            return $this->role_id == 2 ; 
        }
        
        public function isSchool(){
            return $this->role_id == 4 ; 
        }
        
        public function student(){
            return $this->hasOne('App\Models\Student') ;
        }

        public function school(){
            return $this->hasOne('App\Models\School') ;
        }


        /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
  /*  protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["student", "superAdmin", "school", "teacher"][$value],
        );

        
    }*/
}
