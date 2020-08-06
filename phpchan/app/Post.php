<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Table associated with the model
     * @var string
     */
    protected $table = 'posts';

    protected $fillable = ['userName', 'message', 'image', 'password'];

    protected $hidden = ['password'];

    // mutator
    public function setPasswordAttribute(String $password){
        $this->attributes['password'] = bcrypt($password);
    }
}
