<?php
define('UC_CONNECT', 'mysql');
define('UC_DBHOST', '192.168.1.248:61920');
define('UC_DBUSER', 'root');
define('UC_DBPW', '123456');
define('UC_DBNAME', 'test_7477_com_uc');
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`test_7477_com_uc`.uc_');
define('UC_DBCONNECT', '0');
define('UC_KEY', 'ab57Fphl+WBwBLR69isryNJI9573M79eGTVCkX8');
define('UC_API', 'http://u.7477.cc');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '12');
define('UC_PPP', '20');


//Ucenter接入必需,否则报通讯失败
$dbhost = '192.168.1.248:61920';						// 数据库服务器
$dbuser = 'root';								// 数据库用户名
$dbpw = '123456';     // 数据库密码
$dbname = 'test_7477_com_uc';								// 数据库名
$pconnect = 0;											// 数据库持久连接 0=关闭, 1=打开
$tablepre = 'uc_';										// 表名前缀, 同一数据库安装多个论坛请修改此处
$dbcharset = 'utf8'; 
//Cookies设置
$cookiepre = '7477_';
$cookiedomain = '.7477.com';
$cookiepath = '/';