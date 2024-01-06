# Editorjs plugin
Editor.js plugin for Cotonti CMF - Modern block-style editor

Content editor and 2 way parser plugin:
- from Editor.js blocks to HTML
- from HTML to Editor.js blocks

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
3. Set custom prefix (default is `prs`) for generated classes in plugin configuration

For more information on cleaning rules, see: https://github.com/editor-js/editorjs-php

## Generated HTML

### Header

```html
<h2 class="prs-header prs_center">Lorem</h2>
```

### Paragraph

```html
<p class="prs-paragraph prs_center">
    <code class="inline-code">Pellentesque</code> 
    <i>malesuada fames</i> 
    <mark class="cdx-marker">tempus</mark>
</p>
```

### Ordered List

```html
<ol class="prs-list prs_ordered">
    <li></li>
</ol>
```

### Unordered List

```html
<ul class="prs-list">
    <li></li>
</ul>
```

### Table

```html
<table class="prs-table prs_withheadings">
    <thead>
        <tr>
            <th>1</th><th>2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>a</td><td>b</td>
        </tr>
    </tbody>
</table>
```

### Code

```html
<pre class="prs-code">
    <code></code>
</pre>
```

### Embed 
###### *(Actually working with Youtube)*

```html
<figure class="prs-embed prs_youtube">
    <iframe width="580" height="320" src="https://www.youtube.com/embed/CwXOrWvPBPk" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen="1"></iframe>
    <figcaption>Shrek (2001) Trailer</figcaption>
</figure>
```

### Delimiter

```html
<hr class="prs-delimiter">
```

### LinkTool

```html
<figure class="prs-linkTool">
    <a href="https://github.com/" target="_blank">
       <img src="https://example.com/cat.png" alt="">
       <p class="prs_title">Title</p>
       <p class="prs_description">Description</p>
       <p class="prs_sitename">example.com</p>
    </a>
</figure>
```

### Image

```html
<figure class="prs-image prs_withborder prs_withbackground prs_stretched">
    <img src="" alt="">
    <figcaption></figcaption>
</figure>
```

### Quote

```html
<figure class="prs-quote prs_center">
    <blockquote></blockquote>
    <figcaption></figcaption>
</figure>
```

### Warning

```html
<div class="prs-warning">
    <i></i>
    <h4>Title</h4>
    <p>Message</p>
</div>
```

### Alert

```html
<p class="prs-alert prs_center prs_success">
    Alert!
</p>
```

### Raw

```html
<div class="prs-raw">
    Raw HTML ...
</div>
```
For more information about parser, see: [https://github.com/editor-js/editorjs-php](https://github.com/Edd-G/editorjs-simple-html-parser)
