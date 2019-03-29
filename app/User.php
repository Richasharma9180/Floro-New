<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User_Activity;


class User extends Authenticatable
{   
    
        use sortable;
        use SoftDeletes;
        use Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name','email','first_name','last_name','address','house_number','postal_number','city','phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getFullName()
    {
    return "{$this->first_name} {$this->surname}";
    }

    public $sortable = ['user_name','email',
    'first_name','last_name' ,'google2fa_secret'

    ];

    protected $hidden = [
        'password', 'remember_token', 'google2fa_secret',
    ];

    public function passwordSecurity()
    {
        return $this->hasOne('App\PasswordSecurity');
    }
    
   

}
   

