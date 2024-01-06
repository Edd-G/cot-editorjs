<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=global
[END_COT_EXT]
==================== */

/**
 * Editor.js Plugin for Cotonti CMF
 * Sets JSON parser up and registers a custom filter callback
 *
 * @package Editor.js
 * @copyright (c) Cotonti Team
 * @license https://github.com/Cotonti/Cotonti/blob/master/License.txt
 */

defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('editorjs', 'plug');

/**
 * A HTM filter callback using Editor.js Parser
 *
 * @param string $html Unfiltered JSON string
 * @return string Purified & Parsed HTML
 */
function editorjs_parse_html($html)
{
	return ejs_parse_html($html);
}

/**
 * A HTM filter callback using Editor.js Parser
 *
 * @param string $data Unfiltered JSON string
 * @return string Purified & Parsed HTML
 */
function editorjs_filter($data)
{
	if (Cot::$sys['parser'] == 'editorjs')
	{
		return ejs_parse_blocks(ejs_sanitize($data));
	}
	else
	{
		return $data;
	}
}

$cot_import_filters['HTM'][] = 'editorjs_filter';
