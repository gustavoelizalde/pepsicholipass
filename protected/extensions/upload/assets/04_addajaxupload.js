// JavaScript Document
var upload_btn;
var _cantTotal;

function addAjaxUpload(_id, _action, _ext, _rec, _app, _ct) {
    _cantTotal = _ct;
    upload_btn = new AjaxUpload('#' + _id, {
        action: _action,
        onSubmit: function(file, ext) {
            if (_ext != "*") {
                reg = new RegExp("\\b(" + _ext + ")\\b", "g");
                if (!(ext && reg.test(ext))) {
                    alert('Error: Extención no válida.');
                    return false;
                }
            }
            if (countFiles() >= _cantTotal)
            {
//                alert("Sólo se permiten " + _cantTotal + " archivos.");
                return false;
            }
            this.disable();
            $('#' + _id + ' #loader').css('display', 'block');
            $('#' + _id).addClass('disabled');
        },
        onComplete: function(file, response) {
            if (response != "error") {
                $('#' + _id + ' #label').html(file);
                addListItem(response, _rec, _app);
            } else {
                $('#' + _id + ' #label').html("Error al subir archivo");
            }

            $('#' + _id + ' #loader').css('display', 'none');
            $('#' + _id).removeClass('disabled');
            if (countFiles() < _cantTotal)
                this.enable();
        }
    });
    if (countFiles() >= _cantTotal)
    {
        upload_btn.disable();
    }
    $('#' + _id).click(function() {
        alert("No se puede subir mas de " + _cantTotal + " archivos");
    });
}

function addListItem(img, _rec, _app) {
    var hiddenFile = '<input type="hidden" name="archivo[]" value="' + img + '" />';
    var deleteBtn = '<a href="javascript:deleteArchivo(\'' + _app + '/admin/upload/deleteArchivo\',\'' + img + '\',\'' + _app + '/upload/' + img + '\');" class="deleteItem" onclick="return confirm(\'Eliminar?\')"></a>';
    var imgThumb = '<img src="' + _app + '/upload/' + img + '" />';
    var recortes = _rec.split("|");
    var recortesBtn = recortes.length > 0 ? "<b>Realizar Recortes</b><br>" : "";
    for (var i = 0; i < recortes.length; i++) {
        recortesBtn += '<a onclick="return false;" href="' + _app + '/admin/upload/cropper?file=' + $.base64.encode(img) + '&size=' + recortes[i] + '" class="crop fancybox-ajax-crop">' + recortes[i] + '</a>';
    }
    recortesBtn += recortes.length > 0 ? "<br><br><b>Ver Recortes</b><br>" : "";
    for (var i = 0; i < recortes.length; i++) {
        recortesBtn += '<a onclick="return false;" href="' + _app + '/upload/' + recortes[i] + '/' + img + '" class="crop fancybox">' + recortes[i] + '</a>';
    }
    var li = '<li>' + hiddenFile + deleteBtn + imgThumb + recortesBtn + '<div class="clear"></div></li>';
    $(".listItems ul").prepend(li);

    asignLightbox();
}

function asignLightbox() {
    $(".fancybox-ajax-crop").fancybox({
        padding: 6,
        onComplete: function() {
            $('#jcrop_target').Jcrop({
                onChange: showPreview,
                onSelect: showPreview,
                setSelect: [0, 0, $("#width_thumb").val(), $("#height_thumb").val()],
                aspectRatio: $("#width_thumb").val() / $("#height_thumb").val()
            });
        }
    });

    $(".fancybox").fancybox({
        padding: 6
    });
}

function deleteArchivo(_url, _archivo, _src) {
    $.ajax({
        url: _url,
        type: "POST",
        data: {archivo: _archivo},
        success: function(data) {
            if (data == "ok")
                $("img[src='" + _src + "']").parent("li").hide(function() {
                    $(this).remove();
                    if (countFiles() < _cantTotal)
                        upload_btn.enable();
                });
            else
                alert("Error al eliminar archivo");
        }
    });
}

function sendCrop(_url) {
    $.ajax({
        url: _url,
        type: "POST",
        data: $("#formCrop").serialize(),
        success: function(data) {
            $.fancybox.close();
        }
    });
}

function showPreview(coords) {
    // Set sizes
    $("#x_top").val(coords.x);
    $("#y_top").val(coords.y);
    $("#width").val(coords.w);
    $("#height").val(coords.h);

    // Preview
    var rx = 100 / coords.w;
    var ry = 100 / coords.h;

    $('#preview').css({
        width: Math.round(rx * $("#tam_0").val()) + 'px',
        height: Math.round(ry * $("#tam_1").val()) + 'px',
        marginLeft: '-' + Math.round(rx * coords.x) + 'px',
        marginTop: '-' + Math.round(ry * coords.y) + 'px'
    });
}

function countFiles() {
    return $('#boxArchivos ul li').size();
}