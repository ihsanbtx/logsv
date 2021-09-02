<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class LogSV extends Eloquent{

	protected $connection ='mongodb';
	protected $collection = 'logsv';
	protected $fillable = ['targetID', 'targetName' ,'targetGroupName', 'activityDate', 'activity', 'inassociate', 'gallery', 'caseAgentName', 'svteam', 'updated_by'];


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
