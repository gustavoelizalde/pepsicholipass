<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            'name' => 'Backend',
            'theme' => 'manifesto-clean',
            'homeUrl' => array('site/index'),
            
            'components' => array(
                'authManager' => array(
                    'class' => 'CDbAuthManager',
                    'connectionID' => 'db',
			'itemTable'=>'authitem', // Tabla que contiene los elementos de autorizacion
        'itemChildTable'=>'authitemchild', // Tabla que contiene los elementos padre-hijo
        'assignmentTable'=>'authassignment', // Tabla que contiene la signacion usuario-autorizacion
                ),
                'user' => array(
                    // enable cookie-based authentication
                    'allowAutoLogin' => true,
                    'class' => 'WebUser',
                    //'stateKeyPrefix'=>'backend_user',
                    'returnUrl' => array('site/index'),
                ),
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    'rules' => array(
                        'admin' => 'site/index',
                        'admin/login/' => 'site/login',
                        'admin/<_c>/' => '<_c>',
                        'admin/<_c>/<_a>/cat/<cat:\d+>/id/<id:\d+>/' => '<_c>/<_a>',
                        'admin/<_c>/<_a>/id/<id:\d+>/' => '<_c>/<_a>',
                        'admin/<_c>/<_a>/id/<id:\w+>/' => '<_c>/<_a>',
                        'admin/<_c>/<_a>/cat/<cat:\d+>/' => '<_c>/<_a>',
                        'admin/<_c>/<_a>' => '<_c>/<_a>',
                    ),
                ),
                'widgetFactory' => array(
                    'widgets' => array(
                        'CGridView' => array(
                            'cssFile' => false,
                            'itemsCssClass' => 'style1',
                            'pager' => array(
                                'cssFile' => false,
                                'header' => '',
                                'firstPageLabel' => '',
                                'prevPageLabel' => '',
                                'nextPageLabel' => '',
                                'lastPageLabel' => '',
                            ),
                            'summaryText' => false
                        ),
                        'CDetailView' => array(
                            'cssFile' => false,
                            'htmlOptions' => array(
                                'class' => 'style1'
                            ),
                        ),
                    ),
                ),
            ),
            'params' => array(
                'textFooter' => '<p><strong>© 2013 Copyright by Pepsi Cholipass</strong> All rights reserved.</p>',
            )
                )
);