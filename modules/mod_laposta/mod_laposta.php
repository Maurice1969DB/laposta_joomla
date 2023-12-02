<?php


defined('_JEXEC') or die;


// Include the Laposta API client
require_once JPATH_LIBRARIES . '/laposta-api-php/lib/Laposta.php';

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$params = JModuleHelper::getModule('mod_laposta')->params;

$parameters = new JRegistry($params);

$apiKey = $parameters->get('api_key', '');

$customCampaign =  $parameters->get('campaign_id', '' );

// Set your API key
Laposta::setApiKey($apiKey);
Laposta::setHttpsDisableVerifyPeer(true);

$newsletters = ModLapostaHelper::getCurrentNewsletters($customCampaign);


require JModuleHelper::getLayoutPath('mod_laposta');
