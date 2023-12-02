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

			uasort($content, fn($item1, $item2) => $item1['campaign']['delivery_date'] < $item2['campaign']['delivery_date'] ? -1:1);

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

