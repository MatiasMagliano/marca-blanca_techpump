<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>MARCA BLANCA - Prueba backend developer</title>

    <!-- Star CSS and Javascript -->
        <link rel="stylesheet" href="{{ asset($config['css-reset']) }}" type="text/css" media="screen,projection">
        <link rel="stylesheet" href="{{ asset($config['css-estilos']) }}" type="text/css" media="screen,projection">
        {{-- css de simplemodal --}}
        <link rel="stylecheet" href="{{ asset('css/basic.css') }}" type="text/css" media='screen' />
    <!-- end CSS and Javascript -->
    </head>

    <body>
        <div class="box-header">
            <div class="header">
                <h1 class="logo-sitio"><a href="#" title="Conejox.com">Conejox.com</a></h1>
                <div class="tit-webcams">Webcams</div>

                <div class="logo-cum"><a href="#" title="Cumlouder.com">Cumlouder.com</a></div>

                <div class="menu">
                    <a href="#" title="Acceso a las Chicas en Directo">Acceso a las Chicas en Directo</a> <span>|</span>
                    <a href="#" title="Acceso Miembros">Acceso Miembros</a> <span>|</span>
                    <a href="#" title="Compra Créditos">Compra Créditos</a>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <!-- termina HEADER -->

        <div class="listado-chicas"><p style="text-align:center;">CARGANDO CHICAS...</p></div>
        <!-- termina LISTADO DE CHICAS -->

        <div class="box-footer">
            <div class="menu">
                <a href="#" title="Acceso a las Chicas en Directo">Acceso a las Chicas en Directo</a> <span>|</span>
                <a href="#" title="Acceso Miembros">Acceso Miembros</a> <span>|</span>
                <a href="#" title="Compra Créditos">Compra Créditos</a>
            </div>
        </div>
        <!-- termina MENU FOOTER -->

        <div class="box-copy">
            <div class="menu">
                <p>Copyright © WAMCash Spain Todos los derechos reservados <span>|</span> <a href="#" title="Webmasters">Webmasters</a> </p>
                <p>Contenido para adultos <span>|</span> Tienes que tener mas de 18 años para poder visitarlo. Todas las modelos de esta web son mayores de edad.</p>
            </div>
        </div>
        <!-- termina COPY -->

        <div class="box-data">
            <div class="menu">
                <a href="#" title="Soporte Epoch">Soporte Epoch</a> <span>|</span>
                <a href="#" title="18 U.S.C. 2257 Record-Keeping Requirements Compliance Statement">18 U.S.C. 2257 Record-Keeping Requirements Compliance Statement</a> <span>|</span>
                <a href="#" title="Contacto">Contacto</a> <span>|</span>
                <a href="#" title="Please visit Epoch.com, our authorized sales agent">Please visit Epoch.com, our authorized sales agent</a>
            </div>
        </div>
        <!-- termina DATA -->

        <!-- Load jQuery, SimpleModal and Basic JS files -->
        <script type='text/javascript' src="{{ asset('js/jquery.js') }}"></script>
        <script type='text/javascript' src="{{ asset('js/jquery.simplemodal.js') }}"></script>
        <script>
            // funcion de carga del div
            function cargar_chicas(){
                $(".listado-chicas").load('{{route('reload')}}');

                return false;
            }

            $(document).ready(function() {
                cargar_chicas();

                // se coloca un timer que recargue cada 15 minutos
                setInterval(() => {
                    cargar_chicas();
                }, 900000);

                // simplemodal
                $('.chica').click(function (e) {
                    var src = $(this).children("#enlace").attr("href");
                    $.modal('<iframe src="' + src + '" height="500" width="1024" style="border:0;" scrolling="no">', {
                        closeHTML:"",
                        containerCss:{
                            height:500,
                            padding:0,
                            width:1024
                        },
                        overlayClose:true
                    });

                    return false;
                });
            });
        </script>
    </body>
</html>
