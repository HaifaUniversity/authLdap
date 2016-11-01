<?php
/**
 * Copyright (c) Andreas Heigl<andreas@heigl.org>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright Andreas Heigl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT-License
 * @since     04.09.2016
 * @link      http://github.com/heiglandreas/authLDAP
 */
/*
Plugin Name: AuthLDAP
Plugin URI: https://github.com/heiglandreas/authLdap
Description: This plugin allows you to use your existing LDAP as authentication base for WordPress
Version: 2.0.0
Author: Andreas Heigl <a.heigl@wdv.de>
Author URI: http://andreas.heigl.org
*/
require_once __DIR__ . '/src/Autoloader/Autoloader.php';
\Org_Heigl\Wp\AuthLdap\Autoloader\Autoloader::register();

add_filter('show_password_fields', [\Org_Heigl\Wp\AuthLdap\Factory::class, 'show_password_fields'], 10, 2);
add_filter('allow_password_reset', [\Org_Heigl\Wp\AuthLdap\Factory::class, 'allow_password_reset'], 10, 2);
add_action('admin_menu', [\Org_Heigl\Wp\AuthLdap\Admin\OptionsFactory::class, 'addmenu']);
add_action('admin_init', [\Org_Heigl\Wp\AuthLdap\Admin\OptionsFactory::class, 'init']);
add_filter('authenticate', [\Org_Heigl\Wp\AuthLdap\Factory::class, 'login'], 10, 3);
add_filter('send_password_change_email', [\Org_Heigl\Wp\AuthLdap\Factory::class, 'send_change_email'], 10, 3);
add_filter('send_email_change_email', [\Org_Heigl\Wp\AuthLdap\Factory::class, 'send_change_email'], 10, 3);

