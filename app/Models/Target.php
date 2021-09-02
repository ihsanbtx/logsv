<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Target extends Eloquent{

	protected $connection ='mongodb';
	protected $collection = 'target';
	protected $primaryKey = 'nik';
	public static $unguarded = true;
	public $_token=false;
	protected $fillable = ['nik', 'fullname' ,'placeofbirth', 'dateofbirth', 'gender', 'avatar', 'asknownas', 'logsurveillance'];



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
