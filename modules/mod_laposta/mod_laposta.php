<?php


defined('_JEXEC') or die;

// Include the Laposta API client
require_once __DIR__ . '/../../libraries/laposta-api-php/lib/Laposta.php';

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$params = JModuleHelper::getModule('mod_laposta')->params;

$parameters = new JRegistry($params);

$apiKey = $parameters->get('api_key', 'JdMtbsMq2jqJdQZD9AHC');

// Set your API key
Laposta::setApiKey($apiKey);

$newsletters = ModLapostaHelper::getCurrentNewsletters();


require JModuleHelper::getLayoutPath('mod_laposta');
