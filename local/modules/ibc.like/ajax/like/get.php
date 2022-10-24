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
];

$res = IbcHelper::getInfolikeArticle($params);

//AddMessage2Log( print_r(,1));

echo json_encode(['result' => $res]);