;(function ($, window, document, undefined) {
    function SMDEFileInsert(SMDE, opts) {
        this.opts = $.extend({}, SMDEFileInsert.DEFAULTS, opts);
        this.$el = $(SMDE.element);
        this.modalName = SMDE.element.name;
        this.SMDE = SMDE;
        this._init();
    }

    SMDEFileInsert.DEFAULTS = {
        mode: 'image',
        folders: ''
    };
    SMDEFileInsert.prototype = {
        constructor: SMDEFileInsert,
        _init: function () {
            var _this = this;
            $('#' + this.modalName + '-modal')
                .one(
                    'click',
                    'a[data-select="image"]',
                    function (event) {
                        _this._insert(event);
                    }
                );

            this._select();
        },
        _select: function () {
            var _this = this;
            $('#' + _this.modalName + '-modal')
                .modal('show')
                .find('.modal-content')
                .load(REQUEST_ROOT_PATH + '/streams/simplemde-field_type/index?' + $.param(_this.opts));
        },
        _insert: function (event) {
            var _this = this,
                _cm = this.SMDE.codemirror;

            var file = $(event.target).data("entry");
            if (!file) {
                console.log(event);
                alert('There was a problem attaching this image. Please try again.');
                return false;
            }
            file = REQUEST_ROOT_PATH + '/files/' + file;


            var insertContent = "[" + _cm.getSelection() + "](" + file + ")";
            if (_this.opts.mode == 'image') {
                insertContent = "!" + insertContent;
            }
            _cm.replaceSelection(insertContent);
            _cm.setSelection(_cm.getCursor("start"), _cm.getCursor("end"));
            _cm.focus();


            $(event.target).closest('.modal').modal('hide');
            return true;
        },
        _upload: function() {
            /** To be continue... */
        }
    }

    $.fn.extend({
        SMDEFileInsert: function(opts) {
            return this.each(function() {
                new SMDEFileInsert(this, opts);
            })
        }
    })
})(jQuery, window, document);