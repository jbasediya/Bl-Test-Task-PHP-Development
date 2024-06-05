<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    //to getting the User Record from the users table 
    public function getRecordUser()
    {
        return self::select('users.*')
            ->where('is_admin', '=','0')
            ->where('is_delete', '=','0')
            ->orderBy('users.id', 'desc')
            ->paginate(20);
            
            
    }
  
    // to getting the single id from the users table
    public function getSingle($id)
    {
        return self::find($id);
            
            
    }

    // Add this to define the column that will store the soft delete timestamp
     protected $dates = ['deleted_at'];
}
