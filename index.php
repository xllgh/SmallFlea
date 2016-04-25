<?php
// ���PHP����
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// ��������ģʽ ���鿪���׶ο��� ����׶�ע�ͻ�����Ϊfalse
define('APP_DEBUG',True);

// ����Ӧ��Ŀ¼
define('APP_PATH','./SmallFlea/');
define('BIND_MODULE','Home');

// ����ThinkPHP����ļ�
require 'D:\thinkphp_3.2.3_full\ThinkPHP\ThinkPHP.php';
?>