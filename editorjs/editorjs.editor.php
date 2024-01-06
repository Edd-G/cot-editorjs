<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=editor
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

require_once cot_incfile('editorjs', 'plug');

if ($env['ext'] == 'page' && cot::$usr['id'] > 0)
{
    // Editor.js styles
    Resources::addFile($cfg['plugins_dir'].'/editorjs/css/editorjs.css', 'css', 10);
    // Loading Editor.js plugins
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/editorjs-header-with-alignment@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/editorjs-paragraph-with-alignment@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/list@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/raw', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/embed@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/link@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/marker@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/underline@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/editorjs-alert@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/warning@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/table@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/quote@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/code@latest', 'js', 90);
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest', 'js', 90);

    // Loading Editor.js core
    Resources::linkFileFooter('https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest', 'js', 90);

    // Init Editor.js
    // Resources::linkFileFooter($cfg['plugins_dir'].'/editorjs/js/editorjs.js', 'js', 100);

    $editor_data = ejs_parse_html($pag['page_text']) ? ejs_parse_html($pag['page_text']) : '[]';

    Resources::addEmbed('
        const data = '.$editor_data.',
            i18n = {
            direction: "'.$L['i18n_direction'].'",
            messages: {
                /**
                * Other below: translation of different UI components of the editor.js core
                */
                ui: {
                    "blockTunes": {
                        "toggler": {
                            "Click to tune": "'.$L['i18n_ui_blocktunes_toggler_clicktotune'].'",
                            "or drag to move": "'.$L['i18n_ui_blocktunes_toggler_ordragtomove'].'"
                        },
                    },
                    "inlineToolbar": {
                        "converter": {
                            "Convert to": "'.$L['i18n_ui_inlinetoolbar_converter_convertto'].'"
                        }
                    },
                    "toolbar": {
                        "toolbox": {
                            "Add": "'.$L['i18n_ui_toolbar_toolbox_add'].'"
                        }
                    },
                    "popover": {
                        "Filter": "'.$L['i18n_ui_popover_filter'].'",
                        "Nothing found": "'.$L['i18n_ui_popover_nothingfound'].'"
                    }
                },
                /**
                * Section for translation Tool Names: both block and inline tools
                */
                toolNames: {
                    "Text": "'.$L['i18n_toolnames_text'].'",
                    "Heading": "'.$L['i18n_toolnames_heading'].'",
                    "List": "'.$L['i18n_toolnames_list'].'",
                    "Warning": "'.$L['i18n_toolnames_warning'].'",
                    "Checklist": "'.$L['i18n_toolnames_checklist'].'",
                    "Quote": "'.$L['i18n_toolnames_quote'].'",
                    "Code": "'.$L['i18n_toolnames_code'].'",
                    "Delimiter": "'.$L['i18n_toolnames_delimiter'].'",
                    "Raw HTML": "'.$L['i18n_toolnames_raw_html'].'",
                    "Table": "'.$L['i18n_toolnames_table'].'",
                    "Link": "'.$L['i18n_toolnames_link'].'",
                    "Marker": "'.$L['i18n_toolnames_marker'].'",
                    "Bold": "'.$L['i18n_toolnames_bold'].'",
                    "Italic": "'.$L['i18n_toolnames_italic'].'",
                    "Underline": "'.$L['i18n_toolnames_underline'].'",
                    "InlineCode": "'.$L['i18n_toolnames_inlinecode'].'",
                    "Alert": "'.$L['i18n_toolnames_alert'].'",
                    "Image": "'.$L['i18n_toolnames_image'].'",
                },
                tools: {
                    /**
                     * Each subsection is the i18n dictionary that will be passed to the corresponded plugin
                     * The name of a plugin should be equal the name you specify in the \'tool\' section for that plugin
                     */
                    /**
                     * Link is the internal Inline Tool
                     */
                    "link": {
                        "Add a link": "'.$L['i18n_tools_link_addalink'].'"
                    },
                    /**
                     * The "stub" is an internal block tool, used to fit blocks that does not have the corresponded plugin
                     */
                    "stub": {
                        "The block can not be displayed correctly.": "'.$L['i18n_tools_stub_blockcannotdisplayed'].'"
                    },
                    "image": {
                        "Enter a caption": "'.$L['i18n_tools_image_caption'].'",
                        "Select an Image": "'.$L['i18n_tools_image_selectanimage'].'",
                        "Add Border": "'.$L['i18n_tools_image_withborder'].'",
                        "Stretch Image": "'.$L['i18n_tools_image_stretchimage'].'",
                        "Add Background": "'.$L['i18n_tools_image_withbackground'].'",
                    },
                    "code": {
                        "Enter a code": "'.$L['i18n_tools_code'].'",
                    },
                    "linkTool": {
                        "Link": "'.$L['i18n_tools_linktool_link'].'",
                        "Couldn\'t fetch the link data": "'.$L['i18n_tools_linktool_couldntfetch'].'",
                        "Couldn\'t get this link data, try the other one": "'.$L['i18n_tools_linktool_couldntgetdata'].'",
                        "Wrong response format from the server": "'.$L['i18n_tools_linktool_wrongresponse'].'",
                    },
                    "header": {
                        "Header": "'.$L['i18n_tools_header_header'].'",
                    },
                    "paragraph": {
                        "Enter something": "'.$L['i18n_tools_paragraph_entersomething'].'"
                    },
                    "list": {
                        "Ordered": "'.$L['i18n_tools_list_ordered'].'",
                        "Unordered": "'.$L['i18n_tools_list_unordered'].'",
                    }
                },
                /**
                 * Section allows to translate Block Tunes
                 */
                blockTunes: {
                    /**
                    * Each subsection is the i18n dictionary that will be passed to the corresponded Block Tune plugin
                    * The name of a plugin should be equal the name you specify in the \'tunes\' section for that plugin
                    *
                    * Also, there are few internal block tunes: "delete", "moveUp" and "moveDown"
                    */
                    "delete": {
                        "Delete": "'.$L['i18n_blocktunes_delete'].'",
                        "Click to delete": "'.$L['i18n_blocktunes_clicktodelete'].'"
                    },
                    "moveUp": {
                        "Move up": "'.$L['i18n_blocktunes_moveup'].'"
                    },
                    "moveDown": {
                        "Move down": "'.$L['i18n_blocktunes_movedown'].'"
                    },
                },
            }
        };
        
        // New istance Editor.js
        const editor = new EditorJS({
            holder: "editorjs",
            tools: {
                header: {
                    class: Header,
                    inlineToolbar: true,
                    config: {
                        levels: [1, 2, 3, 4],
                        defaultLevel: 1,
                        defaultAlignment: "left",
                        placeholder: "Header"
                    }
                },
                paragraph: {
                    class: Paragraph,
                    inlineToolbar: true,
                    logLevel: "WARN",
                    config: {
                        placeholder: "Enter something"
                    }
                },
                list: List,
                raw: RawTool,
                // image: InlineImage,
                // image: ImageTool,
                image: SimpleImage,
                embed: {
                    class: Embed,
                    inlineToolbar: true,
                    config: {
                        services: {
                            youtube: true,
                        }
                    }
                },
                linkTool: {
                    class: LinkTool,
                    config: {
                        endpoint: "index.php?r=editorjs",
                    }
                },
                delimiter: Delimiter,
                inlineCode: InlineCode,
                Marker: Marker,
                underline: Underline,
                alert: Alert,
                warning: {
                    class: Warning,
                    config: {
                        titlePlaceholder: "'.$L['tools_warning_title'].'",
                        messagePlaceholder: "'.$L['tools_warning_message'].'",
                    },
                },
                table: {
                    class: Table,
                    inlineToolbar: true,
                    config: {
                        rows: 2,
                        cols: 3,
                    },
                },
                code: CodeTool,
                quote: {
                    class: Quote,
                    inlineToolbar: true,
                    config: {
                        quotePlaceholder: "'.$L['tools_quote_quote'].'",
                        captionPlaceholder: "'.$L['tools_quote_caption'].'",
                    },
                },

            },
            logLevel: "WARN",
            // autofocus: true,
            placeholder: "'.$L['editor_placeholder'].'",
            i18n: i18n,
            /**
             * Previously saved data that should be rendered
             */
            data: data,
            onReady: async () => {
                if (data.length === 0) {
                    await editor.blocks.renderFromHTML(document.getElementById("editorjsdata").value);
                }
            },
            onChange: function(api, event) {
                // console.log("something changed", event);
            }
        });
        const saveButtons = document.getElementsByName("rpagestate");
        if (saveButtons) {
            saveButtons.forEach(function(el) {
                el.addEventListener("click", function(e) {
                    editor.save()
                        .then((savedData) => {
                            document.getElementById("editorjsdata").value = JSON.stringify(savedData);
                        })
                        .catch((error) => {
                            console.error("Saving error", error);
                        });
                });
            });
        }
    ', 'js', 10);
}
