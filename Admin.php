<?php
define('ROOT_URL','http://film.com');
$adminurl = ROOT_URL.'/index/admin/index';
header(sprintf('Location:%s',$adminurl));
