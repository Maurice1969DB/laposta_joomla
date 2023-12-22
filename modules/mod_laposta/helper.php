<?php
/**
 * @package     Laposta for Joomla 3.x
 * @subpackage
 * @copyright
 * @license
 */

defined('_JEXEC') or die;


class ModLapostaHelper
{

	public static function getCurrentNewsletters($customCampaignId = null): array|string
	{
		try
		{
			$campaign = new Laposta_Campaign();
			$content = [];


			if ($customCampaignId !== '')
			{
				$content[] = $campaign->get($customCampaignId, 'content');
			}
			else
			{
				$campaigns = $campaign->all();

				foreach ($campaigns['data'] as $campaignItem)
				{
					$campaignId = $campaignItem['campaign']['campaign_id'];


					$content[] = $campaign->get($campaignId);

				}
			}

			uasort($content,function($item1, $item2) {

				return strtotime($item1['campaign']['delivery_ended']) < strtotime($item2['campaign']['delivery_ended']) ? 1:-1;
			});

			return  $content;

		}
		catch (Exception $e)
		{
			var_dump($e->getMessage());
			// Handle any errors
			return 'An error occurred: ' . $e->getMessage();
		}
	}

}

