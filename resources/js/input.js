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

//projects
$(document).on('ajaxComplete ready', function () {
    var SMDES = [],EL,EL_STORAGE_PATH;
    // Initialize markdown inputs.
    $('[data-provides="oimken.field_type.simplemde"]:not([data-initialized])').each(function (i) {
        $(this).attr('data-initialized', '');
        EL = $(this)[0];
        SMDES[i] = new SimpleMDE({
            element: EL,
            // promptURLs: true,
            spellChecker: false,
            toolbar: [
                "bold", "italic", "heading", "|", "quote", "unordered-list", "ordered-list",
                "|", "horizontal-rule", "table", "code", "clean-block", "|", "link",
                {
                    name: "image",
                    action: function (editor) {
                        $(editor).SMDEFileInsert({mode: "image",filter_folder:SMDE_FOLDER});
                    },
                    className: "fa fa-picture-o",
                    title: "Insert Image",
                },
                "|", "preview", "side-by-side", "fullscreen"
            ]
        });
        $(EL).siblings('.editor-statusbar').prepend($(EL).siblings('.editor-storage-path'));


    });
    if (SMDE_AUTOGROW) {
        $('.CodeMirror, .CodeMirror-scroll').css('min-height', SMDE_HEIGHT + 'px');
    } else {
        $('.CodeMirror, .CodeMirror-scroll').css('height', SMDE_HEIGHT + 'px');
    }
});