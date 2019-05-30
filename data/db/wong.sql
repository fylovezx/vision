/*
 Navicat Premium Data Transfer

 Source Server         : root 1234
 Source Server Type    : MySQL
 Source Server Version : 50722
 Source Host           : localhost:3306
 Source Schema         : wong

 Target Server Type    : MySQL
 Target Server Version : 50722
 File Encoding         : 65001

 Date: 31/05/2019 00:24:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book`  (
  `idbk` int(11) NOT NULL AUTO_INCREMENT,
  `ctime` datetime(0) NOT NULL COMMENT '创建时间',
  `bkname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idsf` int(11) NOT NULL,
  `bksnum` int(11) NOT NULL,
  `bkintro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bkicon` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '链接的网址',
  PRIMARY KEY (`idbk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100011 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用来存储第二个层级' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES (100001, '2019-05-12 22:13:43', 'HTML', 1002, 1, '超文本标记语言（HTML）是一种用于创建网页的标准标记语言。', 'html.png', 'html-foreword');
INSERT INTO `book` VALUES (100002, '2019-05-18 10:56:34', 'PHP', 1003, 1, 'PHP 是一种创建动态交互性站点的强有力的服务器端脚本语言', 'php.jpg', 'php-foreword');
INSERT INTO `book` VALUES (100003, '2019-05-18 11:04:32', 'Wong项目简介', 1001, 1, 'Wong项目以图书馆结构建立知识储备系统', '图书馆.png', 'wong-foreword');
INSERT INTO `book` VALUES (100004, '2019-05-18 17:20:36', '518项目', 1001, 2, '基于链式上下级结构重构Wong项目', '518xm.png', '518-foreword');
INSERT INTO `book` VALUES (100005, '2019-05-18 21:13:24', 'CSS', 1002, 2, 'CSS 指层叠样式表 (Cascading Style Sheets)', 'css.png', 'CSS-foreword');
INSERT INTO `book` VALUES (100006, '2019-05-19 15:45:22', 'Matlab', 1004, 1, '用于算法开发、数据可视化、数据分析以及数值计算的高级技术计算语言和交互式环境', 'matlab.ico', 'matlab-foreword');
INSERT INTO `book` VALUES (100007, '2019-05-19 19:44:27', 'Hill', 1001, 3, 'Hill是语音识别项目代号', 'hill.png', 'hill-foreword');
INSERT INTO `book` VALUES (100008, '2019-05-21 22:04:45', '胃', 1005, 1, '胃是食道的扩大部分,位于膈下,上接食道,下通小肠。', '胃.png', 'stomach-foreword');
INSERT INTO `book` VALUES (100009, '2019-05-21 22:13:59', '外科', 1005, 2, '外科是研究外科疾病的发生，发展规律及其临床表现，诊断，预防和治疗的科学', '外科.png', 'surgery-foreword');
INSERT INTO `book` VALUES (100010, '2019-05-30 21:43:27', 'python', 1003, 2, 'Python是一种解释型、面向对象、动态数据类型的高级程序设计语言', 'python.png', 'py-foreword');

-- ----------------------------
-- Table structure for chapter
-- ----------------------------
DROP TABLE IF EXISTS `chapter`;
CREATE TABLE `chapter`  (
  `idcp` int(11) NOT NULL AUTO_INCREMENT,
  `cpname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idbk` int(11) NOT NULL,
  `link` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cpsnum` int(11) NOT NULL,
  PRIMARY KEY (`idcp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '指向与序列号之间的关系' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chapter
-- ----------------------------
INSERT INTO `chapter` VALUES (1, 'HTML基础教程', 100001, 'html-tutorial', 1);
INSERT INTO `chapter` VALUES (2, 'HTML参考手册', 100001, 'html-ref', 2);
INSERT INTO `chapter` VALUES (3, '字符处理', 100002, 'php-string', 1);
INSERT INTO `chapter` VALUES (4, 'dbm级权限运行流程', 100003, 'wong-dbmflow', 3);
INSERT INTO `chapter` VALUES (5, '用到的变量缩写', 100003, 'wong-abbr', 1);
INSERT INTO `chapter` VALUES (6, 'wtr级权限运行流程', 100003, 'wong-wtrflow', 4);
INSERT INTO `chapter` VALUES (7, '入口选择', 100004, '518-entrance', 1);
INSERT INTO `chapter` VALUES (8, '数据库结构', 100004, '518-dbstru', 2);
INSERT INTO `chapter` VALUES (9, 'css属性', 100005, 'css-pr', 1);
INSERT INTO `chapter` VALUES (10, '首页浏览运行流程', 100003, 'wong-visflow', 5);
INSERT INTO `chapter` VALUES (11, 'matlab基础教程', 100006, 'matlab-tutorial', 1);
INSERT INTO `chapter` VALUES (12, '函数', 100006, 'matlab-func', 2);
INSERT INTO `chapter` VALUES (13, '语音录入', 100007, 'hill-spein', 2);
INSERT INTO `chapter` VALUES (14, '语音预处理', 100007, 'hill-speprep', 3);
INSERT INTO `chapter` VALUES (15, '历史记录运行流程', 100003, 'wong-hispage', 6);
INSERT INTO `chapter` VALUES (16, '已建立session', 100003, 'wong-session', 2);
INSERT INTO `chapter` VALUES (17, 'MFCC特征的提取步骤', 100007, 'hill-MFCC', 5);
INSERT INTO `chapter` VALUES (18, '声音矩阵转为文本', 100007, 'hill-voitotx', 6);
INSERT INTO `chapter` VALUES (19, '名词解释', 100007, 'hill-Nxpln', 7);
INSERT INTO `chapter` VALUES (20, '幽门螺旋杆菌', 100008, 'stomach-HPY', 1);
INSERT INTO `chapter` VALUES (21, '疝气', 100009, 'surgery-hernia', 1);
INSERT INTO `chapter` VALUES (22, '报错', 100006, 'matlab-error', 3);
INSERT INTO `chapter` VALUES (23, '语音基本参数提取', 100007, 'hill-speexprm', 4);
INSERT INTO `chapter` VALUES (24, '警告', 100006, 'matlab-warning', 4);
INSERT INTO `chapter` VALUES (25, '快捷键', 100006, 'matlab-accessKey', 5);
INSERT INTO `chapter` VALUES (26, '面临的困难', 100007, 'hill-diff', 1);
INSERT INTO `chapter` VALUES (27, 'vscode配置', 100010, 'py-vscode', 2);
INSERT INTO `chapter` VALUES (28, '安装与配置', 100010, 'py-install', 1);

-- ----------------------------
-- Table structure for hispage
-- ----------------------------
DROP TABLE IF EXISTS `hispage`;
CREATE TABLE `hispage`  (
  `time` datetime(0) NOT NULL,
  `userid` int(11) NOT NULL COMMENT '防止重名，用户id',
  `adr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '地址用;隔开',
  `mark` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '用于方便用户观看'
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '浏览历史' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hispage
-- ----------------------------
INSERT INTO `hispage` VALUES ('2019-05-20 23:05:46', 12345, 'wtr-index;book-100002', 'wtr-bk:PHP');
INSERT INTO `hispage` VALUES ('2019-05-20 23:17:10', 12345, 'main-visit;book-100004', '浏览:518项目 前言');
INSERT INTO `hispage` VALUES ('2019-05-20 23:22:58', 12345, 'main-visit;chapter-8', '浏览:518项目-数据库结构');
INSERT INTO `hispage` VALUES ('2019-05-20 23:22:59', 12345, 'main-visit;chapter-7', '浏览:518项目-入口选择');
INSERT INTO `hispage` VALUES ('2019-05-20 23:23:09', 12345, 'main-visit;book-100001', '浏览:HTML 前言');
INSERT INTO `hispage` VALUES ('2019-05-20 23:23:10', 12345, 'main-visit;chapter-2', '浏览:HTML-HTML参考手册');
INSERT INTO `hispage` VALUES ('2019-05-20 23:23:13', 12345, 'main-visit;chapter-1', '浏览:HTML-HTML基础教程');
INSERT INTO `hispage` VALUES ('2019-05-20 23:23:29', 12345, 'main-visit;section-2', '浏览:Matlab-matlab基础教程-matlab基本语法');
INSERT INTO `hispage` VALUES ('2019-05-20 23:27:08', 12345, 'wtr-index;book-100003', 'wtr-bk:Wong项目简介');
INSERT INTO `hispage` VALUES ('2019-05-21 22:14:04', 12345, 'wtr-index;book-100008', 'wtr-bk:胃');
INSERT INTO `hispage` VALUES ('2019-05-21 22:15:02', 12345, 'wtr-index;book-100009', 'wtr-bk:外科');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:18', 12345, 'main-visit;chapter-14', '浏览:Hill-语音预处理');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:24', 12345, 'main-visit;section-7', '浏览:Hill-语音预处理-理论知识');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:29', 12345, 'main-visit;section-8', '浏览:Hill-语音预处理-短时能量');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:30', 12345, 'main-visit;section-25', '浏览:Hill-语音预处理-短时过零率');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:30', 12345, 'main-visit;section-26', '浏览:Hill-语音预处理-短时傅里叶变换');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:31', 12345, 'main-visit;chapter-23', '浏览:Hill-语音基本参数提取');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:32', 12345, 'main-visit;section-27', '浏览:Hill-语音基本参数提取-倒谱分析');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:33', 12345, 'main-visit;section-29', '浏览:Hill-语音基本参数提取-线性预测分析');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:33', 12345, 'main-visit;section-30', '浏览:Hill-语音基本参数提取-LPC谱');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:34', 12345, 'main-visit;chapter-17', '浏览:Hill-MFCC特征的提取步骤');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:34', 12345, 'main-visit;section-21', '浏览:Hill-MFCC特征的提取步骤-预加重');
INSERT INTO `hispage` VALUES ('2019-05-22 16:16:36', 12345, 'main-visit;section-9', '浏览:Hill-MFCC特征的提取步骤-分帧和傅里叶变换');
INSERT INTO `hispage` VALUES ('2019-05-22 16:17:07', 12345, 'main-visit;section-10', '浏览:Hill-MFCC特征的提取步骤-求出频谱能量');
INSERT INTO `hispage` VALUES ('2019-05-22 16:17:19', 12345, 'main-visit;section-11', '浏览:Hill-MFCC特征的提取步骤-取能量对数');
INSERT INTO `hispage` VALUES ('2019-05-22 16:17:21', 12345, 'main-visit;section-12', '浏览:Hill-MFCC特征的提取步骤-求倒谱');
INSERT INTO `hispage` VALUES ('2019-05-22 16:17:25', 12345, 'main-visit;section-14', '浏览:Hill-声音矩阵转为文本-音素与状态');
INSERT INTO `hispage` VALUES ('2019-05-22 16:17:26', 12345, 'main-visit;section-15', '浏览:Hill-声音矩阵转为文本-语音识别工作原理');
INSERT INTO `hispage` VALUES ('2019-05-22 16:17:35', 12345, 'main-visit;section-16', '浏览:Hill-名词解释-隐马尔可夫模型');
INSERT INTO `hispage` VALUES ('2019-05-22 16:17:36', 12345, 'main-visit;section-17', '浏览:Hill-名词解释-静音切除VAD');
INSERT INTO `hispage` VALUES ('2019-05-22 16:24:34', 12345, 'main-visit;book-100003', '浏览:Wong项目简介 前言');
INSERT INTO `hispage` VALUES ('2019-05-22 16:24:38', 12345, 'main-visit;book-100007', '浏览:Hill 前言');
INSERT INTO `hispage` VALUES ('2019-05-22 17:13:18', 12345, 'main-visit;chapter-13', '浏览:Hill-语音录入');
INSERT INTO `hispage` VALUES ('2019-05-22 17:13:19', 12345, 'main-visit;section-20', '浏览:Hill-名词解释-MFCC');
INSERT INTO `hispage` VALUES ('2019-05-22 17:13:22', 12345, 'wtr-index;book-100001', 'wtr-bk:HTML');
INSERT INTO `hispage` VALUES ('2019-05-24 00:04:19', 12345, 'main-visit;chapter-12', '浏览:Matlab-函数');
INSERT INTO `hispage` VALUES ('2019-05-24 00:07:16', 12345, 'wtr-index;book-100007', 'wtr-bk:Hill');
INSERT INTO `hispage` VALUES ('2019-05-24 00:07:37', 12345, 'wtr-index;book-100006', 'wtr-bk:Matlab');
INSERT INTO `hispage` VALUES ('2019-05-24 21:37:47', 0, 'main-visit;section-8', '浏览:Hill-语音预处理-短时能量');
INSERT INTO `hispage` VALUES ('2019-05-24 21:37:48', 0, 'main-visit;section-25', '浏览:Hill-语音预处理-短时过零率');
INSERT INTO `hispage` VALUES ('2019-05-24 21:37:48', 0, 'main-visit;section-26', '浏览:Hill-语音预处理-短时傅里叶变换');
INSERT INTO `hispage` VALUES ('2019-05-24 21:37:49', 0, 'main-visit;chapter-23', '浏览:Hill-语音基本参数提取');
INSERT INTO `hispage` VALUES ('2019-05-24 21:37:49', 0, 'main-visit;section-27', '浏览:Hill-语音基本参数提取-倒谱分析');
INSERT INTO `hispage` VALUES ('2019-05-30 21:41:37', 0, 'main-visit;book-100007', '浏览:Hill 前言');
INSERT INTO `hispage` VALUES ('2019-05-30 21:44:55', 12345, 'main-visit;book-100006', '浏览:Matlab 前言');
INSERT INTO `hispage` VALUES ('2019-05-30 21:45:10', 12345, 'main-visit;book-100010', '浏览:python 前言');
INSERT INTO `hispage` VALUES ('2019-05-30 23:29:42', 0, 'main-visit;book-100010', '浏览:python 前言');
INSERT INTO `hispage` VALUES ('2019-05-30 23:29:48', 0, 'main-visit;chapter-28', '浏览:python-安装与配置');
INSERT INTO `hispage` VALUES ('2019-05-30 23:29:51', 0, 'main-visit;section-33', '浏览:python-安装与配置-配置虚拟环境');
INSERT INTO `hispage` VALUES ('2019-05-30 23:29:56', 12345, 'wtr-index;all-0', 'wtr:全部可编书籍');
INSERT INTO `hispage` VALUES ('2019-05-31 00:10:05', 12345, 'wtr-index;book-100010', 'wtr-bk:python');

-- ----------------------------
-- Table structure for htmlpage
-- ----------------------------
DROP TABLE IF EXISTS `htmlpage`;
CREATE TABLE `htmlpage`  (
  `link` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '正文的指向',
  `htmlpage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`link`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '存储正文的链接和内容' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of htmlpage
-- ----------------------------
INSERT INTO `htmlpage` VALUES ('518-dbstru', '1.一个link列表，存放link对应的htmlpage&ltbr /&gt&ltbr /&gt2.关系表&ltbr /&gtid from to 注释 分类&ltbr /&gt&ltbr /&gt3.单项信息表&ltbr /&gtid name link &ltbr /&gt&lthr&gt问题：&ltbr /&gt如何把ico,简介,等信息写入呢?因为并不是所有的单项都有图标，简介和内容&ltbr /&gt对于book而言有前言，可以直接写在它对应的link中，&ltbr /&gtchapter没有要说的怎么办？&ltbr /&gt难道ico,intro(简介)都单独列一个表，然后此表中新建一个json格式用来存储，用于调用?');
INSERT INTO `htmlpage` VALUES ('518-entrance', '在数据库中查找所有没有上级的为入口&ltbr /&gt问题：&ltbr /&gt1.如果所有的数据都写在一个数据库，也就是所有权限都有对数据总库的操作权力，那么会不会出现碰撞，如何快速有效的找到第一个层级呢?&ltbr /&gtSELECT fromstring FROM relationship WHERE fromstring NOT IN &ltbr /&gt(SELECT tostring FROM relationship) &ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('518-foreword', '最终目标&ltbr /&gt既可以基于wong项目的树状结构也可以包容思维导图的结构');
INSERT INTO `htmlpage` VALUES ('CSS-foreword', '这里是css前言');
INSERT INTO `htmlpage` VALUES ('css-pr', 'dfgdsfg');
INSERT INTO `htmlpage` VALUES ('css-pr-class-cursor', '&lth4&gt属性定义及使用说明&lt/h4&gt&ltbr /&gtcursor属性定义了鼠标指针放在一个元素边界范围内时所用的光标形状&ltbr /&gt默认值：auto&ltbr /&gt继承：	yes&ltbr /&gt版本：	CSS2&ltbr /&gtJavaScript 语法：	object.style.cursor=&quot;crosshair&quot;&ltbr /&gt&lthr&gt&ltbr /&gt&lth4&gt属性值&lt/h4&gt&ltbr /&gt值	描述&ltbr /&gturl	需使用的自定义光标的 URL。&ltbr /&gt注释：请在此列表的末端始终定义一种普通的光标，以防没有由 URL 定义的可用光标。&ltbr /&gtdefault	默认光标（通常是一个箭头）&ltbr /&gtauto	默认。浏览器设置的光标。&ltbr /&gtcrosshair	光标呈现为十字线。&ltbr /&gtpointer	光标呈现为指示链接的指针（一只手）&ltbr /&gtmove	此光标指示某对象可被移动。&ltbr /&gte-resize	此光标指示矩形框的边缘可被向右（东）移动。&ltbr /&gtne-resize	此光标指示矩形框的边缘可被向上及向右移动（北/东）。&ltbr /&gtnw-resize	此光标指示矩形框的边缘可被向上及向左移动（北/西）。&ltbr /&gtn-resize	此光标指示矩形框的边缘可被向上（北）移动。&ltbr /&gtse-resize	此光标指示矩形框的边缘可被向下及向右移动（南/东）。&ltbr /&gtsw-resize	此光标指示矩形框的边缘可被向下及向左移动（南/西）。&ltbr /&gts-resize	此光标指示矩形框的边缘可被向下移动（北/西）。&ltbr /&gtw-resize	此光标指示矩形框的边缘可被向左移动（西）。&ltbr /&gttext	此光标指示文本。&ltbr /&gtwait	此光标指示程序正忙（通常是一只表或沙漏）。&ltbr /&gthelp	此光标指示可用的帮助（通常是一个问号或一个气球）。');
INSERT INTO `htmlpage` VALUES ('hill-diff', '现在面临的困难，不知道成品是什么样，也就是用于什么，这个问题可以修改为，语音识别的流程，如何自己训练自己的语音。这个是我需要掌握的。也就是说，我这个东西拿出去，能够声纹识别登陆，密码登陆，进入训练界面，&ltbr /&gt现在的重点是，我要做出一个demo,能够完成一整套的语音识别流程，无论是老的也好，新的也罢，');
INSERT INTO `htmlpage` VALUES ('hill-foreword', '此项项目为基础铺垫，当前要能够实现一个基本的demo,即语音录入，文字显现。');
INSERT INTO `htmlpage` VALUES ('hill-MFCC-cepstrum', '4. Take the discrete cosine transform of the list of mel log powers, as if it were a signal.&ltbr /&gt求倒谱时这一步仍然用的是傅里叶变换。计算MFCC时使用的离散余弦变换（discrete cosine transform，DCT）是傅里叶变换的一个变种，好处是结果是实数，没有虚部。&ltbr /&gtDCT还有一个特点是，对于一般的语音信号，这一步的结果的前几个系数特别大，后面的系数比较小，可以忽略。上面说了一般取40个三角形，所以DCT的结果也是40个点；实际中，一般仅保留前12~20个，这就进一步压缩了数据。&ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('hill-MFCC-fourier', '1. Take the Fourier transform of (a windowed excerpt of) a signal.&ltbr /&gt&ltbr /&gt这一步其实说了两件事：&ltbr /&gt一是把语音信号分帧，&ltbr /&gt要分帧是因为语音信号是快速变化的，而傅里叶变换适用于分析平稳的信号。&ltbr /&gt在语音识别中，一般把帧长取为20~50ms，这样一帧内既有足够多的周期，又不会变化太剧烈。每帧信号通常要与一个平滑的窗函数相乘，让帧两端平滑地衰减到零，这样可以降低傅里叶变换后旁瓣的强度，取得更高质量的频谱。帧和帧之间的时间差（称为“帧移”）常常取为10ms，这样帧与帧之间会有重叠，否则，由于帧与帧连接处的信号会因为加窗而被弱化，这部分的信息就丢失了。&ltbr /&gt&ltbr /&gt分帧操作一般不是简单的切开，而是使用移动窗函数来实现，这里不详述。帧与帧之间一般是有交叠的每帧的长度为25毫秒，每两帧之间有25-10=15毫秒的交叠。我们称为以帧长25ms、帧移10ms分帧。&ltbr /&gt&ltbr /&gt二是对每帧做傅里叶变换。&ltbr /&gt分帧后，语音就变成了很多小段。但波形在时域上几乎没有描述能力，因此必须将波形作变换。常见的一种变换方法是提取MFCC特征，根据人耳的生理特性，把每一帧波形变成一个多维向量，可以简单地理解为这个向量包含了这帧语音的内容信息。这个过程叫做声学特征提取。实际应用中，这一步有很多细节，声学特征也不止有MFCC这一种，具体这里不讲。&ltbr /&gt&ltbr /&gt傅里叶变换是逐帧进行的，为的是取得每一帧的频谱。一般只保留幅度谱，丢弃相位谱。&ltbr /&gt&ltbr /&gt&ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('hill-MFCC-logs', '3. Take the logs of the powers at each of the mel frequencies.&ltbr /&gt这一步就是取上一步结果的对数。简单点理解，它是对纵轴的放缩，可以放大低能量处的能量差异；更深层次地，这是在模仿倒谱（cepstrum）的计算步骤。倒谱又是另一个话题，此处不展开讲了。');
INSERT INTO `htmlpage` VALUES ('hill-MFCC-preE', '人类的发音器官在向外辐射声波的时候，空气作为语音信号的载体（或者说负载）一方面传播者能量，另一方面则损耗着能量。&ltbr /&gt简单点的结论就是：介质作为声能量的载体，在声源尺寸一定的情况下，频率越高，介质对声能量的损耗越严重。&ltbr /&gt预加重一定程度上弥补了高频部分的损耗，保护了声道信息');
INSERT INTO `htmlpage` VALUES ('hill-MFCC-Spectrum', '2. Map the powers of the spectrum obtained above onto the mel scale, using triangular overlapping windows.&ltbr /&gt这一步做的事情，是把频谱与下图中每个三角形相乘并积分，求出频谱在每一个三角形下的能量：&ltbr /&gt&ltbr /&gt这一步有如下几个效果：&ltbr /&gt1) 傅里叶变换得到的序列很长（一般为几百到几千个点），把它变换成每个三角形下的能量，可以减少数据量（一般取40个三角形）；&ltbr /&gt2) 频谱有包络和精细结构，分别对应音色与音高。对于语音识别来讲，音色是主要的有用信息，音高一般没有用。在每个三角形内积分，就可以消除精细结构，只保留音色的信息。当然，对于有声调的语言来说，音高也是有用的，所以在MFCC特征之外，还会使用其它特征刻画音高。&ltbr /&gt3) 三角形是低频密、高频疏的，这可以模仿人耳在低频处分辨率高的特性。&ltbr /&gt&ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('hill-MFCC-summarize', '上面整个过程的结果，就把一帧语音信号用一个12~20维向量简洁地表示了出来；一整段语音信号，就被表示为这种向量的一个序列。语音识别中下面要做的事情，就是对这些向量及它们的序列进行建模了。&ltbr /&gt&ltbr /&gt至此，声音就成了一个12行（假设声学特征是12维）、N列的一个矩阵，称之为观察序列，这里N为总帧数。观察序列如下图所示，图中，每一帧都用一个12维的向量表示，色块的颜色深浅表示向量值的大小。');
INSERT INTO `htmlpage` VALUES ('hill-Nxpln-MFCC', '梅尔倒谱系数（mfcc）&ltbr /&gt&ltbr /&gt提取过程：连续语音--预加重--加窗分帧--FFT--MEL滤波器组--对数运算--DCT&ltbr /&gt&ltbr /&gt首先，语音做FFT之后就把语音转换到频域，每一帧代表语音能量，越亮代表能量越大；&ltbr /&gt&ltbr /&gt然后经过MEL滤波器组，是把语音变换到MEL域，MEL刻度是仿照人耳进行设计的，更符合人耳的听觉特性；&ltbr /&gt&ltbr /&gt再然后做对数运算，做DCT，最后的这步DCT相当于又做了一遍FFT，目的是提取每一帧的包络，因为语音的信息主要在包络上；&ltbr /&gt&ltbr /&gt在语音处理领域里，梅尔频率倒谱(mel-frequency cepstrum简称MFC)表示一个语音的短时功率谱，是一个语音的对数功率谱在频率的一个非线性梅尔刻度上进行线性余弦转换所得。&ltbr /&gt&ltbr /&gt        所有的梅尔频率倒谱系数(Mel-frequency cepstral coefficients  简称MFCC)共同的组成一个MFC。MFCCs在Mel标度频率域提取出来的倒谱参数。倒谱和梅尔频率倒谱之间的差别是在MFC中，频带在梅尔刻度上是等间隔的，这比利用线性间隔频带的倒谱更接近于人类的听觉特性。&ltbr /&gt&ltbr /&gt 梅尔倒谱系数（Mel-scale Frequency Cepstral Coefficients，简称MFCC）。根据人耳听觉机理的研究发现，人耳对不同频率的声波有不同的听觉敏感度。从200Hz到5000Hz的语音信号对语音的清晰度影响对大。两个响度不等的声音作用于人耳时，则响度较高的频率成分的存在会影响到对响度较低的频率成分的感受，使其变得不易察觉，这种现象称为掩蔽效应。由于频率较低的声音在内耳蜗基底膜上行波传递的距离大于频率较高的声音，故一般来说，低音容易掩蔽高音，而高音掩蔽低音较困难。在低频处的声音掩蔽的临界带宽较高频要小。所以，人们从低频到高频这一段频带内按临界带宽的大小由密到疏安排一组带通滤波器，对输入信号进行滤波。将每个带通滤波器输出的信号能量作为信号的基本特征，对此特征经过进一步处理后就可以作为语音的输入特征。由于这种特征不依赖于信号的性质，对输入信号不做任何的假设和限制，又利用了听觉模型的研究成果。因此，这种参数比基于声道模型的LPCC相比具有更好的鲁邦性，更符合人耳的听觉特性，而且当信噪比降低时仍然具有较好的识别性能。');
INSERT INTO `htmlpage` VALUES ('hill-Nxpln-vad', '在开始语音识别之前，有时需要把首尾端的静音切除，降低对后续步骤造成的干扰。这个静音切除的操作一般称为VAD，需要用到信号处理的一些技术.');
INSERT INTO `htmlpage` VALUES ('hill-spein', '');
INSERT INTO `htmlpage` VALUES ('hill-spein-theory', '一、理论知识&ltbr /&gt1. 时域特性在时域，语音信号可以直接用它的时间波形表示出来。其中，清音段类似于白噪声，具有较高的频率，但振幅很小，没有明显的周期性；而浊音都具有明显的周期性，且幅值较大，频率相对较低。语音信号的这些时域特征可以通过短时能量、短时过零率等方法来分析。&ltbr /&gt2. 频域特性通过频域分析方法可以分析语音信号的频域特性。最常用的频域分析方法为傅里叶分析法。语音信号是一个非平稳过程，因此需要用短时傅里叶变换对语音信号进行频谱分析。通过语音信号的频谱可以观察它们的共振峰特性、基音频率和谐波频率。&ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('hill-speprep', '预处理包括预加重、分帧、对语音信号加窗。&ltbr /&gt (1)预加重。预加重就是把语音信号乘以一个高通滤波器,用来 对语音信号进行高频率提升,高通滤波器用一阶FIR滤波器来实现, &ltbr /&gt(2)分帧。由于语音信号是时变的,处理时变的信号计算非常复杂,也不容易观察到语音信号的特征。但是在很短的时间内,即 10ms-30ms内,语音信号可以看成非时变的。这就用到了语音的分 帧技术。如果两帧不重叠,可能有一个跳变。为了使其平稳过渡,在 相邻两帧设置重叠部分。 &ltbr /&gt(3)加窗。语音信号经过采样后为 ) (nx ,实际上是无限长的,需要 处理的量将会很大。但进行分帧处理过后相当于乘以一个有限长的 窗函数,这样就可以很好的进行运算。');
INSERT INTO `htmlpage` VALUES ('hill-speprep-shortenergy', 'clear;&ltbr /&gtclose all;&ltbr /&gt Fs=11025;&ltbr /&gty=wavrecord(5*Fs,Fs,\'double\');&ltbr /&gtwavwrite(y,\'f:a\');&ltbr /&gtsoundview(y,Fs);&ltbr /&gt x = wavread(\'f:a.wav\');&ltbr /&gtx = double(x);&ltbr /&gtx = filter([1 -0.9375], 1, x); % 预加重&ltbr /&gt FrameLen = 256;&ltbr /&gtFrameInc = 128;&ltbr /&gts = enframe(x, FrameLen, FrameInc);&ltbr /&gt energy = sum(abs(s), 2);&ltbr /&gt figure;&ltbr /&gtsubplot(2,1,1);&ltbr /&gtplot(x);&ltbr /&gttitle(\'语音信号时域波形\');&ltbr /&gtxlabel(\'样点数\');&ltbr /&gtylabel(\'幅度\');&ltbr /&gt subplot(2,1,2);&ltbr /&gtplot(energy);&ltbr /&gttitle(\'语音信号的短时能量\');&ltbr /&gtxlabel(\'帧数\');&ltbr /&gtylabel(\'短时能量\');&ltbr /&gtlegend(\'帧长FrameLen = 256\');&ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('hill-voitotx-opprc', '工作原理operating principle&ltbr /&gt&ltbr /&gt把帧识别成状态（难点）。&ltbr /&gt&ltbr /&gt把状态组合成音素。&ltbr /&gt&ltbr /&gt把音素组合成单词。&ltbr /&gt&ltbr /&gt每个小竖条代表一帧，&ltbr /&gt若干帧语音对应一个状态，&ltbr /&gt每三个状态组合成一个音素，&ltbr /&gt若干个音素组合成一个单词。&ltbr /&gt也就是说，只要知道每帧语音对应哪个状态了，语音识别的结果也就出来了。&ltbr /&gt&ltbr /&gt那每帧音素对应哪个状态呢？&ltbr /&gt有个容易想到的办法，看某帧对应哪个状态的概率最大，那这帧就属于哪个状态。&ltbr /&gt比如下面的示意图，这帧在状态S3上的条件概率最大，因此就猜这帧属于状态S3。&ltbr /&gt&ltbr /&gt那这些用到的概率从哪里读取呢？有个叫“声学模型”的东西，里面存了一大堆参数，通过这些参数，就可以知道帧和状态对应的概率。获取这一大堆参数的方法叫做“训练”，需要使用巨大数量的语音数据，训练的方法比较繁琐，这里不讲。&ltbr /&gt&ltbr /&gt但这样做有一个问题：每一帧都会得到一个状态号，最后整个语音就会得到一堆乱七八糟的状态号。假设语音有1000帧，每帧对应1个状态，每3个状态组合成一个音素，那么大概会组合成300个音素，但这段语音其实根本没有这么多音素。如果真这么做，得到的状态号可能根本无法组合成音素。实际上，相邻帧的状态应该大多数都是相同的才合理，因为每帧很短。&ltbr /&gt&ltbr /&gt解决这个问题的常用方法就是使用隐马尔可夫模型（Hidden Markov Model，HMM）。这东西听起来好像很高深的样子，实际上用起来很简单：&ltbr /&gt第一步，构建一个状态网络。&ltbr /&gt第二步，从状态网络中寻找与声音最匹配的路径。&ltbr /&gt&ltbr /&gt这样就把结果限制在预先设定的网络中，避免了刚才说到的问题，当然也带来一个局限，比如你设定的网络里只包含了“今天晴天”和“今天下雨”两个句子的状态路径，那么不管说些什么，识别出的结果必然是这两个句子中的一句。&ltbr /&gt&ltbr /&gt那如果想识别任意文本呢？把这个网络搭得足够大，包含任意文本的路径就可以了。但这个网络越大，想要达到比较好的识别准确率就越难。所以要根据实际任务的需求，合理选择网络大小和结构。&ltbr /&gt&ltbr /&gt搭建状态网络，是由单词级网络展开成音素网络，再展开成状态网络。语音识别过程其实就是在状态网络中搜索一条最佳路径，语音对应这条路径的概率最大，这称之为“解码”。路径搜索的算法是一种动态规划剪枝的算法，称之为Viterbi算法，用于寻找全局最优路径。&ltbr /&gt&ltbr /&gt这里所说的累积概率，由三部分构成，分别是：&ltbr /&gt观察概率：每帧和每个状态对应的概率&ltbr /&gt转移概率：每个状态转移到自身或转移到下个状态的概率&ltbr /&gt语言概率：根据语言统计规律得到的概率其中，&ltbr /&gt&ltbr /&gt前两种概率从声学模型中获取，最后一种概率从语言模型中获取。语言模型是使用大量的文本训练出来的，可以利用某门语言本身的统计规律来帮助提升识别正确率。语言模型很重要，如果不使用语言模型，当状态网络较大时，识别出的结果基本是一团乱麻。这样基本上语音识别过程就完成了。&ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('hill-voitotx-phoneme', '音素：单词的发音由音素构成。&ltbr /&gt对英语，一种常用的音素集是卡内基梅隆大学的一套由39个音素构成的音素集，参见The CMU Pronouncing Dictionary‎。&ltbr /&gt汉语一般直接用全部声母和韵母作为音素集，另外汉语识别还分有调无调，不详述。&ltbr /&gt&ltbr /&gt状态：这里理解成比音素更细致的语音单位就行啦。通常把一个音素划分成3个状态。');
INSERT INTO `htmlpage` VALUES ('matlab-accessKey', 'ctrl + r 多行注释&ltbr /&gtctrl + t 取消注释');
INSERT INTO `htmlpage` VALUES ('matlab-commands', 'MATLAB命令&ltbr /&gt由 小赤佬 创建， 最后一次修改 2017-08-09&ltbr /&gt本节的内容将提供常用的一些MATLAB命令。&ltbr /&gt&ltbr /&gt在之前的篇章中我们已经知道了MATLAB数值计算和数据可视化是一个交互式程序，在它的命令窗口中您可以在MATLAB提示符“&gt&gt”下键入命令。&ltbr /&gt&ltbr /&gtMATLAB管理会话的命令&ltbr /&gtMATLAB提供管理会话的各种命令。如下表所示：&ltbr /&gt&ltbr /&gt命令	目的/作用&ltbr /&gtclc	清除命令窗口。&ltbr /&gtclear	从内存中删除变量。&ltbr /&gtexist	检查存在的文件或变量。&ltbr /&gtglobal	声明变量为全局。&ltbr /&gthelp	搜索帮助主题。&ltbr /&gtlookfor	搜索帮助关键字条目。&ltbr /&gtquit	停止MATLAB。&ltbr /&gtwho	列出当前变量。&ltbr /&gtwhos	列出当前变量（长显示）。&ltbr /&gtMATLAB的系统命令&ltbr /&gt使用MATLAB的时候有一些系统命令可以方便我们的操作，如在当前的工作区中可以使用系统命令保存为一个文件、加载文件、显示日期、列出目录中的文件和显示当前目录等。&ltbr /&gt&ltbr /&gt下表列举了一些MATLAB常用的系统相关的命令：&ltbr /&gt&ltbr /&gt命令	目的/作用&ltbr /&gtcd	改变当前目录。&ltbr /&gtdate	显示当前日期。&ltbr /&gtdelete	删除一个文件。&ltbr /&gtdiary	日记文件记录开/关切换。&ltbr /&gtdir	列出当前目录中的所有文件。&ltbr /&gtload	负载工作区从一个文件中的变量。&ltbr /&gtpath	显示搜索路径。&ltbr /&gtpwd	显示当前目录。&ltbr /&gtsave	保存在一个文件中的工作区变量。&ltbr /&gttype	显示一个文件的​​内容。&ltbr /&gtwhat	列出所有MATLAB文件在当前目录中。&ltbr /&gtwklread	读取.wk1电子表格文件。 &ltbr /&gtMATLAB输入和输出命令&ltbr /&gtMATLAB提供了以下输入和输出相关的命令：&ltbr /&gt&ltbr /&gt命令	作用/目的&ltbr /&gtdisp	显示一个数组或字符串的内容。&ltbr /&gtfscanf	阅读从文件格式的数据。&ltbr /&gtformat	控制屏幕显示的格式。&ltbr /&gtfprintf	执行格式化写入到屏幕或文件。&ltbr /&gtinput	显示提示并等待输入。&ltbr /&gt;	禁止显示网版印刷&ltbr /&gtfscanf和fprintf命令的行为像C scanf和printf函数。他们支持格式如下代码：&ltbr /&gt&ltbr /&gt格式代码	目的/作用&ltbr /&gt%s	输出字符串&ltbr /&gt%d	输出整数&ltbr /&gt%f	输出浮点数&ltbr /&gt%e	显示科学计数法形式&ltbr /&gt%g	%f 和%e 的结合，根据数据选择适当的显示方式&ltbr /&gt用于数字显示格式的函数有以下几种形式：&ltbr /&gt&ltbr /&gtFormat函数	最多可显示&ltbr /&gtformat short	四位十进制数（默认）&ltbr /&gtformat long	15位定点表示&ltbr /&gtformat short e	五位浮点表示&ltbr /&gtformat long e	15位浮点表示&ltbr /&gtformat bank	两个十进制数字&ltbr /&gtformat +	正，负或零&ltbr /&gtformat rat	有理数近似&ltbr /&gtformat compact	变量之间没有空行&ltbr /&gtformat loose	变量之间有空行&ltbr /&gtMATLAB向量，矩阵和阵列命令&ltbr /&gt下表列出了MATLAB用于工作数组、矩阵和向量的各种命令：&ltbr /&gt&ltbr /&gt命令	作用/目的&ltbr /&gtcat	连接数组&ltbr /&gtfind	查找非零元素的索引&ltbr /&gtlength	计算元素数量&ltbr /&gtlinspace	创建间隔向量&ltbr /&gtlogspace	创建对数间隔向量&ltbr /&gtmax	返回最大元素&ltbr /&gtmin	返回最小元素&ltbr /&gtprod	计算数组元素的连乘积&ltbr /&gtreshape	重新调整矩阵的行数、列数、维数&ltbr /&gtsize	计算数组大小&ltbr /&gtsort	排序每个列&ltbr /&gtsum	每列相加&ltbr /&gteye	创建一个单位矩阵&ltbr /&gtones	生成全1矩阵&ltbr /&gtzeros	生成零矩阵&ltbr /&gtcross	计算矩阵交叉乘积&ltbr /&gtdot	计算矩阵点积&ltbr /&gtdet	计算数组的行列式&ltbr /&gtinv	计算矩阵的逆&ltbr /&gtpinv	计算矩阵的伪逆&ltbr /&gtrank	计算矩阵的秩&ltbr /&gtrref	将矩阵化成行最简形&ltbr /&gtcell	创建单元数组&ltbr /&gtcelldisp	显示单元数组&ltbr /&gtcellplot	显示单元数组的图形表示&ltbr /&gtnum2cell	将数值阵列转化为异质阵列&ltbr /&gtdeal	匹配输入和输出列表&ltbr /&gtiscell	判断是否为元胞类型 &ltbr /&gtMATLAB绘图命令&ltbr /&gtMATLAB提供了大量的命令绘制图表。下表列出了一些常用的命令绘制：&ltbr /&gt&ltbr /&gt命令	作用/目的&ltbr /&gtaxis	人功选择坐标轴尺寸&ltbr /&gtfplot	智能绘图功能&ltbr /&gtgrid	显示网格线&ltbr /&gtplot	生成XY图&ltbr /&gtprint	打印或绘图到文件&ltbr /&gttitle	把文字置于顶部&ltbr /&gtxlabel	将文本标签添加到x轴&ltbr /&gtylabel	将文本标签添加到y轴&ltbr /&gtaxes	创建轴对象&ltbr /&gtclose	关闭当前的绘图&ltbr /&gtclose all	关闭所有绘图&ltbr /&gtfigure	打开一个新的图形窗口&ltbr /&gtgtext	通过鼠标在指定位置放注文&ltbr /&gthold	保持当前图形&ltbr /&gtlegend	鼠标放置图例&ltbr /&gtrefresh	重新绘制当前图形窗口&ltbr /&gtset	指定对象的属性，如轴&ltbr /&gtsubplot	在子窗口中创建图&ltbr /&gttext	在图上做标记&ltbr /&gtbar	创建条形图&ltbr /&gtloglog	创建双对数图&ltbr /&gtpolar	创建极坐标图像&ltbr /&gtsemilogx	创建半对数图（对数横坐标）&ltbr /&gtsemilogy	创建半对数图（对数纵坐标）&ltbr /&gtstairs	创建阶梯图&ltbr /&gtstem	创建针状图');
INSERT INTO `htmlpage` VALUES ('matlab-error-enframe', 'matlab下可以很方便地处理语音信号，里面封装了很多函数，例如enframe等。这就需要使用Voicebox包了。但是默认情况下是，没有自动安装这个包的。&ltbr /&gt&ltbr /&gt所以当我们调用enframe这些函数时，会出现，Undefined function or variable \'enframe\'.这类错误。&ltbr /&gt最简单的解决方法是，下载一个voicebox语音处理包&ltbr /&gt下载完voicebox之后，解压出来，放在一个你喜欢的目录，然后记一下，比如，我放到E盘下，目录就是E:/voicebox&ltbr /&gt然后打开matlab，在下方命令行中，输入addpath(genpath(\'D:\\matlabbox\\voicebox\\voicebox\'));&ltbr /&gt注意，括号中的目录就是voicebox存放的目录。 然后按回车键，就可以开启你的语音处理之旅了。&ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('matlab-foreword', '数百万工程师和科学家信赖 MATLAB&ltbr /&gtMATLAB 将适合迭代分析和设计过程的桌面环境与直接表达矩阵和数组运算的编程语言相结合。&ltbr /&gt&ltbr /&gt专业开发&ltbr /&gtMATLAB 工具箱经过专业开发、严格测试并拥有完善的帮助文档。&ltbr /&gt&ltbr /&gt包含交互式应用程序&ltbr /&gtMATLAB 应用程序让您看到不同的算法如何处理您的数据。在您获得所需结果之前反复迭代，然后自动生成 MATLAB 程序，以便对您的工作进行重现或自动处理。&ltbr /&gt&ltbr /&gt以及扩展能力&ltbr /&gt只需更改少量代码就能扩展您的分析在群集、GPU 和云上运行。无需重写代码或学习大数据编程和内存溢出技术。');
INSERT INTO `htmlpage` VALUES ('matlab-func-audiorecorder', '%创建用于录制音频的对象，通过麦克风收集语音样本并绘制信号数据：&ltbr /&gt&ltbr /&gt% Record your voice for 5 seconds.&ltbr /&gtrecObj = audiorecorder;&ltbr /&gtdisp(\'Start speaking.\')&ltbr /&gtrecordblocking(recObj, 5);&ltbr /&gtdisp(\'End of Recording.\');&ltbr /&gt&ltbr /&gt% Play back the recording.&ltbr /&gtplay(recObj);&ltbr /&gt&ltbr /&gt% Store data in double-precision array.&ltbr /&gtmyRecording = getaudiodata(recObj);&ltbr /&gt&ltbr /&gt% Plot the waveform.&ltbr /&gtplot(myRecording);&ltbr /&gt&ltbr /&gtfname = \'Asin1.wav\';        % 设定文件名称 注意格式&ltbr /&gtaudiowrite(fname,myRecording,8000);     % 输出文件');
INSERT INTO `htmlpage` VALUES ('matlab-func-audiowrite', '输出音频文件所需函数为 audiowrite 。通过例程进行解释：&ltbr /&gt% 生成时间序列&ltbr /&gtfs = 5000;      % [Hz] 信号采样频率&ltbr /&gtT = 1;          % [s] 信号长度 &ltbr /&gtx = 0:1/fs:T;   % [s] 时间序列&ltbr /&gt &ltbr /&gt% 生成信号序列&ltbr /&gtf = 440;        % [Hz] 信号频率&ltbr /&gty = 1*sin(2*pi*f*x);&ltbr /&gt &ltbr /&gt% 输出音频文件&ltbr /&gtfname = \'Asin1.wav\';        % 设定文件名称 注意格式&ltbr /&gtaudiowrite(fname,y,fs);     % 输出文件&ltbr /&gt &ltbr /&gt% 音频文件测试&ltbr /&gtclear y Fs                  % 初始化工作区&ltbr /&gt[y,Fs] = audioread(fname);  % 读取音频文件&ltbr /&gtsound(y,Fs);                % 收听音频');
INSERT INTO `htmlpage` VALUES ('matlab-func-input', 'input 请求用户输入&ltbr /&gt语法&ltbr /&gtx = input(prompt)&ltbr /&gtstr = input(prompt,\'s\')&ltbr /&gt说明&ltbr /&gt示例&ltbr /&gtx = input(prompt) 显示 prompt 中的文本并等待用户输入值后按 Return 键。用户可以输入 pi/4 或 rand(3) 之类的表达式，并可以使用工作区中的变量。&ltbr /&gt&ltbr /&gt如果用户不输入任何内容直接按下 Return 键，则 input 会返回空矩阵。&ltbr /&gt&ltbr /&gt如果用户在提示下输入无效的表达式，则 MATLAB会显示相关的错误消息，然后重新显示提示。&ltbr /&gt&ltbr /&gt示例&ltbr /&gtstr = input(prompt,\'s\') 返回输入的文本，而不会将输入作为表达式来计算。&ltbr /&gt&ltbr /&gt请求数值输入或表达式&ltbr /&gt请求一个数值输入，然后将该输入乘以 10。&ltbr /&gt&ltbr /&gtprompt = \'What is the original value? \';&ltbr /&gtx = input(prompt)&ltbr /&gty = x*10&ltbr /&gt在提示下，输入一个数值或数组（如 42）。&ltbr /&gt&ltbr /&gtx =&ltbr /&gt    42&ltbr /&gt&ltbr /&gty =&ltbr /&gt   420&ltbr /&gtinput 函数还接受表达式。例如，重新运行以下代码。&ltbr /&gt&ltbr /&gtprompt = \'What is the original value? \';&ltbr /&gtx = input(prompt)&ltbr /&gty = x*10&ltbr /&gt在提示下，输入 magic(3)。&ltbr /&gt&ltbr /&gtx =&ltbr /&gt     8     1     6&ltbr /&gt     3     5     7&ltbr /&gt     4     9     2&ltbr /&gt&ltbr /&gty =&ltbr /&gt    80    10    60&ltbr /&gt    30    50    70&ltbr /&gt    40    90    20&ltbr /&gt&ltbr /&gt请求一个简单的不需要计算的文本响应。&ltbr /&gt&ltbr /&gtprompt = \'Do you want more? Y/N [Y]: \';&ltbr /&gtstr = input(prompt,\'s\');&ltbr /&gtif isempty(str)&ltbr /&gt    str = \'Y\';&ltbr /&gtend');
INSERT INTO `htmlpage` VALUES ('matlab-func-mkdir', 'mkdir 新建文件夹&ltbr /&gtmkdir folderName&ltbr /&gtmkdir parentFolder folderName&ltbr /&gtstatus = mkdir(___)&ltbr /&gt[status,msg] = mkdir(___)&ltbr /&gt[status,msg,msgID] = mkdir(___)&ltbr /&gt&ltbr /&gt说明&ltbr /&gtmkdir folderName 创建文件夹 folderName。如果 folderName 存在，则 MATLAB® 发出警告。如果操作失败，则 mkdir 会向命令行窗口发出错误。&ltbr /&gt&ltbr /&gtmkdir parentFolder folderName 在 parentFolder 中创建 folderName。如果 parentFolder 不存在，MATLAB 会尝试创建它。&ltbr /&gt&ltbr /&gtstatus = mkdir(___) 创建指定的文件夹，并在操作成功或文件夹已存在时返回状态 1。否则，mkdir 返回 0，并且不会在命令行窗口中引发警告或错误。您可以将此语法与上述语法中的任何输入参数结合使用。&ltbr /&gt&ltbr /&gt[status,msg] = mkdir(___) 还返回发生的任何警告或错误的消息文本。&ltbr /&gt&ltbr /&gt[status,msg,msgID] = mkdir(___) 还返回发生的任何警告或错误的消息 ID。&ltbr /&gt&ltbr /&gt示例&ltbr /&gt在当前文件夹中创建名为 newdir 的文件夹。&ltbr /&gt在当前文件夹中创建子文件夹&ltbr /&gt mkdir newdir&ltbr /&gt&ltbr /&gt在指定的父文件夹中创建子文件夹&ltbr /&gt在文件夹 testdata 中创建名为 newfolder 的文件夹。使用相对路径，其中 newFolder 与当前文件夹处于同一层级。&ltbr /&gtmkdir ../testdata newFolder&ltbr /&gt&ltbr /&gt输出参数&ltbr /&gtstatus - 文件夹创建状态&ltbr /&gt0 | 1&ltbr /&gt文件夹创建状态，指示创建文件夹的尝试是否成功，返回 0 或 1。如果创建文件夹的尝试成功或文件夹已存在，则 status 的值为 1。否则，值为 0。&ltbr /&gt&ltbr /&gt数据类型： logical&ltbr /&gt&ltbr /&gtmsg - 错误消息&ltbr /&gt字符向量&ltbr /&gt错误消息，以字符向量形式返回。如果发生错误或警告，msg 将包含错误或警告的消息文本。否则，msg 为空，即 \'\'。&ltbr /&gt&ltbr /&gtmsgID - 错误消息标识符&ltbr /&gt字符向量&ltbr /&gt错误消息标识符，以字符向量形式返回。如果发生错误或警告，msgID 将包含错误或警告的消息标识符。否则，msgID 为空，即 \'\'。');
INSERT INTO `htmlpage` VALUES ('matlab-syntax', '在&quot;&gt&gt&quot; 命令提示符下键入一个有效的表达，例如：&ltbr /&gt&ltbr /&gt5 + 5&ltbr /&gt然后按 ENTER 键&ltbr /&gt&ltbr /&gt当点击“执行”按钮，或者按“Ctrl+ E”，MATLAB执行它并返回结果：&ltbr /&gt&ltbr /&gtans = 10&ltbr /&gtMATLAB常用的运算符和特殊字符&ltbr /&gtMATLAB常用的运算符和特殊字符如下表所示：&ltbr /&gt&ltbr /&gt运算符	目的&ltbr /&gt+	加；加法运算符&ltbr /&gt-	减；减法运算符&ltbr /&gt*	标量和矩阵乘法运算符&ltbr /&gt.*	数组乘法运算符&ltbr /&gt^	标量和矩阵求幂运算符&ltbr /&gt.^	数组求幂运算符&ltbr /&gt	矩阵左除&ltbr /&gt/	矩阵右除&ltbr /&gt.	阵列左除&ltbr /&gt./	阵列右除&ltbr /&gt:	向量生成；子阵提取&ltbr /&gt( )	 下标运算；参数定义 &ltbr /&gt[ ]	矩阵生成&ltbr /&gt.	点乘运算，常与其他运算符联合使用&ltbr /&gt…	续行标志；行连续运算符&ltbr /&gt,	分行符（该行结果不显示）&ltbr /&gt;	语句结束；分行符（该行结果显示）&ltbr /&gt%	注释标志&ltbr /&gt_	引用符号和转置运算符&ltbr /&gt._	非共轭转置运算符&ltbr /&gt=	赋值运算符&ltbr /&gtMATLAB分号（;）使用&ltbr /&gt&ltbr /&gtMATLAB中分号（;）表示语句结束；但是，如果想抑制和隐藏 MATLAB 输出表达，表达后添加一个分号。&ltbr /&gtMATLAB添加注释&ltbr /&gt&ltbr /&gtMATLAB的百分比符号（％）是用于表示一个注释行。例如：&ltbr /&gt也可以写注释，使用一块块注释操作符％{％}。&ltbr /&gt&ltbr /&gtMATLAB支持以下特殊变量和常量：&ltbr /&gt&ltbr /&gtName	Meaning&ltbr /&gtans	默认的变量名，以应答最近依次操作运算结果&ltbr /&gteps	浮点数的相对误差&ltbr /&gti,j	虚数单位，定义为 i2 = j2 = -1&ltbr /&gtInf	代表无穷大&ltbr /&gtNaN	代表不定值（不是数字）&ltbr /&gtpi	圆周率&ltbr /&gt&ltbr /&gtMATLAB命名变量&ltbr /&gt变量名称是由一个字母后由任意数量的字母，数字或下划线。&ltbr /&gt&ltfont style=&quot;color:red;&quot;&gt注意MATLAB中是区分大小写的。&lt/font&gt&ltbr /&gt变量名可以是任意长度，但是，&ltfont style=&quot;color:red;&quot;&gtMATLAB使用只有前N个字符，其中N是由函数namelengthmax。&lt/font&gt&ltbr /&gt保存你的工作进度&ltbr /&gtMATLAB使用save命令保存工作区中的所有变量，然后作为一个扩展名为.mat的文件，在当前目录中。 &ltbr /&gt&ltbr /&gt如以下例子：&ltbr /&gt&ltbr /&gtsave myfile&ltbr /&gt该文件可以随时重新加载，然后使用load命令。&ltbr /&gt&ltbr /&gtload myfile');
INSERT INTO `htmlpage` VALUES ('matlab-variables', 'MATLAB如何显示已经使用的变量名？&ltbr /&gt在MATLAB中可以使用 who 命令显示所有已经使用的变量名。&ltbr /&gt&ltbr /&gtwho&ltbr /&gtMATLAB将执行上面的语句，并返回以下结果：&ltbr /&gt&ltbr /&gtYour variables are:&ltbr /&gta    ans  b    c    x    y  &ltbr /&gtwhos 命令则显示多一点有关变量：&ltbr /&gt&ltbr /&gt当前内存中的变量&ltbr /&gt&ltbr /&gt每个变量的类型&ltbr /&gt&ltbr /&gt内存分配给每个变量&ltbr /&gt&ltbr /&gt无论他们是复杂的变量与否&ltbr /&gt&ltbr /&gtwhos&ltbr /&gtMATLAB将执行上面的语句，并返回以下结果：&ltbr /&gt&ltbr /&gt  Name      Size            Bytes  Class     Attributes&ltbr /&gt&ltbr /&gt  a         1x1                 8  double              &ltbr /&gt  ans       1x1                 8  double              &ltbr /&gt  b         1x1                 8  double              &ltbr /&gt  c         1x1                 8  double              &ltbr /&gt  x         1x1                 8  double              &ltbr /&gt  y         1x1                 8  double      &ltbr /&gtclear命令删除所有（或指定）从内存中的变量（S）。&ltbr /&gt&ltbr /&gtclear x     % it will delete x, won\'t display anything&ltbr /&gtclear	     % it will delete all variables in the workspace&ltbr /&gt             %  peacefully and unobtrusively &ltbr /&gt长任务&ltbr /&gt长任务可以通过使用省略号（...）延伸到另一条线路。例如，&ltbr /&gt&ltbr /&gtinitial_velocity = 0;&ltbr /&gtacceleration = 9.8;&ltbr /&gttime = 20;&ltbr /&gtfinal_velocity = initial_velocity ...&ltbr /&gt    + acceleration * time&ltbr /&gtMATLAB将执行上面的语句，并返回以下结果：&ltbr /&gt&ltbr /&gtfinal_velocity =&ltbr /&gt   196&ltbr /&gtMATLAB创建矩阵&ltbr /&gt矩阵是一个二维数字阵列。&ltbr /&gt&ltbr /&gt在MATLAB中，创建一个矩阵每行输入空格或逗号分隔的元素序列，最后一排被划定一个分号。&ltbr /&gt&ltbr /&gt例如，下面创建了一个3×3的矩阵：&ltbr /&gt&ltbr /&gtm = [1 2 3; 4 5 6; 7 8 9]');
INSERT INTO `htmlpage` VALUES ('matlab-warning-malloc', 'b = 0;&ltbr /&gtfor i = 1:3&ltbr /&gt    a(i) = b;&ltbr /&gtend&ltbr /&gt是说变量的长度是变化的，经常在循环里出现，比如上面这个例子，这样会影响计算速度，最好的办法是预先定义a的长度，比如&ltbr /&gtb = 0;&ltbr /&gta = zeros(1,3);&ltbr /&gtfor i = 1:3&ltbr /&gt    a(i) = b;&ltbr /&gtend&ltbr /&gt&ltbr /&gt对于MATLABR2009a有一个改进的地方，对于“a = zeros(1,3);”有个效率更高的方法，“a(1,3) = 0;”。');
INSERT INTO `htmlpage` VALUES ('py-install', '安装，在百度网盘');
INSERT INTO `htmlpage` VALUES ('py-install-check', '完成配置虚拟环境中&ltbr /&gt1.如果git Hill中为空后&ltbr /&gt1.1启动命令行或powershell&ltbr /&gt输入pip list&ltbr /&gtPackage    Version&ltbr /&gt---------- -------&ltbr /&gtpip        10.0.1&ltbr /&gtsetuptools 39.0.1&ltbr /&gt则代表你设置对了虚拟环境，并且正确的在虚拟环境中操作了.&ltbr /&gt1.2&ltbr /&gt进入虚拟环境&ltbr /&gt进入入PS F:pythoncodeHillenvscripts&gt&ltbr /&gt输入.、activate 回车&ltbr /&gt显示(env) PS F:pythoncodeHillenvscripts&gt&ltbr /&gt输入pip list&ltbr /&gtPackage           Version&ltbr /&gt----------------- -------&ltbr /&gtastroid           2.2.5&ltbr /&gtcolorama          0.4.1&ltbr /&gtisort             4.3.20&ltbr /&gtlazy-object-proxy 1.4.1&ltbr /&gtmccabe            0.6.1&ltbr /&gtpip               19.1.1&ltbr /&gtpylint            2.3.1&ltbr /&gtsetuptools        39.0.1&ltbr /&gtsix               1.12.0&ltbr /&gttyped-ast         1.3.5&ltbr /&gtwrapt             1.11.1&ltbr /&gt同样代表你设置对了虚拟环境，并且正确的在虚拟环境中操作了.&ltbr /&gt如果这两个结果反了，则说明你上一步操作错了。记住，我们所有的操作都要在虚拟环境中进行，这是一个非常好的习惯。当然不同的项目需要设定不同的虚拟环境');
INSERT INTO `htmlpage` VALUES ('py-install-env', '1.如果git Hill中为空&ltbr /&gt1.1进入pythoncode 文件夹&ltbr /&gt右键 git bash here&ltbr /&gtgit clone https://github.com/fylovezx/Hill&ltbr /&gt可以看到pythoncode下新建了Hill文件夹，打开有.git的隐藏文件夹&ltbr /&gt1.2创建python虚拟环境&ltbr /&gt进入pythoncodeHill 文件夹&ltbr /&gtshift+右键 进入命令行或powershell&ltbr /&gtPS F:pythoncodeHill&gt python -m venv env&ltbr /&gtenv为虚拟环境的名字&ltbr /&gt可以看到pythoncodeHill中可以看到新建了env文件夹&ltbr /&gt1.3进入vscode,新建工作区，将Hill文件夹包含进内。&ltbr /&gt新建test.py 输入print(&quot;Hello,World&quot;)&ltbr /&gt1.3.1按F5运行，在下方终端内会出现错误：&ltbr /&gt无法加载文件 F:pythoncodeHillenvScriptsactivate.ps1,因为在此系统上禁止...&ltbr /&gt错误，需要用管理员进入命令行或powershell 修改执行脚本的权限。&ltbr /&gt输入set-executionpolicy remotesigned 选择Y.&ltbr /&gt1.3.2修改完成后vscode会报错Linter pylint is not installed.解决方法如下：&ltbr /&gt进入虚拟环境：进入PS F:pythoncodeHillenvscripts&gt&ltbr /&gt输入.、activate 回车&ltbr /&gt显示(env) PS F:pythoncodeHillenvscripts&gt&ltbr /&gt前面的(env)为虚拟环境的名字。&ltbr /&gt输入 pip install pylint 回车 又会报错：&ltbr /&gt Retrying (Retry(total=4, connect=None, read=None, redirect=None, status=None))&ltbr /&gt这是因为python官方网站被墙了,解决方法如下：&ltbr /&gt首先:查找系统环境变量在cmd中输入set回车。&ltbr /&gt我的在USERPROFILE=C:UsersFY中。&ltbr /&gt其次：在USERPROFILE=C:UsersFY中新建pip文件夹及下属的pip.ini文件.输入:&ltbr /&gt[global]&ltbr /&gttimeout = 300&ltbr /&gtindex-url = https://mirrors.aliyun.com/pypi/simple&ltbr /&gt[install]&ltbr /&gttrusted-host = mirrors.aliyun.com&ltbr /&gt提示：如果是http的会报错，没有添加trusted-host = mirrors.aliyun.com会报错&ltbr /&gtThe repository located at mirrors.aliyun.com is not a trusted&ltbr /&gt再次输入输入 pip install pylint 回车不会报错&ltbr /&gt但是最后一行提醒pip版本过低，按照提示输入python -m pip install --upgrade pip即可&ltbr /&gt做到这里了，你需要打开 1.2-查看是否配置正确 确认一下。&ltbr /&gt1.3.3再次进入vscode test.py中按F5运行，我们看已经没有错误了');
INSERT INTO `htmlpage` VALUES ('py-vscode', '安装，在百度网盘&ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('stomach-HPY', '英文缩写: HPY 中文全称: 幽门螺旋杆菌&ltbr /&gt英文全称: Helicobacter Pylori&ltbr /&gt&ltbr /&gt幽门螺旋杆菌是一种螺旋形、微厌氧、对生长条件要求十分苛刻的革兰氏阴性杆菌。1983年首次从慢性活动性胃炎患者的胃粘膜活检组织中分离成功，是现所知能够在人胃中生存的惟一微生物种类。幽门螺旋杆菌病包括由幽门螺旋杆菌感染引起的胃炎、消化道溃疡、淋巴增生性胃淋巴瘤等。幽门螺旋杆菌病的不良预后是胃癌。在1994年幽门螺杆菌被世界卫生组织所属国际癌症研究中心列为I类生物致癌因子。2017年10月27日公布的致癌清单中再次被列为I类致癌物。它有个洋名叫H.pylori，有的医生还会把其简写为“Hp”或“HP”。');
INSERT INTO `htmlpage` VALUES ('stomach-HPY-DIAG', '侵入性方法&ltbr /&gt&ltbr /&gt需依赖胃镜取材，但胃镜并不能直接看到Hp，需胃镜下钳取1-2块胃黏膜组织进行检查。主要包括 ：&ltbr /&gt&ltbr /&gt1.细菌培养&ltbr /&gt&ltbr /&gt特异性高达100%，是诊断幽门螺杆菌的“金标准”。最大的优点可进行药敏试验。但是操作复杂、耗时，需要一定实验室条件。&ltbr /&gt&ltbr /&gt2.胃黏膜组织切片染色镜&ltbr /&gt&ltbr /&gt病理科医生对胃黏膜活检标本切片、染色，在显微镜下直接观察有无Hp。同时，可对胃黏膜病变进行诊断。不同染色方法检测结果存在一定差异，其中免疫组化染色是一种高敏感和特异的染色方法，它是组织学检测的“金标准”。&ltbr /&gt&ltbr /&gt3.快速尿素酶试验&ltbr /&gt&ltbr /&gt把胃黏膜组织置入含尿素试液中，数分钟后如变为红色则证明有幽门螺杆菌感染，否则无。检测快速、方便、价廉，敏感性和特异性均在90%~95%之间。但检测结果受试剂、取材部位、组织大小、细菌量、观察时间、环境温度等影响。&ltbr /&gt&ltbr /&gt非侵入性检测方法&ltbr /&gt&ltbr /&gt优点是不依赖胃镜检查，可反映全胃幽门螺杆菌感染状况，但缺点是不能明确胃病的情况。主要包括：&ltbr /&gt&ltbr /&gt1.13C或14C尿素呼气试验&ltbr /&gt&ltbr /&gt口服13C或14C标记的尿素胶囊后，经胃黏膜中幽门螺杆菌的尿素酶分解，产生NH4+和HCO3-，HCO3-经肠道吸收后进入血液循环，在肺中以CO2形式呼出。收集受试者服药后呼出的气体，检测呼出气体中同位素标记的CO2，就可以判断是否感染了Hp，操作简便。&ltbr /&gt&ltbr /&gt2．粪便抗原检测&ltbr /&gt&ltbr /&gtHp定植于胃黏膜上皮，随着胃黏膜上皮细胞的快速更新而脱落，随粪便排出，可通过粪便检测幽门螺杆菌。该法敏感性90%~98%，特异性75%~100%；方法简便，无需口服任何试剂，只需留取粪便标本。适宜所有人群，包括婴幼儿和精神障碍的患者。&ltbr /&gt&ltbr /&gt3.血清抗体检测&ltbr /&gt&ltbr /&gt检测的抗体是IgG，幽门螺杆菌感染后约1~3个月才产生抗体，根除后血清中抗体会存在数月至数年。&ltbr /&gt&ltbr /&gt只能反映一段时间内Hp感染情况，阳性者只能说有过幽门螺杆菌感染，不能明确现在是否有幽门螺杆菌感染。但幽门螺杆菌感染后一般不能自行消失，如果未经抗幽门螺杆菌治疗者，其抗体阳性提示很可能存在幽门螺杆菌现症感染的情况。');
INSERT INTO `htmlpage` VALUES ('stomach-HPY-pathway', '口口传播&ltbr /&gt&ltbr /&gt1.共餐、经常在外就餐是幽门螺杆菌感染的重要途径之一。中国人吃饭都特别融洽有氛围，一盘菜大家夹来夹去，不爱用公筷，还喜欢扎堆聚餐，这就给幽门螺杆菌的入侵提供了有利的条件；一旦这桌人中有一个感染者，那么其他人就有被感染的可能；所以建议要使用公筷。&ltbr /&gt&ltbr /&gt2.另外一个重要途径是接吻，科学研究发现：胃部的幽门螺杆菌在唾液中也会有所残留。而接吻是交换唾液最直接的方式。&ltbr /&gt&ltbr /&gt3.幽门螺杆菌可在牙菌斑和龋齿上生长繁殖，所以要认真刷牙，家人之间不要共用牙刷。&ltbr /&gt&ltbr /&gt4.不熟的食物：有些人爱吃七分甚至三分熟牛排，还有人吃火锅时生肉刚涮到锅里，就急不可耐夹出来大快朵颐，殊不知，幽门螺杆菌可能就通过这些半生不熟的肉制品进入到我们的胃里，继而发生感染。&ltbr /&gt&ltbr /&gt5.刺激性食物：由于刺激性食物容易刺激胃粘膜，致使胃的抵抗力低下，从而容易导致幽门螺杆菌的入侵，它对造成感染幽门螺杆菌的后果虽然不是立竿见影的，但却是潜移默化而且持久的。&ltbr /&gt&ltbr /&gt粪口传播&ltbr /&gt&ltbr /&gt粪便中存活的幽门螺杆菌污染了水源或食物，可令饮水者或食用者感染幽门螺杆菌，所以，饭前便后洗手，保持清洁水源、坚持不喝生水、不生吃蔬菜或未洗净的瓜果等非常重要。&ltbr /&gt&ltbr /&gt胃口传播&ltbr /&gt&ltbr /&gt是指幽门螺杆菌经感染者的呕吐物等传给健康者。这种情况不多见，主要发生托儿所、幼儿园或小儿的兄弟姐妹中。&ltbr /&gt&ltbr /&gt母婴传播&ltbr /&gt&ltbr /&gt包括不清洁的哺乳，口对口喂食，咀嚼后喂食，亲吻婴儿口唇，或用大人的餐具、吸管等喂食。&ltbr /&gt&ltbr /&gt经宠物、苍蝇、昆虫传播。接触宠物后，要记得洗手，居住环境要清洁，避免蚊蝇骚扰。&ltbr /&gt&ltbr /&gt医源性传播&ltbr /&gt&ltbr /&gt侵入式检查如胃、喉镜，口腔、牙科、鼻腔治疗等，是造成医源性感染的主要原因。所以检查和就医一定要到正规的医院。');
INSERT INTO `htmlpage` VALUES ('wong-dbmflow', '登陆验证成功&ltbr /&gtdiv-main-content include dbm-idnex文件&ltbr /&gtdbm-idnex文件中通过dbm-index.js中&ltbr /&gt1.书库管理&ltbr /&gtAjaxDbmOplib方法从dbm-index-oblib.php中进入书库管理&ltbr /&gt1.1添加书架&ltbr /&gtfloor：');
INSERT INTO `htmlpage` VALUES ('wong-foreword', 'sdaf&ltbr /&gtsdfasdf');
INSERT INTO `htmlpage` VALUES ('wong-hispage', '未登陆用户不显示&ltbr /&gt&ltbr /&gt已登陆用户在  div-main-hispage 中显示&ltbr /&gt通过index.js 的AjaxRefHist() 函数从 main-hispage.php 中更新历史记录 &ltbr /&gt添加历史，转换地址的位置有：&ltbr /&gt&ltbr /&gt一、在编写书籍内：&ltbr /&gt已完成：&ltbr /&gt1.通过AjaxWtrComp方法从wtr-index-comp.php 切换页面&ltbr /&gtinclude main-hispage-update.php,把当前地址在wtr-index-comp.php中写入 搞定了&ltbr /&gt未完成：&ltbr /&gt2.通过AjaxWtrVis方法从wtr-comp-content.php 中 link 修改wtr-comp-content页面&ltbr /&gt3.通过wtr-comp-content.php 中 a 标签 进入 wtr-comp-link.php 修改对应的页面&ltbr /&gt那么在wtr-comp-link.php中写入就好了呀&ltbr /&gt&ltbr /&gt二、在浏览页面：&ltbr /&gt1.通过vis-index.js中AjaxVis方法从main-vis-ajax中得到列表&ltbr /&gt搞定，直接定位到节&ltbr /&gt&ltbr /&gt为什么编写书籍不能定位到节是因为编写书籍仅刷新div-wtr-comp-content&ltbr /&gt而浏览页面是全刷新&ltbr /&gt下一步，想个办法替代一下，直接进入仅左侧的编辑页面。&ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('wong-session', '一直存在的---------------&ltbr /&gt存储页面信息：&ltbr /&gt$_SESSION[\'pageinfo\'][\'CtLoc\']&ltbr /&gt$_SESSION[\'pageinfo\'][\'dbm-index\']&ltbr /&gt$_SESSION[\'pageinfo\'][\'main-visit\']&ltbr /&gt$_SESSION[\'pageinfo\'][\'wtr-index\']&ltbr /&gt&ltbr /&gt存储登陆信息：&ltbr /&gt$_SESSION[\'userinfo\']=array(&ltbr /&gt&quot;uname&quot; =&gt$uname,&ltbr /&gt&quot;userid&quot; =&gt1,&ltbr /&gt&quot;qx&quot;   =&gt1,&ltbr /&gt&quot;login&quot; =&gttrue,&ltbr /&gt&quot;connname&quot; =&gt\'wongdbm\',&ltbr /&gt);&ltbr /&gt&ltbr /&gt防止重复post：&ltbr /&gt$_SESSION[\'postdata\']&ltbr /&gt&ltbr /&gt随用随消---------------&ltbr /&gt用于传递值：&ltbr /&gt$_SESSION[\'ajax\']&ltbr /&gt$_SESSION[\'include\']');
INSERT INTO `htmlpage` VALUES ('wong-visflow', '登陆验证成功&ltbr /&gtdiv-main-content include main-visit文件&ltbr /&gtmain-visit文件中通过vis-index.js中AjaxVis方法从main-vis-ajax中得到列表&ltbr /&gt');
INSERT INTO `htmlpage` VALUES ('wong-wtrflow', '登陆验证成功&ltbr /&gtdiv-main-content include wtr-idnex文件&ltbr /&gtwtr-idnex文件中通过wtr-index.js中AjaxWtrComp方法从wtr-index-comp.php中得到所有可编辑书籍的列表&ltbr /&gt单击章节后的+号，能够AjaxWtrNew(\'chapter-$idcp\')在wtr-comp-content.php中显示表单&ltbr /&gt表单提交后在wtr-index中判断isset($_POST[\'insertdata\'],如果存在且不重复则include dbm-insertdata 写入数据库&ltbr /&gt单击章节则会调用 AjaxWtrVis 函数 直接修改 div id=&quot;wtr-comp-content&quot;的内容');

-- ----------------------------
-- Table structure for opliblog
-- ----------------------------
DROP TABLE IF EXISTS `opliblog`;
CREATE TABLE `opliblog`  (
  `mtime` datetime(0) NOT NULL,
  `userid` int(11) NOT NULL COMMENT '防止重名，用户id',
  `username` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '摘要'
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '书库管理日志' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opliblog
-- ----------------------------
INSERT INTO `opliblog` VALUES ('2019-05-12 22:12:00', 1, 'dbm', '在标识id为 1 的楼层<br> 第1 格新建名为 Wong项目 书架,<br> 其标识id为1001');
INSERT INTO `opliblog` VALUES ('2019-05-12 22:12:44', 1, 'dbm', '在标识id为 1 的楼层<br> 第2 格新建名为 web前端 书架,<br> 其标识id为1002');
INSERT INTO `opliblog` VALUES ('2019-05-12 22:13:43', 1, 'dbm', '在标识id为 1002 的书架<br> 第1 格新增名为 HTML 的书籍,<br> 其标识id为100001');
INSERT INTO `opliblog` VALUES ('2019-05-12 22:15:09', 1, 'dbm', '在标识id为 100001 的书<br> 新增名为 HTML基础教程 的章,<br> 其标识id为1');
INSERT INTO `opliblog` VALUES ('2019-05-12 22:16:13', 1, 'dbm', '在标识id为 100001 的书<br> 新增名为 HTML参考手册 的章,<br> 其标识id为2');
INSERT INTO `opliblog` VALUES ('2019-05-18 10:56:09', 12345, 'wtr', '在标识id为 1 的楼层<br> 第3 格新建名为 服务端 书架,<br> 其标识id为1003');
INSERT INTO `opliblog` VALUES ('2019-05-18 10:56:34', 12345, 'wtr', '在标识id为 1003 的书架<br> 第1 格新增名为 PHP 的书籍,<br> 其标识id为100002');
INSERT INTO `opliblog` VALUES ('2019-05-18 11:00:32', 12345, 'wtr', '在标识id为 100002 的书<br> 新增名为 字符处理 的章,<br> 其标识id为3');
INSERT INTO `opliblog` VALUES ('2019-05-18 11:04:32', 12345, 'wtr', '在标识id为 1001 的书架<br> 第1 格新增名为 Wong项目简介 的书籍,<br> 其标识id为100003');
INSERT INTO `opliblog` VALUES ('2019-05-18 11:06:43', 12345, 'wtr', '在标识id为 100003 的书<br> 新增名为 dbm级权限运行流程 的章,<br> 其标识id为4');
INSERT INTO `opliblog` VALUES ('2019-05-18 11:07:20', 12345, 'wtr', '在标识id为 100003 的书<br> 新增名为 用到的变量缩写 的章,<br> 其标识id为5');
INSERT INTO `opliblog` VALUES ('2019-05-18 11:08:55', 12345, 'wtr', '在标识id为 100003 的书<br> 新增名为 wtr级权限运行流程 的章,<br> 其标识id为6');
INSERT INTO `opliblog` VALUES ('2019-05-18 17:16:11', 12345, 'wtr', '在标识id为 1 的楼层<br> 第1 格新建名为 重构Wong项目 书架,<br> 其标识id为1004');
INSERT INTO `opliblog` VALUES ('2019-05-18 17:20:36', 12345, 'wtr', '在标识id为 1004 的书架<br> 第1 格新增名为 518项目 的书籍,<br> 其标识id为100004');
INSERT INTO `opliblog` VALUES ('2019-05-18 17:22:53', 12345, 'wtr', '在标识id为 100004 的书<br> 新增名为 入口选择 的章,<br> 其标识id为7');
INSERT INTO `opliblog` VALUES ('2019-05-18 17:26:31', 12345, 'wtr', '在标识id为 100004 的书<br> 新增名为 数据库结构 的章,<br> 其标识id为8');
INSERT INTO `opliblog` VALUES ('2019-05-18 21:13:24', 12345, 'wtr', '在标识id为 1002 的书架<br> 第2 格新增名为 CSS 的书籍,<br> 其标识id为100005');
INSERT INTO `opliblog` VALUES ('2019-05-18 21:17:50', 12345, 'wtr', '在标识id为 100005 的书<br> 新增名为 css属性 的章,<br> 其标识id为9');
INSERT INTO `opliblog` VALUES ('2019-05-18 21:37:26', 12345, 'wtr', '在标识id为 100003 的书<br> 新增名为 首页浏览运行流程 的章,<br> 其标识id为10');
INSERT INTO `opliblog` VALUES ('2019-05-19 15:41:33', 12345, 'wtr', '在标识id为 1 的楼层<br> 第5 格新建名为 数据处理 书架,<br> 其标识id为1005');
INSERT INTO `opliblog` VALUES ('2019-05-19 15:45:22', 12345, 'wtr', '在标识id为 1005 的书架<br> 第1 格新增名为 Matlab 的书籍,<br> 其标识id为100006');
INSERT INTO `opliblog` VALUES ('2019-05-19 15:47:23', 12345, 'wtr', '在标识id为 100006 的书<br> 新增名为 matlab基础教程 的章,<br> 其标识id为11');
INSERT INTO `opliblog` VALUES ('2019-05-19 16:18:14', 12345, 'wtr', '在标识id为 100006 的书<br> 新增名为 函数 的章,<br> 其标识id为12');
INSERT INTO `opliblog` VALUES ('2019-05-19 19:42:11', 12345, 'wtr', '在标识id为 1001 的书架<br> 第3 格新增名为 Hill 项目 的书籍,<br> 其标识id为100007');
INSERT INTO `opliblog` VALUES ('2019-05-19 19:44:27', 12345, 'wtr', '在标识id为 1001 的书架<br> 第3 格新增名为 Hill 的书籍,<br> 其标识id为100007');
INSERT INTO `opliblog` VALUES ('2019-05-19 19:47:49', 12345, 'wtr', '在标识id为 100007 的书<br> 新增名为  的章,<br> 其标识id为13');
INSERT INTO `opliblog` VALUES ('2019-05-19 19:51:28', 12345, 'wtr', '在标识id为 100007 的书<br> 新增名为 语音预处理 的章,<br> 其标识id为14');
INSERT INTO `opliblog` VALUES ('2019-05-20 21:35:52', 12345, 'wtr', '在标识id为 100003 的书<br> 新增名为 历史记录运行流程 的章,<br> 其标识id为15');
INSERT INTO `opliblog` VALUES ('2019-05-20 22:37:17', 12345, 'wtr', '在标识id为 100003 的书<br> 新增名为 以建立session 的章,<br> 其标识id为16');
INSERT INTO `opliblog` VALUES ('2019-05-21 13:10:02', 12345, 'wtr', '在标识id为 100007 的书<br> 新增名为 MFCC特征的提取步骤 的章,<br> 其标识id为17');
INSERT INTO `opliblog` VALUES ('2019-05-21 13:20:33', 12345, 'wtr', '在标识id为 100007 的书<br> 新增名为 声音矩阵转为文本 的章,<br> 其标识id为18');
INSERT INTO `opliblog` VALUES ('2019-05-21 13:27:10', 12345, 'wtr', '在标识id为 100007 的书<br> 新增名为 名词解释 的章,<br> 其标识id为19');
INSERT INTO `opliblog` VALUES ('2019-05-21 22:03:21', 12345, 'wtr', '在标识id为 1 的楼层<br> 第5 格新建名为 卫生健康 书架,<br> 其标识id为1005');
INSERT INTO `opliblog` VALUES ('2019-05-21 22:04:45', 12345, 'wtr', '在标识id为 1005 的书架<br> 第1 格新增名为 胃 的书籍,<br> 其标识id为100008');
INSERT INTO `opliblog` VALUES ('2019-05-21 22:05:19', 12345, 'wtr', '在标识id为 100008 的书<br> 新增名为 幽门螺旋杆菌 的章,<br> 其标识id为20');
INSERT INTO `opliblog` VALUES ('2019-05-21 22:13:59', 12345, 'wtr', '在标识id为 1005 的书架<br> 第2 格新增名为 外科 的书籍,<br> 其标识id为100009');
INSERT INTO `opliblog` VALUES ('2019-05-21 22:14:25', 12345, 'wtr', '在标识id为 100009 的书<br> 新增名为 疝气 的章,<br> 其标识id为21');
INSERT INTO `opliblog` VALUES ('2019-05-21 23:33:02', 12345, 'wtr', '在标识id为 100006 的书<br> 新增名为 报错 的章,<br> 其标识id为22');
INSERT INTO `opliblog` VALUES ('2019-05-21 23:52:18', 12345, 'wtr', '在标识id为 100007 的书<br> 新增名为 语音基本参数提取 的章,<br> 其标识id为23');
INSERT INTO `opliblog` VALUES ('2019-05-21 23:59:02', 12345, 'wtr', '在标识id为 100006 的书<br> 新增名为 警告 的章,<br> 其标识id为24');
INSERT INTO `opliblog` VALUES ('2019-05-22 00:08:59', 12345, 'wtr', '在标识id为 100006 的书<br> 新增名为 快捷键 的章,<br> 其标识id为25');
INSERT INTO `opliblog` VALUES ('2019-05-23 23:54:39', 12345, 'wtr', '在标识id为 100007 的书<br> 新增名为 面临的困难 的章,<br> 其标识id为26');
INSERT INTO `opliblog` VALUES ('2019-05-30 21:43:27', 12345, 'wtr', '在标识id为 1003 的书架<br> 第2 格新增名为 python 的书籍,<br> 其标识id为100010');
INSERT INTO `opliblog` VALUES ('2019-05-30 21:46:01', 12345, 'wtr', '在标识id为 100010 的书<br> 新增名为 vscode配置 的章,<br> 其标识id为27');
INSERT INTO `opliblog` VALUES ('2019-05-30 22:26:11', 12345, 'wtr', '在标识id为 100010 的书<br> 新增名为 安装与配置 的章,<br> 其标识id为28');

-- ----------------------------
-- Table structure for section
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section`  (
  `idsc` int(11) NOT NULL AUTO_INCREMENT,
  `scname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idcp` int(11) NOT NULL,
  `link` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `scsnum` int(11) NOT NULL,
  PRIMARY KEY (`idsc`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '表示节' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES (1, 'cursor属性', 9, 'css-pr-class-cursor', 1);
INSERT INTO `section` VALUES (2, 'matlab基本语法', 11, 'matlab-syntax', 1);
INSERT INTO `section` VALUES (3, '变量', 11, 'matlab-variables', 2);
INSERT INTO `section` VALUES (4, 'matlab命令', 11, 'matlab-commands', 3);
INSERT INTO `section` VALUES (5, 'audiowrite', 12, 'matlab-func-audiowrite', 1);
INSERT INTO `section` VALUES (6, 'audiorecorder', 12, 'matlab-func-audiorecorder', 3);
INSERT INTO `section` VALUES (7, '理论知识', 14, 'hill-spein-theory ', 1);
INSERT INTO `section` VALUES (8, '短时能量', 14, 'hill-speprep-shortenergy', 2);
INSERT INTO `section` VALUES (9, '分帧和傅里叶变换', 17, 'hill-MFCC-fourier', 2);
INSERT INTO `section` VALUES (10, '求出频谱能量', 17, 'hill-MFCC-Spectrum', 3);
INSERT INTO `section` VALUES (11, '取能量对数', 17, 'hill-MFCC-logs', 4);
INSERT INTO `section` VALUES (12, '求倒谱', 17, 'hill-MFCC-cepstrum', 5);
INSERT INTO `section` VALUES (13, '总结', 17, 'hill-MFCC-summarize', 6);
INSERT INTO `section` VALUES (14, '音素与状态', 18, 'hill-voitotx-phoneme', 1);
INSERT INTO `section` VALUES (15, '语音识别工作原理', 18, 'hill-voitotx-opprc', 2);
INSERT INTO `section` VALUES (16, '隐马尔可夫模型', 19, 'hill-Nxpln-HMM', 1);
INSERT INTO `section` VALUES (17, '静音切除VAD', 19, 'hill-Nxpln-vad', 2);
INSERT INTO `section` VALUES (18, '传播途径', 20, 'stomach-HPY-pathway', 1);
INSERT INTO `section` VALUES (19, '诊断检测', 20, 'stomach-HPY-DIAG', 2);
INSERT INTO `section` VALUES (20, 'MFCC', 19, 'hill-Nxpln-MFCC', 3);
INSERT INTO `section` VALUES (21, '预加重', 17, 'hill-MFCC-preE', 1);
INSERT INTO `section` VALUES (22, 'input', 12, 'matlab-func-input', 4);
INSERT INTO `section` VALUES (23, 'mkdir', 12, 'matlab-func-mkdir', 5);
INSERT INTO `section` VALUES (24, '未定义函数或变量enframe', 22, 'matlab-error-enframe', 1);
INSERT INTO `section` VALUES (25, '短时过零率', 14, 'hill-speprep-szcr', 3);
INSERT INTO `section` VALUES (26, '短时傅里叶变换', 14, 'hill-speprep-scft', 4);
INSERT INTO `section` VALUES (27, '倒谱分析', 23, 'hill-speexprm-cepstrum', 1);
INSERT INTO `section` VALUES (28, '请预分配内存', 24, 'matlab-warning-malloc', 1);
INSERT INTO `section` VALUES (29, '线性预测分析', 23, 'hill-speexprm-lpc', 2);
INSERT INTO `section` VALUES (30, 'LPC谱', 23, 'hill-speexprm-lpcstrum', 3);
INSERT INTO `section` VALUES (31, 'filter', 12, 'matlab-func-filter', 6);
INSERT INTO `section` VALUES (32, 'zeros', 12, 'matlab-func-zeros', 7);
INSERT INTO `section` VALUES (33, '配置虚拟环境', 28, 'py-install-env', 1);
INSERT INTO `section` VALUES (34, '查看是否配置正确', 28, 'py-install-check', 2);

-- ----------------------------
-- Table structure for shelf
-- ----------------------------
DROP TABLE IF EXISTS `shelf`;
CREATE TABLE `shelf`  (
  `idsf` int(11) NOT NULL AUTO_INCREMENT,
  `ctime` datetime(0) NOT NULL COMMENT '创建时间',
  `sfname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '名称',
  `idfl` int(11) NOT NULL COMMENT 'floor 的id',
  `sfsnum` int(11) NOT NULL COMMENT '排序序号',
  PRIMARY KEY (`idsf`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1006 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '把数据库当成图书馆，这个代表楼层，每一floor层楼放不同类型的知识，每一层有若干的shelf' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shelf
-- ----------------------------
INSERT INTO `shelf` VALUES (1001, '2019-05-12 22:12:00', '预研项目', 1, 1);
INSERT INTO `shelf` VALUES (1002, '2019-05-12 22:12:44', 'web前端', 1, 2);
INSERT INTO `shelf` VALUES (1003, '2019-05-18 10:56:09', '服务端', 1, 3);
INSERT INTO `shelf` VALUES (1004, '2019-05-19 15:41:33', '数据处理', 1, 4);
INSERT INTO `shelf` VALUES (1005, '2019-05-21 22:03:21', '卫生健康', 1, 5);

-- ----------------------------
-- Table structure for try
-- ----------------------------
DROP TABLE IF EXISTS `try`;
CREATE TABLE `try`  (
  `codename` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`codename`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '测试代码' ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
