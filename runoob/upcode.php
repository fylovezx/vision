<?php
/**
 * 本页面用于上传代码
 * 1.防止误入的措施
 *      暂时先不用登陆验证，仅用密码确定，从control中取得一个管理员密码，
 *          如果匹配则代表为user
 * 2.运行流程
 *      选择
 * 
 * 3.控件功能
 *  控件        命名        文本        事件/功能                   说明
 *  btn         None        源代码      onclick="resetCode()"      单击展示源代码
 *  btn         None        点击运行    onclick="submitTryit()"    单击运行代码展示区代码
 * textarea textareaCode    代码                                    显示代码
 * div      htmlarea                                                运行textarea中的代码
 * 
 * 
 * 
 */


?>