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

function template_results()
{
	global $context, $settings, $options, $txt;
	header('Content-Type: text/plain');

	$obj = array();

	if (empty($context['topics']))
		$obj['noresults'] = $txt['search_no_results'];
	else
	{
		$obj['results'] = array();
		while ($topic = $context['get_topics']())
		{
			$result = array(
				'id' => $topic['id'],
				'relevance' => $topic['relevance'],
				'board' => $topic['board'],
				'category' => $topic['category'],
				'messages' => array(),
			);

			foreach ($topic['matches'] as $message)
			{
				$result['messages'][] = array(
					'id' => $message['id'],
					'subject' => $message['subject_highlighted'] != '' ? $message['subject_highlighted'] : $message['subject'],
					'body' => $message['body_highlighted'] != '' ? $message['body_highlighted'] : $message['body'],
					'time' => $message['time'],
					'timestamp' => $message['timestamp'],
					'start' => $message['start'],
					'author' => array(
						'id' => $message['member']['id'],
						'name' => $message['member']['name'],
						'href' => $message['member']['href'],
					),
				);
			}

			$obj['results'][] = $result;
		}
	}

	echo json_encode($obj);
}

function template_quotefast()
{
	global $context, $settings, $options, $txt;

	echo json_encode($context['quote']['xml']);
}

?>