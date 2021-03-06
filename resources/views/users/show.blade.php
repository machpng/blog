@extends('layouts.app')
@section('title')关于我@endsection
@section('content')
<div class="container about">
    <div style="margin-left: 50px;">
        <h2>PHP 开发工程师/项目经理</h2>
        <div style="margin-left: 20px;">
            <h4>个人信息</h4>
            <ul>
                <li>马春鹏</li>
                {{--<li>大专/山东理工职业学院/统招</li>--}}
                <li>本科/中国海洋大学成人教育学院/函授</li>
                <li>工作年限：5年</li>
                <li>期望职位：PHP高级程序员、项目经理、应用架构师</li>
                <li>期望薪资：税前12K</li>
                <li>期望城市：青岛</li>
            </ul>
            <h4>联系方式</h4>
            <ul>
                <li>手机：18562698872</li>
                <li>Email：ikabb@sina.com</li>
                <li>微信号：同手机号码</li>
            </ul>
            <h4>技能清单</h4>
            <ul>
                <li>Web开发：PHP/Hack/Node</li>
                <li>Web框架：Laravel/Yii/ThinkPHP/ECMall</li>
                <li>前端框架：Bootstrap/HTML5/VUE/REACT</li>
                <li>数据库相关：MySQL/MongoDB</li>
                <li>版本管理和自动化部署工具：Svn/Git/Composer</li>
                <li>云开放平台：微信应用开发，阿里云物联网套件</li>
            </ul>
            <h4>工作经历</h4>
            <ul>
                <li>青岛鲁诺金融电子技术有限公司（2016年11月 ~ 至今）</li>
                <li>上海宇力生物科技有限公司（2015年9月 ~ 2016年10月）</li>
                <li>青岛达伦商贸有限公司（2014年3月 ~ 2015年9月）</li>
            </ul>
            <h4>项目经验</h4>
            <ul>
                <li>银保车贷 - 专业汽车金融服务</li>
                <p> 此项目是关于汽车金融贷款的项目，上线预计日成交量1000左右, 下面有着许多 子系统，包括资质审批
                    系统，放款审批系统，贷后管理系统。此项目从开发到上线运营的时间为六个月，我在项目中主要负责资质审
                    批系统和贷后管理系统的开发，此项目运用了php7.1+vue + lumen的方式，使用了dingo+jwt-auth做用户认证，mongodb
                    存储了意向客户，redis 队列服务等方案。此后再次基础上开发了二手车的买卖和贷款业务以及衍生的保险服务等。</p>
                <li>贝致 - 牙齿矫治平台</li>
                <p>本项目中我主要负责的是医生端的改造，之前的代码因为是外包公司开发的，所 以需要重新整理和优
                    化。改造中使用了react2 + restful API, 在开发医生端的改造 时主要针对SQL的优化和代码优化做了一些
                    功课，使代码的复用性和可读性都有 了很大的进步;接着就是对sql的优化，通过增加索引，选择正确的存
                    储引擎，修 改字段的不合理的存储方式和增加缓存进行SQL的优化，极大的提高了程序的性 能。同时因
                    为引入了react，顺便学习了一些前端的知识，了解了 webpack 和 ES6 的语法和 react2 的使用。项目使用
                    了git做版本管理，现在也能熟练的掌握 git 的使用。</p>
                <li>贝致口腔社区 - 专业的口腔交流社区</li>
                <p>为了更好的留住客户和宣传公司，公司决定开发自己的社区，现在已经完成开发。我在项目中负责项目接
                    口的开发，手动写的用户认证系统，memcached 缓存数据和 redis 队列服务，上线时日PV在500左右，
                    这个项目中主要学习了mysql的分表策略和索引的使用，如何将一张数据大的表拆分成多个表，拆分后代
                    码更加的整洁，维护起来更加的方便，使用索引后搜说查询的效率更加高效。在这期间我还主动学习了
                    VUE的基本用法。</p>
                <li>华唐商城</li>
                <p>该项目是一个B2B2C的模式，它包括了总管理系统、供应商管理系统，分销 商管理系统、分销商城
                    和分销商城的后台。流程大致是供应商那边上架商品到总 管理系统，总管理系统审核通过后会上架到分
                    销商城，注册平台的分销商用户则 可以在分销商城上开店。这整套系统是用的 pt-framework 的php框架
                    来完成的， 前端用的是 BootStrap 框架，其中我主要负责是供应商管理系统的开发和总管理系 统的供应
                    商木块，主要是产品的录入和供应商的管理两大部分。这一套系统很好 的实现了公司B2B2C的运营模
                    式，当然其中还有很多不足的地方需要我们去改 进。通过这个项目很大的提高了我独立开发的能力，加
                    深了自己对数据库的了 解，如何建表，表与表之间的关系，还有数据库事物的运用等等。</p>
            </ul>
        </div>
        <hr>
    </div>
</div>
@endsection