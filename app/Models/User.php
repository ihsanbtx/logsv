<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class User extends Eloquent implements Authenticatable{

	use AuthenticableTrait;
	protected $connection ='mongodb';
	protected $collection = 'user';
	protected $primaryKey = 'nrp';
	public static $unguarded = true;
	public $remember_token=false; //perlu saat logout biar ga error
	public $_token=false;


    public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getRememberToken()
	{
		return $this->token;
	}

	public function getRememberTokenName()
	{
		return $this->token;
	}

	public function setRememberToken($value)
	{
    $this->remember_token = $value;
	}

}

?>
