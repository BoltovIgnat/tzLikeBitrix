<?php

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Ibc\Like\LikeTable;

Loc::loadMessages(__FILE__);

class ibc_like extends CModule
{
    public function __construct()
    {
        $arModuleVersion = array();
        
        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }
        
        $this->MODULE_ID = 'ibc.like';
        $this->MODULE_NAME = '!Модуль like';
        $this->MODULE_DESCRIPTION =  'Модуль like';
        $this->MODULE_GROUP_RIGHTS = 'N';
        $this->PARTNER_NAME = 'ibc';
        $this->PARTNER_URI = 'ibc';
    }

    public function doInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $this->installDB();
        $this->InstallEvents();

        copyDirFiles($_SERVER['DOCUMENT_ROOT'] . '/local/modules/ibc.like/ajax', $_SERVER["DOCUMENT_ROOT"] . '/ajax', true, true);
    }

    public function doUninstall()
    {
        $this->uninstallDB();
        $this->UnInstallEvents();

        DeleteDirFilesEx("/ajax/like");
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    public function installDB()
    {
        if (Loader::includeModule($this->MODULE_ID))
        {

            LikeTable::getEntity()->createDbTable();

        }
    }

    public function uninstallDB()
    {
        if (Loader::includeModule($this->MODULE_ID))
        {
            $connection = Application::getInstance()->getConnection();

            $connection->dropTable(LikeTable::getTableName());


        }
    }

    function InstallEvents()
    {
       $eventManager = \Bitrix\Main\EventManager::getInstance();

        $eventManager->registerEventHandler("main", "onProlog", "ibc.accounting", "\\Ibc\\Accounting\\EventHandler", "includeJsOnPageEpilog");

    }

    function UnInstallEvents()
    {

        \Bitrix\Main\EventManager::getInstance()->unRegisterEventHandler(
            "main", "onProlog", "ibc.accounting", "\\Ibc\\Accounting\\EventHandler", "includeJsOnPageEpilog"
        );
    }
}
