<?php
/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

defined('_JEXEC') or die;


class ModLapostaHelper
{

	public static function getCurrentNewsletters()
	{
		try
		{

			$campaign = new Laposta_Campaign();
			$campaigns = $campaign->all();


			$content = [];
			foreach ($campaigns['data'] as $campaignItem)
			{

				if ($campaignItem['campaign']['type'] === 'regular')
				{
					$campaignId = $campaignItem['campaign']['campaign_id'];

					$content[] = $campaign->get($campaignId, 'content');
				}

			}

			return $content;

		}
		catch (Exception $e)
		{
			// Handle any errors
			return 'An error occurred: ' . $e->getMessage();
		}
	}

}

