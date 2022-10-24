<?php

namespace Ibc\Like;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\Entity\Validator;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class LikeTable extends DataManager
{
    public static function getTableName()
    {
        return 'ibc_like';
    }

    public static function getMap()
    {
        return array(
            new IntegerField('id', array(
                'autocomplete' => true,
                'primary' => true,
                'title' => 'id',
            )),
            new StringField('articleid', array(
                'required' => false,
                'title' => 'Код статьи',
            )),
            new StringField('userid', array(
                'required' => false,
                'title' => 'Код ользователя',
            )),
            new StringField('like', array(
                'required' => false,
                'title' => 'Состояние',
            )),
        );
    }
}
