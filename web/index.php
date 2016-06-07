<?php


require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
// prod / dev
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
