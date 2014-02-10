<body>
    <div id="ticket">
        <a class="recomndar" href="javascript:void(0);"><span>recomendar</span></a>
        <h1><?php echo CMSClass::getContenido(intval($_GET['id']))->getText('titulo', 1); ?></h1>
    </div>

    <script>
        $('a.recomndar').click(function(e) {
            var padre = window.parent;
            padre.share();
        });
    </script>
</body>
</html>
