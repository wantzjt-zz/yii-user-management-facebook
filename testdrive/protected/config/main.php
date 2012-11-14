<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*'
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        /*
          'gii'=>array(
          'class'=>'system.gii.GiiModule',
          'password'=>'Enter Your Password Here',
          // If removed, Gii defaults to localhost only. Edit carefully to taste.
          'ipFilters'=>array('127.0.0.1','::1'),
          ),
         */
        'user' => array(
            'debug' => false,
            'userTable' => 'user',
            'translationTable' => 'translation',
            'facebookConfig' => array(
                'appId' => '',
                'secret' => '',
                'domain' => 'http://yii-facebook.com',
                'status' => true,
                'xfbml' => true,
                'cookie' => true,
                'lang' => 'en_US'
            ),
            'loginType' => 9,
            'passwordRequirements' => array(
                'minLowerCase' => 0,
                'minUpperCase' => 0,
                'minDigits' => 8,
                'maxLen' => 128
            ),
            'usernameRequirements' => array(
                'maxLen' => '20',
                'minLen' => '6',
                'match' => '/^[a-z\d_]{5,20}$/i',
                'dontMatchMessage' => 'Username does not match the required pattern.'
            )
        ),
        'usergroup' => array(
            'usergroupTable' => 'usergroup',
            'usergroupMessageTable' => 'user_group_message',
        ),
        'membership' => array(
            'membershipTable' => 'membership',
            'paymentTable' => 'payment',
        ),
        'friendship' => array(
            'friendshipTable' => 'friendship',
        ),
        'profile' => array(
            'privacySettingTable' => 'privacysetting',
            'profileFieldTable' => 'profile_field',
            'profileTable' => 'profile',
            'profileCommentTable' => 'profile_comment',
            'profileVisitTable' => 'profile_visit',
        ),
        'role' => array(
            'roleTable' => 'role',
            'userRoleTable' => 'user_role',
            'actionTable' => 'action',
            'permissionTable' => 'permission',
        ),
        'message' => array(
            'messageTable' => 'message',
        ),
        'registration' => array(
            'enableRegistration' => true,
            'registrationEmail' => 'register@mywebsite.com',
            'enableCaptcha' => false,
        )
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'application.modules.user.components.YumWebUser',
            'loginUrl' => array('//user/user/login')
        ),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yiifacebook',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'cache' => array(
            'class' => 'system.caching.CDummyCache'
        )
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);