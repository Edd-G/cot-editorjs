<?php
/**
 * [BEGIN_COT_EXT]
 * Hooks=ajax
 * [END_COT_EXT]
 */

/**
 * Editor.js Plugin for Cotonti CMF
 *
 * @package Editor.js
 * @copyright (c) Cotonti Team
 * @license https://github.com/Cotonti/Cotonti/blob/master/License.txt
 */

defined('COT_CODE') or die('Wrong URL');

require_once cot_incfile('editorjs', 'plug');

$url = cot_import('url','G','NOC');

if (!empty($url))
{

    $html = ejs_get_remote_url($url);

    // Error in cURL response
    if ($html === FALSE)
    {
        $jsondata = array('success' => 0);
        echo json_encode($jsondata);
        exit;
    }

    libxml_use_internal_errors(true); // Disable libxml errors

    $doc = new DomDocument();
    $doc->loadHTML(mb_encode_numericentity($html, [0x80, 0x10FFFF, 0, ~0], 'UTF-8'));

    $xpath = new DOMXPath($doc);
    $query = '//*/meta[starts-with(@property, \'og:\')]';
    $tags = $xpath->query($query);
    $metas = [];

    foreach ($tags as $tag) {
        $property = substr($tag->getAttribute('property'), 3);
        $content = $tag->getAttribute('content');
        if ($property == 'image') {
            $metas['image'] = [
                'url' => $content
            ];
        } else {
            $metas[$property] = $content;
        }
    }

    if (count($metas) > 0) {
        $passMetas = [
            'site_name',
            'image',
            'title',
            'description'
        ];
            
        $metas = array_filter($metas, function($v) use ($passMetas) {
            return in_array($v, $passMetas);
        }, ARRAY_FILTER_USE_KEY);
    }

    // No meta tags foud
    if (count($metas) === 0) {
        $jsondata = array('success' => 0);
        echo json_encode($jsondata);
        exit;
    }

    $json = [
        'success' => 1,
        'meta' => $metas
    ];

    header('Content-Type: application/json');
    echo json_encode($json, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
}
