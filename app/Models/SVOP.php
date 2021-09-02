<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class SVOP extends Eloquent{

	protected $connection ='mongodb';
	protected $collection = 'svop';
	public static $unguarded = true;
	protected $fillable = ['nrp', 'fullname'];


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
