# Editorjs plugin
Editor.js plugin for Cotonti CMF - Modern block-style editor

Content editor and 2 way parser plugin:
- from Editor.js blocks to HTML
- frof HTML to Editor.js blocks

Plugin markups created HTML content with special classes.
This classes described in table.

## Currently supported Editor.js Tools:
Package | Key | Main CSS Class<br>(with default prefix) | Additional / modificator CSS classes<br>(with default prefix)
--- | --- | --- | ---
`@editorjs/header`<br>`editorjs-header-with-alignment` | `header` | `.prs-header` | alignment:<br>`.prs_left`<br>`.prs_right`<br>`.prs_center`<br>`.prs_justify`
`@editorjs/paragraph`<br>`editorjs-paragraph-with-alignment` | `paragraph` | `.prs-paragraph` | alignment:<br>`.prs_left`<br>`.prs_right`<br>`.prs_center`<br>`.prs_justify`
`@editorjs/inline-code` |  |  |
`@editorjs/marker` |  |  |
`@editorjs/underline` |  |  |
`@editorjs/list` | `list` | `.prs-list` | additional:<br>`.prs_ordered`
`@editorjs/raw` | `raw` |  |
`@editorjs/simple-image` | `simpleImage` | `.prs-image` | additional:<br>`.prs_withborder`<br>`.prs_withbackground`<br>`.prs_stretched`
`@editorjs/embed` | `embed` | `.prs-embed` | additional:<br>`.prs_youtube`<br>`.prs_codepen`<br>`.prs_vimeo`
`@editorjs/link` | `linkTool` | `.prs-linktool` | additional:<br>`.prs_title`<br>`.prs_description`<br>`.prs_sitename`
`@editorjs/delimiter` | `delimiter` | `.prs-delimiter` |
`editorjs-alert` | `alert` | `.prs-alert` | alignment:<br>`.prs_left`<br>`.prs_right`<br>`.prs_center`<br>additional:<br>`.prs_primary`<br>`.prs_secondary`<br>`.prs_info`<br>`.prs_success`<br>`.prs_warning`<br>`.prs_danger`<br>`.prs_light`<br>`.prs_dark`
`@editorjs/warning` | `warning` | `.prs-warning` |
`@editorjs/table` | `table` | `.prs-table` | additional:<br>`.prs_withheadings`
`@editorjs/quote` | `quote` | `.prs-quote` | alignment:<br>`.prs_left`<br>`.prs_center`
`@editorjs/code` | `code` | `.prs-code`

## Installation
1. Unpack to plugins directory
2. Enable plugin from admin panel
3. Run `composer install` inside `src` directory plugin (Composer must be installed)
4. Set Editorjs markup parser in configurations Pages module

## Configuration
1. You can turn off unnecessary tools in `editorjs.editor.php`
2. Set sanitize data from client with HTML Purifier rules in `sanitize-blocks-config.json`

For more information on cleaning rules, see: https://github.com/editor-js/editorjs-php
