# WONG
## 行动要求
优先编程，暂不优化
## 下一步
编程：Vis的浏览页面
优化：ajax调用与include的页面是不是要命名区分开？
## 可能实现不了的计划
出入馆登记 ：每一次的创建、修改、删除，都保存在其中。  
自动保存 ：正文编辑过程中每隔几分钟自动保存一次？最多三次  
图片管理 ：服务器自动搜索未入文本的图片，予以删除
## 放一放
登陆复杂化  
优化：按需引用js和css文件。  
权限管理
## 遇到的问题
20190506 01.css文件命名为index.css时无法修改样式，打开网页F12显示index.css内容为空，
## 防bug指南
20190506 01.每ajax一次content要记录一次当前地址，防止刷新找不回位置  
&emsp;&emsp;地址要修改成关联数组  
20190506 02.新写的post或者get 一定要再加上 canpost的判断，防止刷新重复提交  
20190506 03.涉及到需要用ajax回调content的id不要取复杂，4-5个字母
## 安全防护
每个页面需要防止非法进入？  
检测struid的格式  
## 变量命名（区分大小写）
### 动词
op:管理 comp:编辑 ins:插入 upd:更新  
### 名词
db:数据库 lib:书库 cmnt:注释 Loc:位置  
stru:结构(用于代表floor-shelf-book-chapter-section层级)  
### 形容词
Ct:当前
### 权限
#### 人员权限
DBM	超级管理员 FLM 楼层管理员 SFM 书架管理员 WTR 书本作者  
CTR 资料贡献者 STD 已注册用户 VIS 未注册游客
### 其他
skpl:删库跑路 cxks:重新开始 sjhf:数据恢复 bfsj:备份数据  
opdb:管理数据库 opliblog:书库管理日志
## 更新日志
#### 2190514
可浏览-编辑至章
#### 20190513
完成四大页面：  
1.dbm\fl\sf\bk 数据库管理与楼层-书籍的管理 20190511  
2.bk\cp\sec编辑页面  
3.bk\cp\sec浏览页面  
4.bk\cp\sec编辑页面与浏览页面切换
#### 20190512
跑通至建立章  
优化：刷新和切换功能能够记住下级选项了
#### 20190511
简易切换page  
四大页面：1.dbm\fl\sf\bk 数据库管理与楼层-书籍的管理
#### 20190510
修改文件目录  
简易登陆
#### 20190507
文件  
&emsp;更改sys.php->dbm-index  
&emsp;更改opdb.php->dbm-index-content  
js  
&emsp;函数名  
&emsp;修改changepage->AjaxDbmContent  
&emsp;更改opdb->AjaxDbmOpdb  
dbm-index-content.php  
&emsp;去除添加书架，添加书目，统一改为书库管理
#### 20190506
优化：01.修改网站只有一个index入口。  
&emsp;02.配合css修改所有用到的id命名例如 main-div-head dbm-menu 等。  
测试：跑通了删库，重建，添加书架功能  
编程：开始->按照新的人员权限，重新构建后台管理系统  
数据库：修改opliblog的内容
#### 20190505
修改成正儿八经的名字，完成删库，重建功能  
优化dbm-index-content.php结构，限制了conn中的wanring
#### 20190504
增加删库跑路和重建宇宙功能，所有sql语句中的数据库名称由$db来获得
#### 20190503
创建管理员界面，实现简易功能，
#### 20190502
修改index,能初步显示但是不理想，还在纠结用直接文本还是数据库
#### 20190501
try:  
修改try更好从数据库中读取数据  
新建index,upcode  