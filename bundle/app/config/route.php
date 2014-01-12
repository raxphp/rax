<?php

/**
 * Your URL routes.
 *
 * Quick rules:
 *
 * - Routes are read from top to bottom. The first matching route will be used.
 * - To make a <placeHolder> required, omit a default value.
 * - To make a <placeHolder> optional, define a default value.
 * - To limit what a <placeHolder> matches, use a rule (defined as a regex).
 * - Use any of the predefined filters (or build your own) to filter a route:
 *   acl, ajax, auth, clientIp, serverIp, method, secure, serverMode, etc.
 *
 *     // Example that uses everything but makes no sense :]
 *     'routeName' => array(
 *         'host'       => '<username>.example.com',
 *         'path'       => '/blog/<page>',
 *         'controller' => 'Blog:index',
 *         'defaults'   => array(
 *             'page' => 1,
 *         ),
 *         'rules' => array(
 *             'page' => '\d+',
 *         ),
 *         'filters' => array(
 *             'ajax'       => true,
 *             'method'     => 'GET|POST',
 *             'secure'     => false,
 *             'serverMode' => 'dev|prod',
 *             'clientIp'   => '68.6.129.81',
 *             'auth'       => false,
 *             'serverIp'   => '173.194.112.231',
 *         ),
 *     ),
 */
return array(
    'default' => array(
        'path'       => '/<controller>/<action>/<id>',
        'controller' => '<controller>:<action>',
        'defaults'   => array(
            'controller' => 'Default',
            'action'     => 'index',
            'id'         => null,
        ),
    ),
);
