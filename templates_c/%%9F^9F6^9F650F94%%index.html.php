<?php /* Smarty version 2.6.25-dev, created on 2015-08-30 07:06:00
         compiled from D:%5Cworkspace%5Cphp%5Cvehicle%5Capplication%5Cviews%5Cindex/index.html */ ?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['static']['css']; ?>
index/index.css"/>
    <title>欢迎您</title>
</head>
<body>
    <!--<div class="item">-->
        <!--&lt;!&ndash;<a href="<?php echo $this->_tpl_vars['function']['insert']; ?>
">录入</a>&ndash;&gt;录入-->
    <!--</div>-->
    <!--<div class="item">-->
        <!--&lt;!&ndash;<a href="<?php echo $this->_tpl_vars['function']['search']; ?>
">搜索</a>&ndash;&gt;搜索-->
    <!--</div>-->
    <!--<div class="item">-->
        <!--&lt;!&ndash;<a href="<?php echo $this->_tpl_vars['function']['maintenance']; ?>
">维护</a>&ndash;&gt;维护-->
    <!--</div>-->


    <!--首页开始-->
    <div data-role="page" id="home">

        <div data-role="header">
            <h1>主功能页</h1>
        </div>

        <div data-role="content" class="contentIndex">
            <a href="#insert" data-role="button">录入</a>
            <a href="#search" data-role="button">搜索</a>
            <a href="#maintenance" data-role="button">维护</a>
        </div>

        <div data-role="footer">
            <h1>页脚文本</h1>
        </div>

    </div>
    <!--首页结束-->
    <!--录入页面开始-->
    <div data-role="page" id="insert">

        <div data-role="header">
            <a href="#home" data-icon="back" data-iconpos="notext"></a>
            <h1>录入页</h1>
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
                <span id="insertSubmit" data-role="button" data-transition="flow" data-rel="dialog" />下一步</span>
            </form>
        </div>

        <div data-role="footer">
            <h1>页脚文本</h1>
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