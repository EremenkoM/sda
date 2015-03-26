<?php

class Users
    extends AbstractModel
{
    public $id;
    public $title;
    public $text;

    protected static $table = 'masters';
    protected static $class = 'Users';
}