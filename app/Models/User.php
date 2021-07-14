<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
	protected $hidden = [
        'password',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
	
	
	protected $fillable = [
  'email',
  'password',
  'phone',
  'country',
  'state',
  'city',
  'address',
  'firstname',
  'lastname',
  'age',
  'pincode',
  'gender',
  'user_type',
  'donot_send_newsletter',
  'date',
  'is_guest',
  'guest_email',
  'sent_email',
  'social_media',
  'identifier',
  'ip',
  'remember_token',
  'created_at',
  'updated_at'
  
	];

	
	public function wishlist(){
       return $this->hasMany(Wishlist::class);
    }
	public function accounts(){
    return $this->hasMany('App\Models\LinkedSocialAccount');
}
}
