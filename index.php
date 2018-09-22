<?php
require 'vendor/autoload.php';
$app = new \atk4\ui\App('я макс');
$app->initLayout('Centered');
$db = new
\atk4\data\Persistence_SQL('mysql:dbname=for_colibri;host=localhost','root','');

class Client extends \atk4\data\Model {
    public $table = 'client';
function init(); {
    parent::init();
    $this->addField('name');
    $this->addField('surname');
    $this->addField('login');
    $this->addField('password',['type'=>'password']);
    $this->hasMany('friend', new Friend);
}
}

class Friend extends \atk4\data\Model {
    public $table = 'friend';
function init(); {
    parent::init();
    $this->addField('name');
    $this->addField('surname');
    $this->addField('date',['type'=>'date']);
    $this->addField('dept');
    $this->hasOne('client_id', new Client)->addTitle();
}
}
