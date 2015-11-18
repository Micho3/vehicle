<?php /* Smarty version 2.6.25-dev, created on 2015-10-30 06:35:29
         compiled from D:%5Cworkspace%5Cphp%5Cvehicle%5Capplication%5Cviews/index/index.html */ ?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['static']['css']; ?>
common/jqm/jquery.mobile-1.3.2.min.css"/>
    <script src="<?php echo $this->_tpl_vars['static']['js']; ?>
jqm/jquery-1.11.3.min.js"></script>
    <script src="<?php echo $this->_tpl_vars['static']['js']; ?>
jqm/jquery.mobile-1.3.2.min.js"></script>
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['static']['css']; ?>
common/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>欢迎您</title>
</head>
<body>
    <!--首页开始-->
    <div data-role="page" id="home">
        <div data-role="header">
            <h1>主功能页</h1>
        </div>
        <div data-role="content" class="contentIndex">
            <a href="<?php echo $this->_tpl_vars['url']['insert']; ?>
" data-role="button" class="ui-li-heading">录入</a>
            <a href="<?php echo $this->_tpl_vars['url']['search']; ?>
" data-role="button" class="ui-li-heading">搜索</a>
            <a href="#maintenance" data-role="button" class="ui-li-heading">维护</a>
        </div>
    </div>
    <!--首页结束-->


<!--搜索页面开始-->
    <div data-role="page" id="search">
        <div data-role="header">
            <h1>搜索页</h1>
        </div>
    </div>
<!--搜索页面结束-->
<!--维护页面开始-->
    <div data-role="page" id="maintenance">
        <div data-role="header">
            <h1>维护页</h1>
        </div>
    </div>
<!--维护页面结束-->
</body>
</html>