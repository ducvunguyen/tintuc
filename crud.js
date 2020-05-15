<script>
    var page = window.location.hash.replace('?page', '');
    if (!page) {
        page = 1;
    }

    $(document).on('click','.pagination a', function(e) {
        e.preventDefault();
        //to get what page, when you click paging
        var page = $(this).attr('href').split('page=')[1];
        BaseMoet.loadDataItems(page);
        location.hash = page;
    });

    (function($){
        $.fn.setCursorToTextEnd = function() {
            $initialVal = this.val();
            this.val($initialVal + ' ');
            this.val($initialVal);
        };
    })(jQuery);

    BaseMoet = {
        _urlLoadDataItems: null,
        _urlAdd: null,
        _urlStore: null,
        _urlEdit: null,
        _urlUpdate: null,
        _urlDelete: null,
        _urlDestroy: null,
        _parameters: null,
        _select2Class: null,
        _formStore: null,
        _formUpdate: null,
        _formDestroy: null,
        _keywordSearch: "keyword_search",

        initParameter: function(parameters = array()) {
            BaseMoet._parameters = parameters;
        },

        getParameter: function() {

            var data = {};

            $.each(BaseMoet._parameters, function(key, elementName) {
                if($("#"+elementName).is("input")) {
                    data[elementName] = $("#"+elementName).val();
                }
                if($("#"+elementName).is("select")) {
                    if($("#"+elementName).attr('multiple') == "multiple") {
                        data[elementName] = $("#"+elementName).val();
                    }
                    else {
                        data[elementName] = $("#"+elementName).find("option:selected").val()
                    }
                }
                if ($("#"+elementName).is(":radio")) {
                    data[elementName] = $("[id="+elementName+"]:checked").val();
                }
            });

            return data;
        },

        init: function (urlLoadDataItems = null, urlAdd = null, urlStore = null, urlEdit = null, urUpdate = null, urlDelete = null, urlDestroy = null) {

            BaseMoet._urlLoadDataItems = urlLoadDataItems;
            BaseMoet._urlAdd = urlAdd;
            BaseMoet._urlStore = urlStore;
            BaseMoet._urlEdit = urlEdit;
            BaseMoet._urlUpdate = urUpdate;
            BaseMoet._urlDelete = urlDelete;
            BaseMoet._urlDestroy = urlDestroy;

            $("#"+BaseMoet._keywordSearch).blur(function () {
                window.location.hash = '';
                BaseMoet.loadDataItems(1);
            });

            $("#"+BaseMoet._keywordSearch).on("keypress", function (e) {
                if (e.keyCode == 13) {
                    window.location.hash = '';
                    BaseMoet.loadDataItems(1);
                }
            });

            BaseMoet.loadDataItems(page);
        },

        initForm: function(formStore = null, formUpdate = null, formDestroy = null) {
            if(formStore != null)
                BaseMoet._formStore = formStore;
            if(formUpdate != null)
                BaseMoet._formUpdate = formUpdate;
            if(formDestroy != null)
                BaseMoet._formDestroy = formDestroy;
        },

        loadDataItems: function (page = 1, is_export = null) {
            overLoadingData($('#div_overlay_process'));
            let data_type;

            if (is_export == 1) {
                data_type = 'json';                
            }
            else {
                data_type = 'text';
            }

            let this_data = BaseMoet.getParameter();

            $.ajax({
                url: BaseMoet._urlLoadDataItems + '?page=' + page,
                type: "POST",
                dataType: data_type,
                data: {
                    is_export: is_export,
                    data: this_data,
                },
                success: function (result) {
                    if (is_export == 1) {
                        var a = document.createElement("a");
                        a.href = result.file;
                        a.download = result.name;
                        document.body.appendChild(a);
                        a.click();
                        a.remove();
                    } else {
                        $('#data-items').html(result);
                    }
                    hideOverLoadingData($('#div_overlay_process'));
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    hideOverLoadingData($('#div_overlay_process'));
                }
            });
        },

        add: function () {
            $.ajax({
                url: BaseMoet._urlAdd,
                type: "POST",
                data: {},
                success: function (result) {
                    $('#div_modal_box').html(result);
                    $('#div_modal_box').modal({show: true});
                    $(".select2").select2();

                    hideOverLoadingData($('#div_overlay_process'));
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    hideOverLoadingData($('#div_overlay_process'));
                }
            });
        },

        store: function() {
            $.ajax({
                url: BaseMoet._urlStore,
                type: "POST",
                data: $("#"+BaseMoet._formStore).serialize(),
                success: function (result) {
                    let data = JSON.parse(result);
                    if(data.status == 200) {
                        swal({
                            title: data.title,
                            icon: "success",
                            type: "success",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        BaseMoet.loadDataItems(1)
                    }
                    else {
                        swal({
                            title: data.title,
                            icon: "error",
                            type: "error",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }

                    $('#div_modal_box').modal('hide');
                    BaseMoet.loadDataItems(1);
                    hideOverLoadingData($('#div_overlay_process'));
                },
                error: function (response) {
                    let message = response.responseJSON.errors;
                    $.each(message, function(key, item) {
                        swal({
                            title: item,
                            icon: "error",
                            type: "error",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        return false;
                    });
                }
            });
        },

        edit: function (id) {
            $.ajax({
                url: BaseMoet._urlEdit,
                type: "POST",
                data: {id:id},
                success: function (result) {
                    $('#div_modal_box').html(result);
                    $('#div_modal_box').modal({show: true});
                    $(".select2").select2();

                    hideOverLoadingData($('#div_overlay_process'));
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    hideOverLoadingData($('#div_overlay_process'));
                }
            });
        },

        update: function() {
            $.ajax({
                type : 'POST',
                url : BaseMoet._urlUpdate,
                data : $("#"+BaseMoet._formUpdate).serialize(),
                success: function (result) {
                    let data = JSON.parse(result);
                    if(data.status == 200) {
                        swal({
                            title: data.title,
                            icon: "success",
                            type: "success",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $('#div_modal_box').modal('hide');
                        BaseMoet.loadDataItems(1);
                        return false;
                    }else{
                        swal({
                            title: data.title,
                            icon: "errors",
                            type: "errors",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }

                    hideOverLoadingData($('#div_overlay_process'));
                },
                error: function (response) {
                    let message = response.responseJSON.errors;
                    $.each(message, function(key, item) {
                        swal({
                            title: item,
                            icon: "error",
                            type: "error",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        return false;
                    });
                }
            });
        },

        delete: function (id) {
            $.ajax({
                url: BaseMoet._urlDelete,
                type: "POST",
                data: {id:id},
                success: function (result) {
                    $('#div_modal_box').html(result);
                    $('#div_modal_box').modal({show: true});
                    hideOverLoadingData($('#div_overlay_process'));
                    BaseMoet.loadDataItems(1);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    hideOverLoadingData($('#div_overlay_process'));
                }
            });
        },

        destroy: function(id) {
            $.ajax({
                type: 'POST',
                url : BaseMoet._urlDestroy,
                data: {
                    id: id,
                },
                success: function (result) {
                    let data = JSON.parse(result);
                    if (data.status===200){
                        swal({
                            title: data.title,
                            icon: "success",
                            type: "success",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        BaseMoet.loadDataItems(1);
                    }else {
                        swal({
                            title: data.title,
                            icon: "errors",
                            type: "errors",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }
                    $('#div_modal_box').modal('hide');
                    hideOverLoadingData($('#div_overlay_process'));
                    BaseMoet.loadDataItems(1);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    hideOverLoadingData($('#div_overlay_process'));
                }
            });
        }
    }
</script>
