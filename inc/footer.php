

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

    <?php

    if (isset($_GET["force-container"])) {
        echo "<style>.container {width: 970px !important;}</style>";
    }
    if (isset($_GET["maqueta"])) {
        ?>
        <div id="maqueta"></div>
        <a href="#" id="toggle-maqueta" onclick="$('#maqueta').toggle();return false;">Toggle</a>
        <a href="#" id="toggle-opacity" onclick="toggleOpacity();return false;">Opacity</a>
        <a href="#" id="maqueta-up" onclick="moveMaqueta('up');return false;">Up</a>
        <a href="#" id="maqueta-down" onclick="moveMaqueta('down');return false;">Down</a>
        <script>
            function supportsHtml5Storage() {
                try {
                    return 'localStorage' in window && window['localStorage'] !== null;
                } catch (e) {
                    return false;
                }
            }
            var opacity = 1;
            function toggleOpacity() {
                $('#maqueta').css("opacity", opacity);
                opacity = opacity == 1 ? 0.5 : 1;
            }
            function moveMaqueta(direction) {
                $('#maqueta').css('margin-top', function (index, curValue) {
                    var value = parseInt(curValue, 10) + (1*(direction == 'up' ? 1 : -1)) + 'px';
                    if(supportsHtml5Storage) {
                        window.localStorage['maquetaMarginTop'+window.location.href] = value;
                    }
                    return value;
                });
            }

            if (supportsHtml5Storage() && window.localStorage['maquetaMarginTop'+window.location.href]) {
                $('#maqueta').css('margin-top', window.localStorage['maquetaMarginTop'+window.location.href]);
            }
        </script>
        <style>
            #maqueta {position: absolute; top: 0; left: 0; right: 0; bottom: 0; width: 1020px; height: 4429px;
                background: transparent url(maqueta/<?php echo $_GET["maqueta"];?>) no-repeat top center;opacity: .5;z-index: 999;
                margin: 0 auto; border: 1px solid red;}
            #toggle-maqueta {position: fixed; top: 10px; left: 10px; background: black; color: white; text-transform: uppercase;
                font-size: 12px;z-index: 9999;padding: 5px;}
            #toggle-opacity {position: fixed; top: 40px; left: 10px; background: black; color: white; text-transform: uppercase;
                font-size: 12px;z-index: 9999;padding: 5px;}
            #maqueta-up {position: fixed; top: 70px; left: 10px; background: black; color: white; text-transform: uppercase;
                font-size: 12px;z-index: 9999;padding: 5px;}
            #maqueta-down {position: fixed; top: 70px; left: 40px; background: black; color: white; text-transform: uppercase;
                font-size: 12px;z-index: 9999;padding: 5px;}
        </style>
    <?php
    }

    ?>
</body>
</html>