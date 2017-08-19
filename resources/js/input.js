/**
 *

 ### SimpleMDE buttons list
 bold
 italic
 heading
 |
 quote
 unordered-list
 ordered-list
 |

 strikethrough
 code
 clean-block
 table
 horizontal-rule
 |
 link
 image
 |
 preview
 side-by-side
 fullscreen
 guide

 heading-smaller
 heading-bigger
 heading-1
 heading-2
 heading-3

 */


$(document).on('ajaxComplete ready', function () {
    var SMDES = [];
    // Initialize markdown inputs.
    $('[data-provides="oimken.field_type.simplemde"]:not([data-initialized])').each(function (i) {
        $(this).attr('data-initialized', '');
        SMDES[i] = new SimpleMDE({
            element: $(this)[0],
            // promptURLs: true,
            spellChecker: false,
            toolbar: [
                "bold", "italic", "heading", "|", "quote", "unordered-list", "ordered-list",
                "|", "horizontal-rule", "table", "code", "clean-block", "|", "link",
                {
                    name: "image",
                    action: function (editor) {
                        $(editor).SMDEFileInsert({mode: "image"});
                    },
                    className: "fa fa-picture-o",
                    title: "Insert Image",
                },
                "|", "preview", "side-by-side", "fullscreen"
            ]
        });

        if(SMDE_AUTOGROW) {
            $('.CodeMirror, .CodeMirror-scroll').css('min-height', SMDE_HEIGHT + 'px');
        } else {
            $('.CodeMirror, .CodeMirror-scroll').css('height', SMDE_HEIGHT + 'px');
        }
    });
});