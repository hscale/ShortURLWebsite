<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Link extends Model {

    protected $table = 'links';
    protected $fillable = array('url','hash');

    }

