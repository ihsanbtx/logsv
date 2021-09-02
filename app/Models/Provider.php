<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Provider extends Eloquent{

	protected $connection ='mongodb';
	protected $collection = 'provider';
	public static $unguarded = true;
	protected $fillable = ['providerID', 'providerName', 'updated_by'];


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
