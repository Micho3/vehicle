<?php

//首页地址
$config['common_url']['index'] = "/Index/index";
//登陆控制器
$config['common_url']['login'] = "Login/index";
//录入起始index
$config['common_url']['insert'] = "/Insert/index";//INDEX.
//订单录入地址
$config['common_url']['order'] = '/Order/index';
//录入第一步地址
$config['common_url']['insertFun']['insertStepOne'] = "insertStepOne";
//录入第二步地址
$config['common_url']['insertFun']['insertStepTwo'] = "insertStepTwo";
//将已存在的用户与车辆匹配
$config['common_url']['insertFun']['getInExistUser'] = "getInExistUser";
//录入新用户
$config['common_url']['insertFun']['insertUser'] = "insertUser";
//获取地区码地址
$config['common_url']['insertFun']['getAreaCode'] = "getAreaCode";
//录入细节信息
$config['common_url']['insertFun']['insertDetail'] = "insertDetail";

//搜索起始index
$config['common_url']['search'] = INDEX."Search/index";
//维护地址
$config['common_url']['maintenance'] = INDEX."Maintenance/index";