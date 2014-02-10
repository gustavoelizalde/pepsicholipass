<?php
/* @var $this Controller */

function getItems($parent_id = 0) {
    $criteria = new CDbCriteria();
    $criteria->compare('visible', 1, false);
    $criteria->compare('recursos_id', $parent_id, false);
    $criteria->order = 'orden';
    $results = Recursos::model()->findAll($criteria);

    $items = array();

    if (empty($results))
        return $items;

    foreach ($results as $result) {
        if ($result->url == 'javascript:void(0);')
            $htmlOptions = array('onClick' => 'return false;');
        else
            $htmlOptions = array();

        $childItems = getItems($result->id);
        $params = explode(',', $result->parametros);
        $_url = array();
        $_url[] = $result->url;
        foreach ($params as $param) {
            $p = explode('=', $param);
            if ($p[0] != "" && $p[1] != "")
                $_url[$p[0]] = $p[1];
        }
        if (count($childItems) > 0)
            $element = array(
                'label' => $result->nombre,
                'url' => $_url,
                'items' => $childItems,
                'linkOptions' => $htmlOptions,
            );
        else
            $element = array(
                'label' => $result->nombre,
                'url' => $_url,
                'linkOptions' => $htmlOptions,
            );
        if(Yii::app()->user->checkAccess('listar'.$element['label']) || Yii::app()->user->id == 'admin-root')
            $items[] = $element;
    }

    return $items;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description"  content=""/>
        <meta name="keywords" content=""/>
        <meta name="robots" content="ALL,FOLLOW"/>
        <meta name="Author" content="AIT"/>
        <meta http-equiv="imagetoolbar" content="no"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reset.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fancybox.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.wysiwyg.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.ui.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/visualize.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/visualize-light.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-ui-timepicker-addon.css" type="text/css"/>
        <!--[if IE 7]>
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie7.css" />
        <![endif]-->	
    </head>

    <body>

        <div class="pagetop">
            <div class="head pagesize"> <!-- *** head layout *** -->
                <div class="head_top">
                    <div class="topbuts">
                        <ul class="clear">
                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>" target="_blank">View Site</a></li>
                            <!--<li><a href="#">Messages</a></li>
                            <li><a href="#">Settings</a></li>-->
                            <li><?php echo CHtml::link('Logout', array('site/logout'), array('class' => 'red')) ?></li>
                        </ul>

                        <div class="user clear">
                            <img src="<?php echo Yii::app()->user->avatar != "" ? Yii::app()->request->baseUrl . "/upload/64x64/" . Yii::app()->user->avatar : Yii::app()->theme->baseUrl . "/images/avatar.jpg"; ?>" class="avatar" alt="" />
                            <span class="user-detail">
                                <span class="name">Bienvenido <?php echo Yii::app()->user->nombre; ?></span>
                                <span class="text"><?php echo Yii::app()->user->rol; ?></span>
                            </span>
                        </div>
                    </div>

                    <div class="logo clear">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_earth.png" alt="" class="picture" />
                    </div>
                </div>

                <div class="menu">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => getItems(),
                        'htmlOptions' => array(
                            'class' => 'clear'
                        )
                    ));
                    ?>
                </div>
            </div>
        </div>

        <?php if ($this->breadcrumbs): ?>
            <div class="breadcrumb">
                <div class="bread-links pagesize">
                    <ul class="clear fl">
                        <li class="first">Estas aquí:</li>
                    </ul>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
                </div>
            </div>
        <?php endif ?>

        <div class="main pagesize"> <!-- *** mainpage layout *** -->
            <div class="main-wrap">
                <div class="page clear">

                    <?php echo $content; ?>

                </div><!-- end of page -->
            </div>
        </div>

        <div class="footer">
            <div class="pagesize clear">
                <?php echo Yii::app()->params['textFooter']; ?>
                <div class="clear bt-space15"></div>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_earth_footer.png" width="66" alt="19" class="block center" style="opacity:.3;" />
            </div>
        </div>

        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.visualize.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.wysiwyg.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/tiny_mce/jquery.tinymce.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.fancybox.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.idtabs.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.datatables.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jeditable.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.ui.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jcarousel.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.js"></script>

        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-sliderAccess.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-timepicker-addon.js"></script>

        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/excanvas.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/cufon.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Zurich_Condensed_Lt_Bd.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>

        <script type="text/javascript">

            $(document).ready(function(e) {

                $('textarea.tinymce').tinymce({
                    // Location of TinyMCE script
                    script_url: '<?php echo Yii::app()->theme->baseUrl; ?>/js/tiny_mce/tiny_mce.js',
                    // General options
                    theme: "advanced",
                    theme_advanced_buttons1: "bold,italic,link,unlink,forecolor, | , sub, sup , |, code, |,formatselect",
                    theme_advanced_buttons2: "",
                    theme_advanced_buttons3: "",
                    theme_advanced_toolbar_location: "top",
                    theme_advanced_toolbar_align: "left",
                    theme_advanced_statusbar_location: "bottom",
                    theme_advanced_resizing: true,
                    theme_advanced_blockformats: "p,h1,h2,h3",
                    extended_valid_elements: "p[style],strong,b,a[href|class|style|onclick|target|title|rel],table[style],thead,tr,td[colspan|rowspan],th[width],sub,sup,ul[style|class],li,span[style],h3[style]",
                    plugins: 'paste',
                    paste_auto_cleanup_on_paste: true,
                    paste_remove_styles: true,
                    paste_strip_class_attributes: true,
                    force_p_newlines: false,
                    forced_root_block: false,
                    // Example content CSS (should be your site CSS)
                    content_css: "../css/content.css",
                    convert_urls: false,
                    remove_script_host: false,
                    relative_urls: false,
                    // Replace values for the template plugin
                    template_replace_values: {
                        username: "Some User",
                        staffid: "991234"
                    }
                });
				
				//
				$('.menu li.active').parent('ul').parent('li').addClass('active');

            });

        </script>

        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-12958851-8']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>

    </body>
</html>
