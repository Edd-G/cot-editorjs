<?php
/* ====================
  [BEGIN_COT_EXT]
  Hooks=rc
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

if (cot::$usr['id'] > 0)
{
  $R['input_textarea_editor'] =  '<div id="editorjs"></div><textarea class="editor" id="editorjsdata" name="{$name}" rows="{$rows}" cols="{$cols}"{$attrs}>{$value}</textarea>{$error}';
}
