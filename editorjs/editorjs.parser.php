<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=parser
[END_COT_EXT]
==================== */

/**
 * Editor.js Plugin for Cotonti CMF
 *
 * @package Editor.js
 * @copyright (c) Cotonti Team
 * @license https://github.com/Cotonti/Cotonti/blob/master/License.txt
 */

defined('COT_CODE') or die('Wrong URL');

/**
 * Enables JSON parsing
 *
 * @param string $blocks Editor.js blocks
 * @return string
 */
function cot_parse_editorjs($blocks)
{
	return $blocks;
}
