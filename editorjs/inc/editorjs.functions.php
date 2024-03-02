<?php

/**
 * Editor.js Plugin for Cotonti CMF
 *
 * @package Editor.js
 * @copyright (c) Cotonti Team
 * @license https://github.com/Cotonti/Cotonti/blob/master/License.txt
 */

defined('COT_CODE') or die('Wrong URL');

require_once cot_langfile('editorjs', 'plug');

require_once dirname(__FILE__) . '/../src/vendor/autoload.php';

use \EditorJS\EditorJS;
use \EditorJS\EditorJSException;
use \Durlecode\EJSParser\Parser;
use \Durlecode\EJSParser\HtmlParser;
use \Durlecode\EJSParser\ParserException;

/**
 * Sanitize editor.js blocks
 *
 * @param string $data contains JSON Editor.js blocks
 * @return string as JSON
 */
function ejs_sanitize($data)
{
    $configFile = dirname(__FILE__) . '/../sanitize-blocks-config.json';
    $jsonConfig = file_get_contents($configFile);
    
    try {
        $editor = new EditorJS($data, $jsonConfig);
        $blocks = $editor->getBlocks();

        $editorBlocks = [
            'blocks' => $blocks,
        ];

        return json_encode($editorBlocks, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

    } catch (EditorJSException $e) {
        cot_error('Editor.js (sanitize blocks): ' . $e->getMessage(), 'ejs_sanitize');
    }
}

/**
 * Parse editor.js blocks to HTML
 *
 * @param string $data contains JSON Editor.js blocks
 * @return string as HTML
 */
function ejs_parse_blocks($data)
{
    global $cfg;

    if (!empty($data)) {
        try {
            $parser = new Parser($data);

            $parser->setPrefix(Cot::$cfg['plugin']['editorjs']['prefix']);
            
            $html = $parser->toHtml();

            return $html;

        } catch (ParserException $e) {
            cot_error('Editor.js (parse blocks): ' . $e->getMessage(), 'ejs_parse_blocks');
        }
    }
}

/**
 * Parse HTML to editor.js blocks
 *
 * @param string $html contains HTML
 * @return string as JSON
 */
function ejs_parse_html($html)
{
    global $cfg;

    if (!empty($html)) {
        try {
            $parser = new HtmlParser($html);

            $parser->setPrefix(Cot::$cfg['plugin']['editorjs']['prefix']);
            $blocks = $parser->toBlocks();

            return $blocks;

        } catch (ParserException $e) {
            cot_error('Editor.js: ' . $e->getMessage(), 'ejs_parse_html');
        }
    }
}

/**
 * Get HTML by URL
 *
 * @param string $url
 * @return string
 */
function ejs_get_remote_url($url)
{
    /* Problem with pass Cloudflare? Check this project:
       https://github.com/lwthiker/curl-impersonate
       
       Or try implement editor.js link plugin with some function in browser side */
    
    $headers[]  = "User-Agent:Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36";
    $headers[]  = "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7";
    $headers[]  = "Accept-Language:en-US;q=0.8,en;q=0.5";
    $headers[]  = "Accept-Encoding:gzip,deflate,br";
    $headers[]  = "Accept-Charset:utf-8";
    $headers[]  = "Keep-Alive:115";
    $headers[]  = "Connection:keep-alive";
    $headers[]  = "Cache-Control:max-age=0";

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL             => $url,
        CURLOPT_RETURNTRANSFER  => TRUE,
        CURLOPT_FOLLOWLOCATION  => TRUE,
        CURLOPT_HEADER          => FALSE,
        CURLOPT_ENCODING        => '',
        CURLOPT_TIMEOUT         => 60,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_SSL_VERIFYPEER  => 0,
        CURLOPT_SSL_VERIFYHOST  => 0,
        // CURLOPT_VERBOSE         => 1
    ));
    $response = curl_exec($ch);
    // $getinfo = curl_getinfo($ch);
    $geterror = curl_error($ch);
    curl_close($ch);
    
    return ($geterror) ? false : $response;
}
