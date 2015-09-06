<?php /* Smarty version 2.6.25-dev, created on 2015-09-06 09:37:39
         compiled from D:%5Cworkspace%5Cvehicle%5Capplication%5Cviews/index/index.html */ ?>
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
    <script src="<?php echo $this->_tpl_vars['static']['js']; ?>
insert/insertStepOne.js"></script>
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
            <a href="#insertStepOne" data-role="button" class="ui-li-heading">录入</a>
            <a href="#search" data-role="button" class="ui-li-heading">搜索</a>
            <a href="#maintenance" data-role="button" class="ui-li-heading">维护</a>
        </div>
    </div>
    <!--首页结束-->

    <!--录入页面开始-->
    <div data-role="page" id="insertStepOne" areaUrl="<?php echo $this->_tpl_vars['function']['getAreaCode']; ?>
" submitUrl="<?php echo $this->_tpl_vars['function']['insertStepOne']; ?>
">

        <div data-role="header">
            <a href="#home" data-icon="back" data-iconpos="notext"></a>
            <h1>录入车牌信息</h1>
        </div>

        <div data-role="content" class="contentIndex">
            <form action="<?php echo $this->_tpl_vars['function']['insertStepOne']; ?>
" method="post" id="licenceForm">
                <label for="licence_province">车牌省份</label>
                <select name="licence_province" id="licence_province">
                    <option value="-">-</option>
                    <?php $_from = $this->_tpl_vars['province']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                        <option value="<?php echo $this->_tpl_vars['val']->code; ?>
"><?php echo $this->_tpl_vars['val']->name; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
                <span id="noticeProvince"></span>
                <label for="licence_area">车牌地域</label>
                <select name="licence_area" id="licence_area">
                    <option value="-">-</option>
                    <?php $_from = $this->_tpl_vars['area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                        <option value="<?php echo $this->_tpl_vars['val']->code; ?>
"><?php echo $this->_tpl_vars['val']->name; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
                <span id="noticeArea"></span>
                <label for="licence_number">车牌号码</label>
                <input type="text" id="licence_number" name="licence_number"/>
                <span id="noticeNumber"></span>
                <br />
                <span id="insertSubmit" data-role="button" data-theme="b" data-transition="flow" />下一步</span>
            </form>
        </div>
    </div>

    <div data-role="page" id="insertStepTwo" submitUrl="<?php echo $this->_tpl_vars['function']['insertStepOne']; ?>
">

        <div data-role="header">
            <a href="#home" data-icon="back" data-iconpos="notext"></a>
            <h1>录入车牌信息1<?php echo $this->_tpl_vars['_REQUEST']; ?>
</h1>
        </div>

        <div data-role="content" class="contentIndex">
            <form action="<?php echo $this->_tpl_vars['function']['insert']; ?>
" method="post" id="licenceForm">
                <label for="licence_province">车牌省份</label>
                <select name="licence_province" id="licence_province">
                    <option value="-">-</option>
                    <?php $_from = $this->_tpl_vars['province']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                    <option value="<?php echo $this->_tpl_vars['val']->code; ?>
"><?php echo $this->_tpl_vars['val']->name; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
                <span id="noticeProvince"></span>
                <label for="licence_area">车牌地域</label>
                <select name="licence_area" id="licence_area">
                    <option value="-">-</option>
                    <?php $_from = $this->_tpl_vars['area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                    <option value="<?php echo $this->_tpl_vars['val']->code; ?>
"><?php echo $this->_tpl_vars['val']->name; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
                <span id="noticeArea"></span>
                <label for="licence_number">车牌号码</label>
                <input type="text" id="licence_number" name="licence_number"/>
                <span id="noticeNumber"></span>
                <br />
                <span id="insertSubmit" data-role="button" data-theme="b" data-transition="flow" />下一步</span>
            </form>
        </div>
    </div>



<!--录入页面结束-->
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