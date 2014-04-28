<?php

class Profile extends Eloquent {

	protected $table = 'profiles';

    public function users()
    {
        return $this->hasOne('User');
    }
}