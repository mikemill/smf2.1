<?php
/**
 * Simple Machines Forum (SMF)
 *
 * @package SMF
 * @author Simple Machines
 * @copyright 2011 Simple Machines
 * @license http://www.simplemachines.org/about/smf/license.php BSD
 *
 * @version 2.1 Alpha 1
 */

function template_unread()
{
	global $context, $boardurl;

	echo json_encode(array(
		'forumlink' => $boardurl,
		'topics' => $context['topics'],
	));
}

function template_replies()
{
	global $context, $boardurl;

	echo json_encode(array(
		'forumlink' => $boardurl,
		'topics' => $context['topics'],
	));
}

?>