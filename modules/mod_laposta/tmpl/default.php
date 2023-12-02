<?php

/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */
defined('_JEXEC') or die;
?>
<div class="laposta<?php echo $moduleclass_sfx ?>">

    <?php
    foreach ($newsletters as $newsletter){
	    $jdate = new JDate($newsletter['campaign']['delivery_ended']);
	    $localDateTime = $jdate->format(JText::_('DATE_FORMAT_LC'), true);
	    print '<a href="';print_r($newsletter['campaign']['web']);print'"';print'target="_blank"'; print'>';print_r($localDateTime); print ': ';print_r($newsletter['campaign']['name']);print '</a></br>';
    }

    ?>

</div>
