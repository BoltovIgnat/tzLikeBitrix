<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Loader;
use Bitrix\Sale;

Loader::includeModule("ibc.like");


use Ibc\Like\IbcHelper;

$arResult = [];

$params = [
    'articleid' => $_REQUEST['articleid'],
    'userid' => $_REQUEST['userid'],
    'like' => $_REQUEST['like'],
];

$res = IbcHelper::likeArticle($params);

//AddMessage2Log( print_r(,1));

echo json_encode(['result' => $res]);