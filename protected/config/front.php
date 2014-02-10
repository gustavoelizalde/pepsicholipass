<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            'name' => 'Frontend',
            'theme' => 'frontend',
            'homeUrl' => array('site/index'),
            'components' => array(
                'user' => array(
                    // enable cookie-based authentication
                    'allowAutoLogin' => true,
                    'class' => 'WebUserFront',
                    //'stateKeyPrefix'=>'frontend_user',
                    'returnUrl' => array('site/index'),
                ),
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    'rules' => array(
                        '<_a>' => 'site/<_a>',
                        '<_c>/<_a>' => '<_c>/<_a>',
                    ),
                ),
            )
                )
);