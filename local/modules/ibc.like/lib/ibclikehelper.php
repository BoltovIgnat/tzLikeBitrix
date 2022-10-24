<?php

namespace Ibc\Like;

use Bitrix\Main\Entity\Validator;
use Bitrix\Main\Localization\Loc;
use Ibc\Like\LikeTable;
Loc::loadMessages(__FILE__);

class IbcLikeHelper
{


    public static function likeArticle($params)
    {
        $infoparams = [];
        $infoparams['articleid'] = $params['articleid'];
        $infoparams['userid'] = $params['userid'];

        $arResult = self::getInfolikeArticle($infoparams);

        AddMessage2Log( print_r($params,1));
        if (empty($arResult)){

            $income = LikeTable::createObject();
            $income->set('articleid', $params['articleid']);
            $income->set('userid', $params['userid']);
            $income->set('like', $params['like']);

            $income->save();

        }else{

            LikeTable::update($arResult['id'], $params);

        }

        return $params;

    }

    public static function getInfolikeArticle($params)
    {

        $arResult = [];

        $dbEnums = LikeTable::getList([
            'select' => ['*'],
            'filter' => $params
        ]);

        while($arEnum = $dbEnums->fetch()) {
            $arResult = $arEnum;
        }

        return $arResult;

    }

}
