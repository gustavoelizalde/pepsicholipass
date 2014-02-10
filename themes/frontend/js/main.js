var _platform = navigator.platform;
var _userAg = navigator.userAgent;

var _plataforma="";
$(document).ready(function(e) {
    LogIn();
	
	if(_userAg.indexOf("Windows")!=-1){
		_plataforma = "windows";
	}else if(_userAg.indexOf("Macintosh")!=-1){
		_plataforma = "Mac";
	}
	$('html').addClass(_plataforma);
});

function LogIn() {
    FB.init({
        appId: '259251744243981', // App ID from the App Dashboard
        status: true, // check the login status upon init?
        cookie: true, // set sessions cookies to allow your server to access the session?
        xfbml: true  // parse XFBML tags on this page?
    });
    console.log("listo! api fb load!");
}

(function(d, debug) {
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement('script');
    js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
    ref.parentNode.insertBefore(js, ref);
}(document, /*debug*/false));

function isLogin(url) {
    LogIn();
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            console.log('logged');
            window.location.replace(url);
            var uid = response.authResponse.userID;
            var accessToken = response.authResponse.accessToken;
        } else if (response.status === 'not_authorized') {
            console.log('log no autorizado');
            FB.login(function(e) {
                if (e.status == 'connected') {
                    window.location.replace(url);
                } else {
                    alert('no acepto los permisos!')
                }
            }, {scope: 'email,user_birthday'});
        } else {
            console.log('no logueado');
        }
    });
}

function loadates() {
    FB.getLoginStatus(function(response) {
        FB.api('/me', function(response) {
            $('input[name="Registrados[facebookId]"]').attr('value', response.id);
            $('input[name="Registrados[nombre]"]').attr('value', response.first_name);
            $('input[name="Registrados[apellido]"]').attr('value', response.last_name);
            $('input[name="Registrados[email]"]').attr('value', response.email);
            $('input[name="Registrados[telefono]"]').attr('value', 'Teléfono');
            $('textarea[name="Registrados[comentario]"]').html('¿Qué significa para ti Vivir Hoy?');
            $('input[name="Registrados[birthday]"]').attr('value', response.birthday);
            
            $('#userdate input[type="text"], #userdate textarea').each(function(){
                $(this).attr('text-empty',$(this).val());
                $(this).focusin(function(){
                    if($(this).val() == $(this).attr('text-empty'))    
                        $(this).val('');
                });
                $(this).focusout(function(){
                    if($.trim($(this).val()) == '')
                        $(this).val($(this).attr('text-empty'));
                });
            });
        });
    })
}

function validarEmail(id) {
    if ($(id).val().indexOf('@', 0) == -1 || $(id).val().indexOf('.', 0) == -1) {
        alert('La dirección e-mail parece incorrecta');
        return false;
    } else {
        return true;
    }
}

function alert(txt) {
    try {
        jAlert(txt, "Alerta", false);
    } catch (e) {
        alert(txt);
    }
}