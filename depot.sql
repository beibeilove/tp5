/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : depot

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2018-03-07 17:05:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL COMMENT '文章标题',
  `desc` varchar(255) NOT NULL COMMENT '文章描述',
  `content` longtext NOT NULL COMMENT '文章内容',
  `imgurl` varchar(200) DEFAULT NULL COMMENT '文章封面图片',
  `linkurl` varchar(200) DEFAULT NULL COMMENT '相关链接',
  `type` char(50) DEFAULT NULL COMMENT '文章类型  依赖于position表 ',
  `author` varchar(200) DEFAULT NULL COMMENT '作者',
  `copyfrom` varchar(255) DEFAULT NULL COMMENT '来源',
  `inputtime` int(10) DEFAULT NULL COMMENT '上传日期',
  `updatetime` int(10) DEFAULT NULL COMMENT '更新日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '懂得拒绝，恰是最好的尊1', '不懂拒绝，其实是得了一种叫“不好意思”的病。过度友善的人，不忍或害怕拒绝别人，他们总是怀抱善意，宁可牺牲自己的时间、精力，也不想让别人失望。然而，害怕拒绝，害怕让别人失望，也是一种自卑。', '<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">不懂拒绝，其实是得了一种叫“不好意思”的病。过度友善的人，不忍或害怕拒绝别人，他们总是怀抱善意，宁可牺牲自己的</span><a href=\"http://www.duwenzhang.com/huati/shijian/index1.html\"><span style=\"font-size:16px;\">时间</span></a><span style=\"font-size:16px;\">、精力，也不想让别人</span><a href=\"http://www.duwenzhang.com/huati/shiwang/index1.html\"><span style=\"font-size:16px;\">失望</span></a><span style=\"font-size:16px;\">。然而，害怕拒绝，害怕让别人失望，也是一种</span><a href=\"http://www.duwenzhang.com/huati/zibei/index1.html\"><span style=\"font-size:16px;\">自卑</span></a><span style=\"font-size:16px;\">。</span>\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\"> <a href=\"http://www.duwenzhang.com/wenzhang/shenghuosuibi/20160729/356701.html\"><img border=\"0\" alt=\"懂得拒绝，恰是最好的尊重\" align=\"right\" src=\"http://www.duwenzhang.com/upimg/160729/1_142642.jpg\" width=\"220\" height=\"165\" /></a><span style=\"font-size:16px;\">　　</span><a href=\"http://www.duwenzhang.com/wenzhang/shenghuosuibi/\"><span style=\"font-size:16px;\">生活</span></a><span style=\"font-size:16px;\">总有点欺软怕硬。一个完全不懂拒绝的人，也不可能赢得真正的尊重。</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">不懂拒绝的人，迟早要学会狠下心肠。</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">1. 不懂拒绝，是一种病</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">很多人都</span><a href=\"http://www.duwenzhang.com/huati/xihuan/index1.html\"><span style=\"font-size:16px;\">喜欢</span></a><span style=\"font-size:16px;\">《欢乐颂》里的关雎尔，因为她人长得甜美，心地也好。但她也常常为人诟病：正因为心地太好，她不懂得拒绝别人。</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">关雎尔很多时候加班加得晚，都是因为帮别人做事。终于有一次，同事又病了请她完成剩下的工作，最后也是她签名确认。</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">同事做的那一部分错漏百出，经理知道后却只骂了关雎尔。因为最后签名的是她，所有</span><a href=\"http://www.duwenzhang.com/huati/zeren/index1.html\"><span style=\"font-size:16px;\">责任</span></a><span style=\"font-size:16px;\">都要她来承担。而那个同事，出事之后一句话也没替她说，也没有一句安慰。</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">关雎尔的傻白甜行径，其实也是今天许多人的写照：</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">因为想塑造自己的良好形象，所以对</span><a href=\"http://www.duwenzhang.com/huati/pengyou/index1.html\"><span style=\"font-size:16px;\">朋友</span></a><span style=\"font-size:16px;\">的请求来者不拒。终于，我们</span><a href=\"http://www.duwenzhang.com/huati/wennuan/index1.html\"><span style=\"font-size:16px;\">温暖</span></a><span style=\"font-size:16px;\">了别人，却累死了自己。</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">2 你有多重要？</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">“TA一定是走投无路了，才来找我……”、“要是我把TA拒绝了，我就是坏人……”这是我们在接受求助时的心理。</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">不懂拒绝的背后，是我们往往将自己放在太重要的位置。</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">斗米恩升米仇的</span><a href=\"http://www.duwenzhang.com/\"><span style=\"font-size:16px;\">故事</span></a><span style=\"font-size:16px;\">，却告诉了我们一个无法违背的</span><a href=\"http://www.duwenzhang.com/huati/renxing/index1.html\"><span style=\"font-size:16px;\">人性</span></a><span style=\"font-size:16px;\">：</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">帮得了一次，就有第二次；帮得了第二次，就有后面无穷多次。而无休止帮助的剧情发展，往往是始于</span><a href=\"http://www.duwenzhang.com/huati/ganen/index1.html\"><span style=\"font-size:16px;\">感恩</span></a><span style=\"font-size:16px;\">，终于嫌隙。当哪一次帮不上忙，你就会变成罪人。</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">3 你的位置，决定了你的作为</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">《蝙蝠侠大战超人：正义黎明》这部电影里面，从不拒绝救助任何人的超人，面临着一个巨大挑战：民众在恐慌，这么一个能力巨大的人，他为什么只是帮助人？未来会不会有一天，他用这种强大力量反过来杀人？</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">因此在法庭上，众人拷问的是超人的这个问题：你到底是谁？</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">不懂拒绝别人的人，有意无意地其实是把自己当成了超人。而他们之所以不懂得拒绝，其实正是因为他们跟超人一样，根本没有弄清楚自己到底是谁。</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">关雎尔没有弄清楚自己的身份，她只是公司的其中一个职能，在一个讲究分工协作的五百强企业，她根本不可能完成所有职能的执行。所以她累死累活，最终只能得到跟超人同样的质问。</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">4 拒绝！时而温柔、时而狠狠地拒绝！</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">“有所为，有所不为”，是孔子的话。“有所不为”就是拒绝。什么样的人有所不为？君子。</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">君子就是一种身份地位。像君子一样，对于不同身份地位的人，就有他们该做和该拒绝做的事。</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">三毛说： “不要害怕拒绝他人，如果自己的理由出于正当。当一个人开口提出要求的时候，他的心里根本预备好了两种答案。所以，给他任何一个其中的答案，都是意料中的。”</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">因此，拒绝别人，一定要先给出一个正当理由。“我要下班”、“我不喜欢这样做”都是正当理由。哪怕</span><a href=\"http://www.duwenzhang.com/huati/danchun/index1.html\"><span style=\"font-size:16px;\">单纯</span></a><span style=\"font-size:16px;\">就是不想帮，“我不想”也是最好的理由。</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">如果不想</span><a href=\"http://www.duwenzhang.com/huati/shanghai/index1.html\"><span style=\"font-size:16px;\">伤害</span></a><span style=\"font-size:16px;\">别人的面子，话就说得圆一点。</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">钱锺书去世后，早年就</span><a href=\"http://www.duwenzhang.com/huati/anlian/index1.html\"><span style=\"font-size:16px;\">暗恋</span></a><span style=\"font-size:16px;\">杨绛的费孝通又再上门，临走时，杨绛送他一句话：“楼梯不好走，你以后也不要‘知难而上’了。”</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">费孝通也是聪明人，以后也只能死了那条心。</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">拒绝，不是对来者的侮辱。相反，不浪费大家的时间，是对双方最大的尊重。</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">而每一次拒绝，你都是再一次回答了一个重要的问题，也促使对方思考这一个问题：</span>\r\n	</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><span style=\"font-size:16px;\">我到底是谁。</span>\r\n</p>\r\n<p style=\"text-indent: 2em;\" font-size:14px;\"=\"\"><a href=\"http://www.duwenzhang.com/\">文章</a>来源/国馆（guoguan5000）\r\n	</p>', 'upload/active/img/20171228/1514445342.jpeg', null, '3', '张三', '中国文学网', '1514512705', '1514515819');
INSERT INTO `article` VALUES ('3', '懂得拒绝，恰是最好的尊重', '不懂拒绝，其实是得了一种叫“不好意思”的病。过度友善的人，不忍或害怕拒绝别人，他们总是怀抱善意，宁可牺牲自己的时间、精力，也不想让别人失望。然而，害怕拒绝，害怕让别人失望，也是一种自卑。', '<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	不懂拒绝，其实是得了一种叫“不好意思”的病。过度友善的人，不忍或害怕拒绝别人，他们总是怀抱善意，宁可牺牲自己的<a href=\"http://www.duwenzhang.com/huati/shijian/index1.html\">时间</a>、精力，也不想让别人<a href=\"http://www.duwenzhang.com/huati/shiwang/index1.html\">失望</a>。然而，害怕拒绝，害怕让别人失望，也是一种<a href=\"http://www.duwenzhang.com/huati/zibei/index1.html\">自卑</a>。\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\"> <a href=\"http://www.duwenzhang.com/wenzhang/shenghuosuibi/20160729/356701.html\"><img border=\"0\" alt=\"懂得拒绝，恰是最好的尊重\" align=\"right\" src=\"http://www.duwenzhang.com/upimg/160729/1_142642.jpg\" width=\"220\" height=\"165\" /></a>　　<a href=\"http://www.duwenzhang.com/wenzhang/shenghuosuibi/\">生活</a>总有点欺软怕硬。一个完全不懂拒绝的人，也不可能赢得真正的尊重。\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　不懂拒绝的人，迟早要学会狠下心肠。\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　1 不懂拒绝，是一种病\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　很多人都<a href=\"http://www.duwenzhang.com/huati/xihuan/index1.html\">喜欢</a>《欢乐颂》里的关雎尔，因为她人长得甜美，心地也好。但她也常常为人诟病：正因为心地太好，她不懂得拒绝别人。\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　关雎尔很多时候加班加得晚，都是因为帮别人做事。终于有一次，同事又病了请她完成剩下的工作，最后也是她签名确认。\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　同事做的那一部分错漏百出，经理知道后却只骂了关雎尔。因为最后签名的是她，所有<a href=\"http://www.duwenzhang.com/huati/zeren/index1.html\">责任</a>都要她来承担。而那个同事，出事之后一句话也没替她说，也没有一句安慰。\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　关雎尔的傻白甜行径，其实也是今天许多人的写照：\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　因为想塑造自己的良好形象，所以对<a href=\"http://www.duwenzhang.com/huati/pengyou/index1.html\">朋友</a>的请求来者不拒。终于，我们<a href=\"http://www.duwenzhang.com/huati/wennuan/index1.html\">温暖</a>了别人，却累死了自己。\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　2 你有多重要？\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　“TA一定是走投无路了，才来找我……”、“要是我把TA拒绝了，我就是坏人……”这是我们在接受求助时的心理。\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　不懂拒绝的背后，是我们往往将自己放在太重要的位置。\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　斗米恩升米仇的<a href=\"http://www.duwenzhang.com/\">故事</a>，却告诉了我们一个无法违背的<a href=\"http://www.duwenzhang.com/huati/renxing/index1.html\">人性</a>：\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　帮得了一次，就有第二次；帮得了第二次，就有后面无穷多次。而无休止帮助的剧情发展，往往是始于<a href=\"http://www.duwenzhang.com/huati/ganen/index1.html\">感恩</a>，终于嫌隙。当哪一次帮不上忙，你就会变成罪人。\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　3 你的位置，决定了你的作为\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　《蝙蝠侠大战超人：正义黎明》这部电影里面，从不拒绝救助任何人的超人，面临着一个巨大挑战：民众在恐慌，这么一个能力巨大的人，他为什么只是帮助人？未来会不会有一天，他用这种强大力量反过来杀人？\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　因此在法庭上，众人拷问的是超人的这个问题：你到底是谁？\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　不懂拒绝别人的人，有意无意地其实是把自己当成了超人。而他们之所以不懂得拒绝，其实正是因为他们跟超人一样，根本没有弄清楚自己到底是谁。\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　关雎尔没有弄清楚自己的身份，她只是公司的其中一个职能，在一个讲究分工协作的五百强企业，她根本不可能完成所有职能的执行。所以她累死累活，最终只能得到跟超人同样的质问。\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　4 拒绝！时而温柔、时而狠狠地拒绝！\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　“有所为，有所不为”，是孔子的话。“有所不为”就是拒绝。什么样的人有所不为？君子。\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　君子就是一种身份地位。像君子一样，对于不同身份地位的人，就有他们该做和该拒绝做的事。\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　三毛说： “不要害怕拒绝他人，如果自己的理由出于正当。当一个人开口提出要求的时候，他的心里根本预备好了两种答案。所以，给他任何一个其中的答案，都是意料中的。”\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　因此，拒绝别人，一定要先给出一个正当理由。“我要下班”、“我不喜欢这样做”都是正当理由。哪怕<a href=\"http://www.duwenzhang.com/huati/danchun/index1.html\">单纯</a>就是不想帮，“我不想”也是最好的理由。\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　如果不想<a href=\"http://www.duwenzhang.com/huati/shanghai/index1.html\">伤害</a>别人的面子，话就说得圆一点。\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　钱锺书去世后，早年就<a href=\"http://www.duwenzhang.com/huati/anlian/index1.html\">暗恋</a>杨绛的费孝通又再上门，临走时，杨绛送他一句话：“楼梯不好走，你以后也不要‘知难而上’了。”\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　费孝通也是聪明人，以后也只能死了那条心。\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　拒绝，不是对来者的侮辱。相反，不浪费大家的时间，是对双方最大的尊重。\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　而每一次拒绝，你都是再一次回答了一个重要的问题，也促使对方思考这一个问题：\r\n	</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　我到底是谁。\r\n</p>\r\n<p style=\"font-family:\" font-size:14px;\"=\"\">\r\n	　　<a href=\"http://www.duwenzhang.com/\">文章</a>来源/国馆（guoguan5000）\r\n	</p>', 'upload/active/img/20171228/1514448793.jpeg', null, '1,3,4', '李四', '中国文学网', '1514512760', '1514512760');

-- ----------------------------
-- Table structure for music
-- ----------------------------
DROP TABLE IF EXISTS `music`;
CREATE TABLE `music` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `songname` varchar(200) DEFAULT NULL COMMENT '歌名',
  `singer` varchar(100) DEFAULT NULL COMMENT '歌手',
  `url` varchar(200) DEFAULT NULL COMMENT '歌曲链接',
  `type` tinyint(1) DEFAULT NULL COMMENT '歌曲类型  对照song_type表',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='音乐表';

-- ----------------------------
-- Records of music
-- ----------------------------

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `posid` int(10) NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `posname` varchar(255) DEFAULT NULL COMMENT '推荐位名称',
  PRIMARY KEY (`posid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='推荐位表';

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES ('1', '热点新闻');
INSERT INTO `position` VALUES ('3', '今日头条');
INSERT INTO `position` VALUES ('4', '优美文章');

-- ----------------------------
-- Table structure for song_type
-- ----------------------------
DROP TABLE IF EXISTS `song_type`;
CREATE TABLE `song_type` (
  `typeid` int(10) NOT NULL,
  `typename` varchar(200) DEFAULT NULL COMMENT '歌曲类型名',
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='歌曲类型表';

-- ----------------------------
-- Records of song_type
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `user_account` tinyint(1) NOT NULL COMMENT '用户角色 1:超级管理员   2:管理员    3:普通用户  4:会员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `user` VALUES ('2', 'admins', 'e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO `user` VALUES ('6', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '0');

-- ----------------------------
-- Table structure for user_group
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `id` int(10) NOT NULL,
  `groupname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of user_group
-- ----------------------------
