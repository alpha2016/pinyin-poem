/*
 Navicat MySQL Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50715
 Source Host           : 127.0.0.1:3306
 Source Schema         : pinyin-poem

 Target Server Type    : MySQL
 Target Server Version : 50715
 File Encoding         : 65001

 Date: 29/12/2018 17:59:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pp_admins
-- ----------------------------
DROP TABLE IF EXISTS `pp_admins`;
CREATE TABLE `pp_admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `realname` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0/1 正常/停用',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pp_admins
-- ----------------------------
INSERT INTO `pp_admins` VALUES (1, 'admin@pwrd.com', '$2y$10$lD2prUKCmh8XXVJRbgdY1ukSpBuso.x2jRNSHLOBMC1RTStbM.et6', 'admin', 0, '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_admins` VALUES (2, 'pixseed@pwrd.com', '$2y$10$Y9KlPqrcTSnWSKI2u/P62e61nrOTx5Xgh/Wa8BwapWjVHJenyGKDS', '哈哈', 0, '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);

-- ----------------------------
-- Table structure for pp_learn_records
-- ----------------------------
DROP TABLE IF EXISTS `pp_learn_records`;
CREATE TABLE `pp_learn_records`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `poem_id` int(11) NOT NULL COMMENT '诗歌ID',
  `times` int(11) NOT NULL DEFAULT 1 COMMENT '学习次数',
  `duration` int(11) NOT NULL DEFAULT 0 COMMENT '持续时间',
  `created_ip` bigint(20) NOT NULL DEFAULT 0 COMMENT '初次学习IP',
  `updated_ip` bigint(20) NOT NULL DEFAULT 0 COMMENT '上次学习IP',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pp_learn_records
-- ----------------------------
INSERT INTO `pp_learn_records` VALUES (2, 1, 2, 2, 0, 2130706433, 2130706433, '2018-05-24 18:12:53', '2018-05-24 18:13:01');
INSERT INTO `pp_learn_records` VALUES (3, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:47:45', '2018-05-25 10:47:45');
INSERT INTO `pp_learn_records` VALUES (4, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:47:49', '2018-05-25 10:47:49');
INSERT INTO `pp_learn_records` VALUES (5, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:50:37', '2018-05-25 10:50:37');
INSERT INTO `pp_learn_records` VALUES (6, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:51:08', '2018-05-25 10:51:08');
INSERT INTO `pp_learn_records` VALUES (7, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:51:53', '2018-05-25 10:51:53');
INSERT INTO `pp_learn_records` VALUES (8, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:53:31', '2018-05-25 10:53:31');
INSERT INTO `pp_learn_records` VALUES (9, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:36', '2018-05-25 10:57:36');
INSERT INTO `pp_learn_records` VALUES (10, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:37', '2018-05-25 10:57:37');
INSERT INTO `pp_learn_records` VALUES (11, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:38', '2018-05-25 10:57:38');
INSERT INTO `pp_learn_records` VALUES (12, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:39', '2018-05-25 10:57:39');
INSERT INTO `pp_learn_records` VALUES (13, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:40', '2018-05-25 10:57:40');
INSERT INTO `pp_learn_records` VALUES (14, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:41', '2018-05-25 10:57:41');
INSERT INTO `pp_learn_records` VALUES (15, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:42', '2018-05-25 10:57:42');
INSERT INTO `pp_learn_records` VALUES (16, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:43', '2018-05-25 10:57:43');
INSERT INTO `pp_learn_records` VALUES (17, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:45', '2018-05-25 10:57:45');
INSERT INTO `pp_learn_records` VALUES (18, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:45', '2018-05-25 10:57:45');
INSERT INTO `pp_learn_records` VALUES (19, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:46', '2018-05-25 10:57:46');
INSERT INTO `pp_learn_records` VALUES (20, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:47', '2018-05-25 10:57:47');
INSERT INTO `pp_learn_records` VALUES (21, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:48', '2018-05-25 10:57:48');
INSERT INTO `pp_learn_records` VALUES (22, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:50', '2018-05-25 10:57:50');
INSERT INTO `pp_learn_records` VALUES (23, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:51', '2018-05-25 10:57:51');
INSERT INTO `pp_learn_records` VALUES (24, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:52', '2018-05-25 10:57:52');
INSERT INTO `pp_learn_records` VALUES (25, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:53', '2018-05-25 10:57:53');
INSERT INTO `pp_learn_records` VALUES (26, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:57:53', '2018-05-25 10:57:53');
INSERT INTO `pp_learn_records` VALUES (27, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:58:03', '2018-05-25 10:58:03');
INSERT INTO `pp_learn_records` VALUES (28, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:58:13', '2018-05-25 10:58:13');
INSERT INTO `pp_learn_records` VALUES (29, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:58:23', '2018-05-25 10:58:23');
INSERT INTO `pp_learn_records` VALUES (30, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:58:33', '2018-05-25 10:58:33');
INSERT INTO `pp_learn_records` VALUES (31, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:58:43', '2018-05-25 10:58:43');
INSERT INTO `pp_learn_records` VALUES (32, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:58:53', '2018-05-25 10:58:53');
INSERT INTO `pp_learn_records` VALUES (33, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:59:03', '2018-05-25 10:59:03');
INSERT INTO `pp_learn_records` VALUES (34, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:59:13', '2018-05-25 10:59:13');
INSERT INTO `pp_learn_records` VALUES (35, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:59:23', '2018-05-25 10:59:23');
INSERT INTO `pp_learn_records` VALUES (36, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:59:33', '2018-05-25 10:59:33');
INSERT INTO `pp_learn_records` VALUES (37, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:59:43', '2018-05-25 10:59:43');
INSERT INTO `pp_learn_records` VALUES (38, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 10:59:53', '2018-05-25 10:59:53');
INSERT INTO `pp_learn_records` VALUES (39, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 11:00:03', '2018-05-25 11:00:03');
INSERT INTO `pp_learn_records` VALUES (40, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 11:00:13', '2018-05-25 11:00:13');
INSERT INTO `pp_learn_records` VALUES (41, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 11:00:23', '2018-05-25 11:00:23');
INSERT INTO `pp_learn_records` VALUES (42, 0, 1, 1, 0, 2130706433, 2130706433, '2018-05-25 11:00:33', '2018-05-25 11:00:33');
INSERT INTO `pp_learn_records` VALUES (43, 0, 1, 39, 380, 2130706433, 2130706433, '2018-05-25 11:00:43', '2018-07-24 17:35:30');
INSERT INTO `pp_learn_records` VALUES (44, 1, 1, 43, 420, 2130706433, 2130706433, '2018-05-25 11:01:13', '2018-05-25 11:08:56');
INSERT INTO `pp_learn_records` VALUES (45, 0, 13, 2, 10, 2130706433, 2130706433, '2018-05-25 14:36:54', '2018-05-25 14:50:31');
INSERT INTO `pp_learn_records` VALUES (46, 0, 2, 3, 20, 2130706433, 2130706433, '2018-10-25 09:46:16', '2018-10-25 09:46:27');

-- ----------------------------
-- Table structure for pp_migrations
-- ----------------------------
DROP TABLE IF EXISTS `pp_migrations`;
CREATE TABLE `pp_migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pp_migrations
-- ----------------------------
INSERT INTO `pp_migrations` VALUES (56, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `pp_migrations` VALUES (57, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `pp_migrations` VALUES (58, '2017_09_05_061247_create_admins_table', 1);
INSERT INTO `pp_migrations` VALUES (59, '2017_09_06_061716_create_poems_table', 1);
INSERT INTO `pp_migrations` VALUES (60, '2017_09_06_082412_create_poem_types_table', 1);
INSERT INTO `pp_migrations` VALUES (62, '2018_05_24_172746_create_learn_records_table', 2);

-- ----------------------------
-- Table structure for pp_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `pp_password_resets`;
CREATE TABLE `pp_password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pp_poem_types
-- ----------------------------
DROP TABLE IF EXISTS `pp_poem_types`;
CREATE TABLE `pp_poem_types`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '类别名称',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pp_poem_types
-- ----------------------------
INSERT INTO `pp_poem_types` VALUES (1, '春秋诗经', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poem_types` VALUES (2, '楚辞', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poem_types` VALUES (3, '汉赋', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poem_types` VALUES (4, '唐诗', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poem_types` VALUES (5, '宋词', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poem_types` VALUES (6, '元曲', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poem_types` VALUES (7, '大清文字狱', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);

-- ----------------------------
-- Table structure for pp_poems
-- ----------------------------
DROP TABLE IF EXISTS `pp_poems`;
CREATE TABLE `pp_poems`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `poem_type_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '类型id',
  `author` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '作者',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '题目',
  `content` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '内容',
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '简述',
  `admin_id` int(11) NOT NULL COMMENT '最后操作人',
  `picture` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '诗歌配图',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pp_poems
-- ----------------------------
INSERT INTO `pp_poems` VALUES (1, 7, '顾贞观', '金缕曲', '季子平安否？便归来，平生万事，那堪回首？行路悠悠谁慰藉？母老家贫子幼。记不起、从前杯酒。魑魅搏人应见惯，总输他、覆雨翻云手！冰与雪，周旋久。泪痕莫滴牛衣透。数天涯、依然骨肉，几家能够？比似红颜多命薄，更不如今还有。只绝塞、苦寒难受。廿载包胥承一诺，盼乌头、马角终相救。置此札，君怀袖。我亦飘零久，十年来，深恩负尽，死生师友。宿昔齐名非忝窃，试看杜陵消瘦。曾不减，夜郎僝僽。薄命长辞知己别，问人生，到此凄凉否？千万恨，为君剖。兄生辛未我丁丑，共些时，冰霜摧折，早衰蒲柳。词赋从今须少作，留取心魂相守。但愿得，河清人寿。 归日急翻行戍稿，把空名料理传身后。言   不  尽，观顿首。', '清顺治十四年，作者好友吴兆骞参加江南乡试中举，后因主考官作弊受牵连，次年三月在北京复试，\n                由于考场内有许多清兵巡视，发挥不利，十一月与其他七人一同受责打四十大板，并处抄没家产，举家流放到黑龙江宁古塔。\n                该词为作者以词代书寄赠好友的关心劝慰之作。', 1, 'http://47.254.23.180/images/poem1.jpg', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poems` VALUES (2, 4, '王维', '送别', '山中相送罢，日暮掩柴扉。春草年年绿，王孙归不归。', '【注解】：\n                                    又题：《山中送别》\n                                    １、柴扉：柴门。\n                                    ２、王孙：贵族的子孙，这里指送别的友人。\n                                    \n                                    【韵译】：\n                                    在山中送走了你以后，\n                                    夕阳西坠我关闭柴扉。\n                                    春草明年再绿的时候，\n                                    游子呵你能不能回归？', 1, 'http://47.254.23.180/images/poem2.jpg', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poems` VALUES (3, 6, '赵秉文', '青杏儿·风雨替花愁', '风雨替花愁。风雨罢，花也应休。劝君莫惜花前醉，今年花谢，明年花谢，白了人头。乘兴两三瓯。拣溪山好处追游。但教有酒身无事，有花也好，无花也好，选甚春秋。', '赵秉文的这首《青杏儿》好就好在不与前人雷同，风格清新，语句明白如话，\n                以白描的手法，本色天然，流畅自然，与古代众多的游春词相比，确实可谓别有一番清新的韵味。\n                然而，《青杏儿》的作者却不想用更多的悲凉、迟暮感来感染读者。笔调轻轻一转，“乘兴两三瓯”，\n                意境立刻由沉闷、苦恼转向了明彻、欢快。“莫惜”深化为“乘兴”，揭示人们要积极开创美好的生活，良辰美景、赏心乐事要尽情享受。\n                两三盏渍酒，听江山清风，观山间明长，柳绿花红，莺飞草长，造物是这样的神奇，大自然是这样的美妙，\n                人们啊，要“拣溪山好处追游”得欢愉时且欢愉，莫要自寻烦恼。“但教有酒身无事，有花也好，无花也好，选甚春秋。”只要胸襟豁达，有美酒相伴，无俗事缠身，有花也罢，无花也罢，春天永远常在，春光永远无限！这是多么豁达的胸襟，多么美美好的人生感触，愿每人心中都似春光常驻！', 1, 'http://47.254.23.180/images/poem3.jpg', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poems` VALUES (4, 1, '诗经', '关雎', '关关雎鸠，在河之洲。窈窕淑女，君子好逑。参差荇菜，左右流之。窈窕淑女，寤寐求之。求之不得，寤寐思服。悠哉悠哉，辗转反侧。参差荇菜，左右采之。窈窕淑女，琴瑟友之。参差荇菜，左右芼之。窈窕淑女，钟鼓乐之。', '对《关雎》，我们应当从诗义和音乐两方面去理解。就诗义而言，它是“民俗歌谣”，所写的男女爱情是作为民俗反映出来的。\n                相传古人在仲春之月有会合男女的习俗。《周礼·地官·媒氏》云：“媒氏(即媒官)掌万民之判(配合)。……中春(二月)之月，令会男女，于是时也，奔者不禁(不禁止奔)；\n                若无故而不用令者，罚之，司男女之无夫家者而会之。”《关雎》所咏未必就是这段史事的记实，但这段史实却有助于我们了解古代男女相会、\n                互相爱慕并希望成婚的心理状态和风俗习尚。文学作品描写的对象是社会生活，对社会风俗习尚的描写能更真实地再现社会生活，\n                使社会生活融汇于社会风习的画面中，从而就更有真实感。《关雎》就是把古代男女恋情作为社会风俗习尚描写出来的。就乐调而言，全诗重章叠句都是为了合乐而形成的。\n                郑樵《通志·乐略·正声序论》云：“凡律其辞，则谓之诗，声其诗，则谓之歌，作诗未有不歌者也。”郑樵特别强调声律的重要性。凡古代活的有生气的诗歌，往往都可以歌唱，\n                并且重视声调的和谐。《关雎》重章叠句的运用，说明它是可歌的，是活在人们口中的诗歌。当然，《关雎》是把表达诗义和疾徐声调结合起来，以声调传达诗义。\n                郑玄《诗谱序》云：“《虞书》曰：‘诗言志，歌永言，声依永，律和声。’然则诗之道，放于此乎?” ', 1, 'http://47.254.23.180/images/poem4.jpg', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poems` VALUES (5, 2, '屈原', '楚辞-九歌-云中君', '浴兰汤兮沐芳，华采衣兮若英。灵连蜷兮既留，烂昭昭兮未央。謇将憺兮寿宫，与日月兮齐光。龙驾兮帝服，聊翱游兮周章。灵皇皇兮既降，猋远举兮云中。览冀洲兮有余，横四海兮焉穷。思夫君兮太息，极劳心兮忡忡。', '《九歌》是屈赋中最精、最美、最富魅力的诗篇。它代表了屈原艺术创作的最高成就。《九歌》以楚国宗祖的功德和英雄业绩为诗；\n                以山川神祇和自然风物为诗；以神话故事和历史传说为诗，淋漓尽致地抒发了诗人晚年放逐南楚沅湘之间忠君爱国、忧世伤时的愁苦心情和“荡志而愉乐”，“聊以舒吾忧心”，\n                “寓情草木，托意男女”，“吟咏情性，以风其上”的心旨。', 1, 'http://47.254.23.180/images/poem5.jpg', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poems` VALUES (6, 3, '张衡', '归田赋', '浴游都邑以永久，无明略以佐时。徒临川以羡鱼，俟河清乎未期。感蔡子之慷慨，从唐生以决疑。谅天道之微昧，追渔父以同嬉。超埃尘以遐逝，与世事乎长辞。于是仲春令月，时和气清；原隰郁茂，百草滋荣。王雎鼓翼，仓庚哀鸣；交颈颉颃，关关嘤嘤。于焉逍遥，聊以娱情。尔乃龙吟方泽，虎啸山丘。仰飞纤缴，俯钓长流。触矢而毙，贪饵吞钩。落云间之逸禽，悬渊沉之鲨鰡。于时曜灵俄景，继以望舒。极般游之至乐，虽日夕而忘劬。感老氏之遗诫，将回驾乎蓬庐。弹五弦之妙指，咏周、孔之图书。挥翰墨以奋藻，陈三皇之轨模。苟纵心于物外，安知荣辱之所如。', '张衡的大多数作品都表现出对现实的否定与批评。他探讨人生玄妙哲理，也探寻合于自己理想与性格的生活空间。于是，\n                田园的环境、心境，恰与官场、仕途形成对比。《归田赋》的艺术表现形式和语言运用，也同他所展现的内容相称。作者一反《思玄赋》等作品中的艺术表现习惯，\n                此赋篇幅短小，语言清新自然。与作品所展现的环境、心情浑然一体。这些特点使《归田赋》成为中国文学史上第一篇描写田园隐居乐趣的作品，\n                同时，它也是汉代第一篇比较成熟的骈体赋。无论从张衡的全部创作看，还是从汉赋的发展过程看，《归田赋》都具有重要的意义。', 1, 'http://47.254.23.180/images/poem6.jpg', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poems` VALUES (7, 5, '葛长庚', '水调歌头 江上春山远', '江上春山远，山下暮云长。相留相送，时见双燕语风樯。满目飞花万点，回首故人千里，把酒沃愁肠。回雁峰前路，烟树正苍苍。漏声残，灯焰短，马蹄香。浮云飞絮，一身将影向潇湘。多少风前月下，迤逦天涯海角，魂梦亦凄凉。又是春将暮，无语对斜阳。', '葛长庚有云游四方和道士生活的薰陶，因而他的作品清隽飘逸。这阕词赋离愁，从“春山”、“暮云”以下，选用一连串最能叫人愁绝的景物，\n                间用比兴与直接抒写之法，多方面渲染个人情绪，写得愁肠百转，深沉郁结。然而词篇从“相留相送”写起，一气经过回雁峰、潇湘，直至天涯海角，又似江河流注，\n                虽千回百转，却能一往直前。气脉贯通，气韵生动，实是词中珍品。', 1, 'http://47.254.23.180/images/poem7.jpg', '2018-01-17 10:44:01', '2018-01-17 10:44:01', NULL);
INSERT INTO `pp_poems` VALUES (8, 1, 'adsfassssssss', 'too young', 'fd', 'fsg', 1, 'adsaf', '2018-03-30 16:20:09', '2018-03-30 16:20:09', NULL);
INSERT INTO `pp_poems` VALUES (9, 1, 'adsfassssssss', 'too young', 'fd', 'fsg', 1, 'adsaf', '2018-03-30 16:27:15', '2018-03-30 16:27:15', NULL);
INSERT INTO `pp_poems` VALUES (11, 1, '啊打发', 'ad撒', '哈哈哈哈哈哈哈哈哈哈哈哈或或或或或或或或或或或或或或或或或或或或或或或或或或或或或，哈啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '阿萨德发的十大发的十大', 1, 'storage/picture/udXGtVhnVCYQChZTtAtwj7m9TDP4DXp7MlFcveWB.gif', '2018-04-17 15:35:23', '2018-04-17 15:35:23', NULL);
INSERT INTO `pp_poems` VALUES (12, 2, '12321321', '123213', '入乐的歌在感情抒发、形象塑造上和诗没有任何区别，但在结构上、节奏上要受音乐的制约，在韵律上要照顾演唱的方便，在遣词炼字上要考虑听觉艺术的特点，因为它要入乐歌唱。哈哈哈哈哈。', '入乐的歌在感情抒发、形象塑造上和诗没有任何区别，但在结构上、节奏上要受音乐的制约，在韵律上要照顾演唱的方便，在遣词炼字上要考虑听觉艺术的特点，因为它要入乐歌唱。', 1, '/storage/picture/bSdiwB6Lclr3qFDsGfx1VV5W6SEuhGoyWQH0mX9P.jpg', '2018-04-17 15:40:56', '2018-05-08 17:45:44', NULL);
INSERT INTO `pp_poems` VALUES (13, 7, '45454', 'wqer', 'weqrqew', 'eqwrewqr', 1, 'http://47.254.23.180/images/poem7.jpg', '2018-05-25 06:14:48', '2018-05-25 06:14:50', NULL);

-- ----------------------------
-- Table structure for pp_users
-- ----------------------------
DROP TABLE IF EXISTS `pp_users`;
CREATE TABLE `pp_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pp_users
-- ----------------------------
INSERT INTO `pp_users` VALUES (1, '何晓东', '1143887497@qq.com', '$2y$10$Z3XfpDhdXakPBCkt17bRVe7FOeq..5W6VkzYJue4aZix39294EvCK', 'uptPJwkj0Mcf604xLI1JZ9XbAxT0s4OZqDads88UZZR5fh6hlmMMIuINzy1U', '2018-01-17 10:44:01', '2018-01-17 10:44:01');
INSERT INTO `pp_users` VALUES (2, '$2y$10$29gpW1JxquRq9O9aGIr5UeiNSXI2fgPENocQuSmBbXEPIX4Qq8XUW', 'hexiaodong@pwrd.com', '滑稽', NULL, '2018-01-17 10:44:01', '2018-01-17 10:44:01');

-- ----------------------------
-- Table structure for pp_weather_types
-- ----------------------------
DROP TABLE IF EXISTS `pp_weather_types`;
CREATE TABLE `pp_weather_types`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pp_weather_types
-- ----------------------------
INSERT INTO `pp_weather_types` VALUES (1, '晴', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (2, '多云', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (3, '阴', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (4, '阵雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (5, '雷阵雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (6, '雷阵雨伴有冰雹', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (7, '雨夹雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (8, '小雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (9, '中雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (10, '大雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (11, '暴雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (12, '大暴雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (13, '特大暴雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (14, '阵雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (15, '小雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (16, '中雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (17, '大雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (18, '暴雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (19, '特大暴雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (20, '雾', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (21, '冻雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (22, '沙尘暴', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (23, '小雨-中雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (24, '中雨-大雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (25, '大雨-暴雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (26, '暴雨-大暴雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (27, '大暴雨-特大暴雨', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (28, '小雪-中雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (29, '中雪-大雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (30, '大雪-大暴雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (31, '大暴雪-特大暴雪', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (32, '浮沉', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (33, '扬沙', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (34, '强沙尘暴', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (35, '霾', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (36, '特大自然灾害', '2018-06-04 16:09:31', '2018-06-04 16:09:24');
INSERT INTO `pp_weather_types` VALUES (37, '其他人祸', '2018-06-04 16:09:31', '2018-06-04 16:09:24');

-- ----------------------------
-- Table structure for pp_weathers
-- ----------------------------
DROP TABLE IF EXISTS `pp_weathers`;
CREATE TABLE `pp_weathers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL COMMENT '日期',
  `weather_type_id` int(11) NOT NULL DEFAULT 1 COMMENT '类型ID',
  `lowest_temperature` int(11) NOT NULL DEFAULT 0 COMMENT '最低气温',
  `highest_temperature` int(11) NOT NULL DEFAULT 0 COMMENT '最高气温',
  `extra` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '备注信息',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 218 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pp_weathers
-- ----------------------------
INSERT INTO `pp_weathers` VALUES (1, '2018-06-01', 1, 18, 33, '黄昏有风', '2018-06-04 15:53:27', '2018-06-04 15:53:29');
INSERT INTO `pp_weathers` VALUES (2, '2018-06-02', 1, 20, 34, '暴晒天气', '2018-06-04 07:54:43', '2018-06-04 07:54:46');
INSERT INTO `pp_weathers` VALUES (3, '2018-06-03', 3, 17, 28, '阴天', '2018-06-04 07:55:07', '2018-06-04 07:55:09');
INSERT INTO `pp_weathers` VALUES (4, '2018-06-04', 1, 21, 35, '下午有风', '2018-06-04 07:55:33', '2018-06-04 07:55:34');
INSERT INTO `pp_weathers` VALUES (5, '2018-06-05', 1, 25, 40, '暴晒', '2018-06-05 15:04:26', '2018-06-05 15:04:28');
INSERT INTO `pp_weathers` VALUES (6, '2018-06-06', 2, 25, 36, '多云有风', '2018-06-06 13:29:21', '2018-06-06 13:29:22');
INSERT INTO `pp_weathers` VALUES (7, '2018-06-07', 2, 22, 33, '多云微风', '2018-06-07 15:44:27', '2018-06-07 15:44:28');
INSERT INTO `pp_weathers` VALUES (8, '2018-06-08', 2, 19, 32, '多云转雷阵雨', '2018-06-08 10:15:39', '2018-06-08 10:15:40');
INSERT INTO `pp_weathers` VALUES (9, '2018-06-09', 4, 15, 23, '阵雨', '2018-06-09 11:04:00', '2018-06-09 11:04:05');
INSERT INTO `pp_weathers` VALUES (10, '2018-06-10', 2, 22, 32, '多云有风', '2018-06-10 11:04:39', '2018-06-10 11:04:42');
INSERT INTO `pp_weathers` VALUES (11, '2018-06-11', 2, 19, 29, NULL, '2018-06-11 11:05:11', '2018-06-11 11:05:13');
INSERT INTO `pp_weathers` VALUES (12, '2018-06-12', 2, 19, 32, '多云转雷阵雨', '2018-06-12 09:44:21', '2018-06-12 09:44:24');
INSERT INTO `pp_weathers` VALUES (13, '2018-06-13', 5, 17, 28, NULL, '2018-06-13 15:28:34', '2018-06-13 15:28:36');
INSERT INTO `pp_weathers` VALUES (14, '2018-06-14', 1, 19, 31, NULL, '2018-06-14 10:30:54', '2018-06-14 10:30:55');
INSERT INTO `pp_weathers` VALUES (15, '2018-06-15', 2, 20, 32, NULL, '2018-06-15 09:18:43', '2018-06-15 09:18:45');
INSERT INTO `pp_weathers` VALUES (16, '2018-06-16', 5, 21, 31, '多云转雷阵雨', '2018-06-15 09:19:13', '2018-06-15 09:19:15');
INSERT INTO `pp_weathers` VALUES (17, '2018-06-17', 5, 22, 31, '雷阵雨', '2018-06-15 09:20:12', '2018-06-15 09:20:15');
INSERT INTO `pp_weathers` VALUES (18, '2018-06-18', 5, 20, 26, NULL, '2018-06-15 09:20:35', '2018-06-15 09:20:36');
INSERT INTO `pp_weathers` VALUES (19, '2018-06-19', 1, 20, 32, '多云转晴', '2018-06-19 13:27:47', '2018-06-19 13:27:51');
INSERT INTO `pp_weathers` VALUES (20, '2018-06-20', 1, 22, 34, NULL, '2018-06-20 13:28:13', '2018-06-20 13:28:16');
INSERT INTO `pp_weathers` VALUES (21, '2018-06-21', 1, 24, 35, NULL, '2018-06-21 13:28:37', '2018-06-21 13:28:40');
INSERT INTO `pp_weathers` VALUES (22, '2018-06-22', 2, 21, 30, '多云转小雨', '2018-06-22 10:33:22', '2018-06-22 10:33:24');
INSERT INTO `pp_weathers` VALUES (23, '2018-06-23', 2, 23, 35, NULL, '2018-06-23 10:34:20', '2018-06-23 10:34:23');
INSERT INTO `pp_weathers` VALUES (24, '2018-06-24', 2, 23, 34, NULL, '2018-06-24 10:34:27', '2018-06-24 10:34:33');
INSERT INTO `pp_weathers` VALUES (25, '2018-06-25', 4, 24, 34, '阴转雷阵雨', '2018-06-25 16:47:55', '2018-06-25 16:47:59');
INSERT INTO `pp_weathers` VALUES (26, '2018-06-26', 1, 24, 36, NULL, '2018-06-26 16:48:35', '2018-06-26 16:48:38');
INSERT INTO `pp_weathers` VALUES (27, '2018-06-27', 1, 24, 37, NULL, '2018-06-27 16:48:53', '2018-06-27 16:48:56');
INSERT INTO `pp_weathers` VALUES (28, '2018-06-28', 1, 25, 35, NULL, '2018-06-28 16:49:25', '2018-06-28 16:49:28');
INSERT INTO `pp_weathers` VALUES (29, '2018-06-29', 1, 25, 36, NULL, '2018-06-29 16:49:45', '2018-06-29 16:49:50');
INSERT INTO `pp_weathers` VALUES (30, '2018-06-30', 1, 24, 35, NULL, '2018-06-30 16:50:09', '2018-06-30 16:50:12');
INSERT INTO `pp_weathers` VALUES (31, '2018-07-01', 1, 23, 35, NULL, '2018-07-01 16:50:38', '2018-07-01 16:50:43');
INSERT INTO `pp_weathers` VALUES (32, '2018-07-02', 2, 21, 33, '晚间雷阵雨', '2018-07-02 15:14:23', '2018-07-02 15:14:28');
INSERT INTO `pp_weathers` VALUES (33, '2018-07-03', 2, 24, 32, '早上阵雨', '2018-07-03 15:14:53', '2018-07-03 15:14:55');
INSERT INTO `pp_weathers` VALUES (34, '2018-07-04', 2, 26, 35, '多云转晴', '2018-07-04 15:15:25', '2018-07-04 15:15:29');
INSERT INTO `pp_weathers` VALUES (35, '2018-07-05', 2, 24, 35, NULL, '2018-07-05 15:16:01', '2018-07-05 15:16:05');
INSERT INTO `pp_weathers` VALUES (36, '2018-07-06', 2, 24, 34, '多云转雷阵雨', '2018-07-06 15:16:37', '2018-07-06 15:16:41');
INSERT INTO `pp_weathers` VALUES (37, '2018-07-07', 4, 21, 30, NULL, '2018-07-07 15:17:08', '2018-07-07 15:17:11');
INSERT INTO `pp_weathers` VALUES (38, '2018-07-08', 13, 23, 34, '阴', '2018-07-08 13:13:09', '2018-07-08 13:13:13');
INSERT INTO `pp_weathers` VALUES (39, '2018-07-09', 5, 22, 29, NULL, '2018-07-09 13:17:22', '2018-07-09 13:17:24');
INSERT INTO `pp_weathers` VALUES (40, '2018-07-10', 8, 22, 30, NULL, '2018-07-10 13:17:49', '2018-07-10 13:17:52');
INSERT INTO `pp_weathers` VALUES (41, '2018-07-11', 8, 22, 25, NULL, '2018-07-11 13:18:15', '2018-07-11 13:18:17');
INSERT INTO `pp_weathers` VALUES (42, '2018-07-12', 5, 23, 27, NULL, '2018-07-12 13:18:50', '2018-07-12 13:18:53');
INSERT INTO `pp_weathers` VALUES (43, '2018-07-13', 5, 24, 31, NULL, '2018-07-13 13:19:15', '2018-07-13 13:19:19');
INSERT INTO `pp_weathers` VALUES (44, '2018-07-14', 2, 25, 32, '闷热潮湿', '2018-07-14 13:19:42', '2018-07-14 13:19:46');
INSERT INTO `pp_weathers` VALUES (45, '2018-07-15', 5, 25, 33, '闷热潮湿', '2018-07-15 13:20:09', '2018-07-15 13:20:14');
INSERT INTO `pp_weathers` VALUES (46, '2018-07-16', 5, 24, 31, '间歇性大暴雨', '2018-07-16 13:23:44', '2018-07-16 13:23:47');
INSERT INTO `pp_weathers` VALUES (47, '2018-07-16', 5, 24, 31, '间歇性大暴雨', '2018-07-16 13:23:44', '2018-07-16 13:23:47');
INSERT INTO `pp_weathers` VALUES (48, '2018-07-17', 10, 24, 29, '大雨转雷阵雨', '2018-07-17 13:24:25', '2018-07-17 13:24:28');
INSERT INTO `pp_weathers` VALUES (49, '2018-07-18', 5, 25, 32, '雷阵雨转多云', '2018-07-18 13:26:01', '2018-07-18 13:26:04');
INSERT INTO `pp_weathers` VALUES (50, '2018-07-19', 2, 26, 33, NULL, '2018-07-19 13:26:30', '2018-07-19 13:26:33');
INSERT INTO `pp_weathers` VALUES (51, '2018-07-20', 1, 27, 34, NULL, '2018-07-20 13:26:55', '2018-07-20 13:26:58');
INSERT INTO `pp_weathers` VALUES (52, '2018-07-21', 1, 27, 34, NULL, '2018-07-21 13:27:21', '2018-07-21 13:27:25');
INSERT INTO `pp_weathers` VALUES (53, '2018-07-22', 2, 27, 35, NULL, '2018-07-22 13:27:48', '2018-07-22 13:27:52');
INSERT INTO `pp_weathers` VALUES (54, '2018-07-23', 9, 25, 32, '雷阵雨转中雨', '2018-07-23 09:31:04', '2018-07-23 09:31:07');
INSERT INTO `pp_weathers` VALUES (55, '2018-07-24', 10, 26, 28, '大雨转雷阵雨', '2018-07-24 09:31:35', '2018-07-24 09:31:38');
INSERT INTO `pp_weathers` VALUES (56, '2018-07-25', 5, 25, 34, '雷阵雨转多云', '2018-07-25 09:32:22', '2018-07-25 09:32:28');
INSERT INTO `pp_weathers` VALUES (57, '2018-07-26', 2, 25, 33, '晴转多云', '2018-07-26 09:32:56', '2018-07-26 09:40:20');
INSERT INTO `pp_weathers` VALUES (58, '2018-07-27', 2, 26, 32, NULL, '2018-07-27 09:40:53', '2018-07-27 09:40:56');
INSERT INTO `pp_weathers` VALUES (59, '2018-07-28', 2, 26, 32, NULL, '2018-07-28 09:41:29', '2018-07-28 09:41:32');
INSERT INTO `pp_weathers` VALUES (60, '2018-07-29', 2, 27, 34, '桑拿天', '2018-07-29 09:41:48', '2018-07-29 09:41:52');
INSERT INTO `pp_weathers` VALUES (61, '2018-07-30', 1, 25, 34, '桑拿天', '2018-07-30 18:07:23', '2018-07-30 18:07:25');
INSERT INTO `pp_weathers` VALUES (62, '2018-07-31', 1, 26, 35, '桑拿天', '2018-07-31 18:07:43', '2018-07-31 18:07:45');
INSERT INTO `pp_weathers` VALUES (63, '2018-08-01', 1, 27, 35, '桑拿天', '2018-08-01 18:08:03', '2018-08-01 18:08:05');
INSERT INTO `pp_weathers` VALUES (64, '2018-08-02', 1, 26, 35, '桑拿天', '2018-08-02 18:08:22', '2018-08-02 18:08:27');
INSERT INTO `pp_weathers` VALUES (65, '2018-08-03', 1, 26, 35, '桑拿天', '2018-08-03 18:09:03', '2018-08-03 18:09:06');
INSERT INTO `pp_weathers` VALUES (66, '2018-08-04', 1, 27, 34, '桑拿天', '2018-08-04 18:09:28', '2018-08-04 18:09:32');
INSERT INTO `pp_weathers` VALUES (67, '2018-08-05', 5, 26, 34, '桑拿天', '2018-08-05 18:10:00', '2018-08-05 18:10:04');
INSERT INTO `pp_weathers` VALUES (68, '2018-08-06', 5, 23, 30, NULL, '2018-08-06 08:53:04', '2018-08-06 08:53:06');
INSERT INTO `pp_weathers` VALUES (69, '2018-08-07', 5, 24, 29, NULL, '2018-08-07 08:53:27', '2018-08-07 08:53:30');
INSERT INTO `pp_weathers` VALUES (70, '2018-08-08', 5, 25, 30, NULL, '2018-08-08 08:53:48', '2018-08-08 08:53:52');
INSERT INTO `pp_weathers` VALUES (71, '2018-08-09', 8, 24, 31, NULL, '2018-08-09 08:54:24', '2018-08-09 08:54:28');
INSERT INTO `pp_weathers` VALUES (72, '2018-08-10', 5, 25, 31, '大暴雨', '2018-08-10 08:55:03', '2018-08-10 08:55:08');
INSERT INTO `pp_weathers` VALUES (73, '2018-08-11', 5, 24, 30, '大暴雨', '2018-08-11 08:56:50', '2018-08-11 08:56:54');
INSERT INTO `pp_weathers` VALUES (74, '2018-08-12', 5, 24, 29, '大暴雨', '2018-08-12 08:57:09', '2018-08-12 08:57:12');
INSERT INTO `pp_weathers` VALUES (75, '2018-08-13', 3, 24, 30, '间歇小雨', '2018-08-13 15:22:51', '2018-08-13 15:22:55');
INSERT INTO `pp_weathers` VALUES (76, '2018-08-14', 3, 24, 29, NULL, '2018-08-14 15:23:16', '2018-08-14 15:23:19');
INSERT INTO `pp_weathers` VALUES (77, '2018-08-15', 1, 24, 32, NULL, '2018-08-15 15:24:26', '2018-08-15 15:24:28');
INSERT INTO `pp_weathers` VALUES (78, '2018-08-16', 1, 22, 30, NULL, '2018-08-16 15:24:51', '2018-08-16 15:24:56');
INSERT INTO `pp_weathers` VALUES (79, '2018-08-17', 5, 22, 29, NULL, '2018-08-17 15:25:17', '2018-08-17 15:25:20');
INSERT INTO `pp_weathers` VALUES (80, '2018-08-18', 1, 21, 29, NULL, '2018-08-18 15:25:43', '2018-08-18 15:25:46');
INSERT INTO `pp_weathers` VALUES (81, '2018-08-19', 1, 22, 30, NULL, '2018-08-19 15:26:05', '2018-08-19 15:26:08');
INSERT INTO `pp_weathers` VALUES (82, '2018-08-20', 1, 22, 32, NULL, '2018-08-20 09:33:54', '2018-08-20 09:33:58');
INSERT INTO `pp_weathers` VALUES (83, '2018-08-21', 1, 22, 32, NULL, '2018-08-21 09:34:29', '2018-08-21 09:34:31');
INSERT INTO `pp_weathers` VALUES (84, '2018-08-22', 5, 21, 28, NULL, '2018-08-22 09:48:45', '2018-08-22 09:48:48');
INSERT INTO `pp_weathers` VALUES (85, '2018-08-23', 2, 20, 30, NULL, '2018-08-23 09:49:12', '2018-08-23 09:49:15');
INSERT INTO `pp_weathers` VALUES (86, '2018-08-24', 1, 21, 31, NULL, '2018-08-24 09:49:32', '2018-08-24 09:49:36');
INSERT INTO `pp_weathers` VALUES (87, '2018-08-25', 1, 21, 32, NULL, '2018-08-25 09:49:58', '2018-08-25 09:50:02');
INSERT INTO `pp_weathers` VALUES (88, '2018-08-26', 1, 23, 32, NULL, '2018-08-26 09:51:25', '2018-08-26 09:51:29');
INSERT INTO `pp_weathers` VALUES (89, '2018-08-27', 2, 22, 30, '闷热', '2018-08-27 09:11:16', '2018-08-27 09:11:18');
INSERT INTO `pp_weathers` VALUES (90, '2018-08-28', 8, 22, 29, NULL, '2018-08-28 09:11:57', '2018-08-28 09:11:59');
INSERT INTO `pp_weathers` VALUES (91, '2018-08-29', 1, 20, 30, NULL, '2018-08-29 09:12:17', '2018-08-29 09:12:20');
INSERT INTO `pp_weathers` VALUES (92, '2018-08-30', 2, 21, 28, NULL, '2018-08-30 09:12:41', '2018-08-30 09:12:47');
INSERT INTO `pp_weathers` VALUES (93, '2018-08-31', 2, 21, 29, NULL, '2018-08-31 09:13:29', '2018-08-31 09:13:32');
INSERT INTO `pp_weathers` VALUES (94, '2018-09-01', 9, 19, 28, NULL, '2018-09-01 09:21:09', '2018-09-01 09:21:12');
INSERT INTO `pp_weathers` VALUES (95, '2018-09-02', 8, 21, 29, NULL, '2018-09-02 09:21:36', '2018-09-02 09:21:39');
INSERT INTO `pp_weathers` VALUES (96, '2018-09-03', 1, 19, 32, '大风', '2018-09-03 14:21:54', '2018-09-03 14:21:56');
INSERT INTO `pp_weathers` VALUES (97, '2018-09-04', 1, 18, 31, NULL, '2018-09-04 14:22:15', '2018-09-04 14:22:20');
INSERT INTO `pp_weathers` VALUES (98, '2018-09-05', 1, 19, 30, NULL, '2018-09-05 14:22:41', '2018-09-05 14:22:44');
INSERT INTO `pp_weathers` VALUES (99, '2018-09-06', 2, 17, 29, NULL, '2018-09-06 14:23:11', '2018-09-06 14:23:15');
INSERT INTO `pp_weathers` VALUES (100, '2018-09-07', 2, 16, 28, NULL, '2018-09-07 14:23:36', '2018-09-07 14:23:39');
INSERT INTO `pp_weathers` VALUES (101, '2018-09-08', 2, 16, 25, NULL, '2018-09-08 14:24:01', '2018-09-08 14:24:05');
INSERT INTO `pp_weathers` VALUES (102, '2018-09-09', 2, 16, 27, NULL, '2018-09-09 14:24:28', '2018-09-09 14:24:31');
INSERT INTO `pp_weathers` VALUES (103, '2018-09-10', 1, 19, 28, NULL, '2018-09-10 09:33:13', '2018-09-10 09:33:19');
INSERT INTO `pp_weathers` VALUES (104, '2018-09-11', 3, 19, 26, NULL, '2018-09-11 09:38:12', '2018-09-11 09:38:15');
INSERT INTO `pp_weathers` VALUES (105, '2018-09-12', 2, 19, 29, NULL, '2018-09-12 09:38:34', '2018-09-12 09:38:36');
INSERT INTO `pp_weathers` VALUES (106, '2018-09-13', 3, 20, 29, NULL, '2018-09-13 09:38:59', '2018-09-13 09:39:02');
INSERT INTO `pp_weathers` VALUES (107, '2018-09-14', 8, 18, 26, NULL, '2018-09-14 09:39:30', '2018-09-14 09:39:33');
INSERT INTO `pp_weathers` VALUES (108, '2018-09-15', 1, 15, 27, NULL, '2018-09-15 09:39:51', '2018-09-15 09:39:55');
INSERT INTO `pp_weathers` VALUES (109, '2018-09-16', 8, 17, 27, NULL, '2018-09-16 09:40:15', '2018-09-16 09:40:19');
INSERT INTO `pp_weathers` VALUES (110, '2018-09-17', 2, 14, 26, NULL, '2018-09-17 09:06:51', '2018-09-17 09:06:54');
INSERT INTO `pp_weathers` VALUES (111, '2018-09-18', 2, 15, 27, NULL, '2018-09-18 09:07:19', '2018-09-18 09:07:21');
INSERT INTO `pp_weathers` VALUES (112, '2018-09-19', 2, 18, 26, NULL, '2018-09-19 09:07:42', '2018-09-19 09:07:45');
INSERT INTO `pp_weathers` VALUES (113, '2018-09-20', 2, 16, 29, NULL, '2018-09-20 09:08:22', '2018-09-20 09:08:27');
INSERT INTO `pp_weathers` VALUES (114, '2018-09-21', 1, 12, 23, NULL, '2018-09-21 09:08:44', '2018-09-21 09:08:48');
INSERT INTO `pp_weathers` VALUES (115, '2018-09-22', 1, 14, 23, NULL, '2018-09-22 09:09:09', '2018-09-22 09:09:13');
INSERT INTO `pp_weathers` VALUES (116, '2018-09-23', 1, 13, 23, NULL, '2018-09-23 09:09:30', '2018-09-23 09:09:34');
INSERT INTO `pp_weathers` VALUES (117, '2018-09-24', 1, 13, 24, NULL, '2018-09-24 10:40:20', '2018-09-24 10:40:23');
INSERT INTO `pp_weathers` VALUES (118, '2018-09-25', 1, 12, 22, NULL, '2018-09-25 10:40:39', '2018-09-25 10:40:41');
INSERT INTO `pp_weathers` VALUES (119, '2018-09-26', 1, 14, 25, '多云为主', '2018-09-26 10:42:12', '2018-09-26 10:42:16');
INSERT INTO `pp_weathers` VALUES (120, '2018-09-27', 5, 13, 22, NULL, '2018-09-27 10:42:47', '2018-09-27 10:42:53');
INSERT INTO `pp_weathers` VALUES (121, '2018-09-28', 1, 12, 26, NULL, '2018-09-28 10:43:21', '2018-09-28 10:43:25');
INSERT INTO `pp_weathers` VALUES (122, '2018-09-29', 1, 11, 24, NULL, '2018-09-29 10:43:45', '2018-09-29 10:43:49');
INSERT INTO `pp_weathers` VALUES (123, '2018-09-30', 1, 13, 23, NULL, '2018-09-30 10:44:09', '2018-09-30 10:44:13');
INSERT INTO `pp_weathers` VALUES (124, '2018-10-01', 1, 11, 24, NULL, '2018-10-01 08:39:13', '2018-10-01 08:39:17');
INSERT INTO `pp_weathers` VALUES (125, '2018-10-02', 1, 11, 24, NULL, '2018-10-02 08:39:34', '2018-10-02 08:39:37');
INSERT INTO `pp_weathers` VALUES (126, '2018-10-03', 1, 11, 25, NULL, '2018-10-03 08:39:55', '2018-10-03 08:40:00');
INSERT INTO `pp_weathers` VALUES (127, '2018-10-04', 1, 12, 25, NULL, '2018-10-04 08:40:19', '2018-10-04 08:40:23');
INSERT INTO `pp_weathers` VALUES (128, '2018-10-05', 2, 14, 25, NULL, '2018-10-05 08:40:46', '2018-10-05 08:40:50');
INSERT INTO `pp_weathers` VALUES (129, '2018-10-06', 2, 10, 20, NULL, '2018-10-06 08:41:10', '2018-10-06 08:41:15');
INSERT INTO `pp_weathers` VALUES (130, '2018-10-07', 1, 9, 20, NULL, '2018-10-07 08:41:35', '2018-10-07 08:41:39');
INSERT INTO `pp_weathers` VALUES (131, '2018-10-08', 2, 9, 21, NULL, '2018-10-08 08:47:25', '2018-10-08 08:47:27');
INSERT INTO `pp_weathers` VALUES (132, '2018-10-09', 1, 4, 16, NULL, '2018-10-09 08:48:49', '2018-10-09 08:48:52');
INSERT INTO `pp_weathers` VALUES (133, '2018-10-10', 1, 6, 18, NULL, '2018-10-10 08:49:07', '2018-10-10 08:49:10');
INSERT INTO `pp_weathers` VALUES (134, '2018-10-11', 1, 6, 19, NULL, '2018-10-11 08:50:23', '2018-10-11 08:50:26');
INSERT INTO `pp_weathers` VALUES (135, '2018-10-12', 1, 8, 20, NULL, '2018-10-12 08:50:44', '2018-10-12 08:50:49');
INSERT INTO `pp_weathers` VALUES (136, '2018-10-13', 1, 9, 20, '严重雾霾', '2018-10-13 08:51:42', '2018-10-13 08:51:45');
INSERT INTO `pp_weathers` VALUES (137, '2018-10-14', 1, 11, 22, '严重雾霾', '2018-10-14 08:52:01', '2018-10-14 08:52:05');
INSERT INTO `pp_weathers` VALUES (138, '2018-10-15', 8, 11, 17, '严重雾霾+小雨', '2018-10-15 10:24:18', '2018-10-15 10:24:21');
INSERT INTO `pp_weathers` VALUES (139, '2018-10-16', 2, 7, 16, '小雨转晴', '2018-10-16 10:24:47', '2018-10-16 10:24:51');
INSERT INTO `pp_weathers` VALUES (140, '2018-10-17', 2, 6, 17, NULL, '2018-10-17 10:25:08', '2018-10-17 10:25:12');
INSERT INTO `pp_weathers` VALUES (141, '2018-10-18', 1, 6, 17, '雾霾', '2018-10-18 10:25:43', '2018-10-18 10:25:46');
INSERT INTO `pp_weathers` VALUES (142, '2018-10-19', 1, 7, 18, '雾霾', '2018-10-19 10:26:03', '2018-10-19 10:26:07');
INSERT INTO `pp_weathers` VALUES (143, '2018-10-20', 2, 9, 19, '雾霾', '2018-10-20 10:26:29', '2018-10-20 10:26:32');
INSERT INTO `pp_weathers` VALUES (144, '2018-10-21', 2, 8, 18, '严重雾霾', '2018-10-21 10:27:20', '2018-10-21 10:27:24');
INSERT INTO `pp_weathers` VALUES (145, '2018-10-22', 2, 5, 19, '严重雾霾', '2018-10-22 09:37:20', '2018-10-22 09:37:23');
INSERT INTO `pp_weathers` VALUES (146, '2018-10-23', 1, 4, 19, NULL, '2018-10-23 09:37:46', '2018-10-23 09:37:49');
INSERT INTO `pp_weathers` VALUES (147, '2018-10-24', 1, 6, 19, NULL, '2018-10-24 09:38:06', '2018-10-24 09:38:09');
INSERT INTO `pp_weathers` VALUES (148, '2018-10-25', 2, 8, 15, NULL, '2018-10-25 09:38:31', '2018-10-25 09:38:34');
INSERT INTO `pp_weathers` VALUES (149, '2018-10-26', 1, 4, 15, NULL, '2018-10-26 09:38:54', '2018-10-26 09:38:56');
INSERT INTO `pp_weathers` VALUES (150, '2018-10-27', 1, 4, 16, NULL, '2018-10-27 09:39:22', '2018-10-27 09:39:25');
INSERT INTO `pp_weathers` VALUES (151, '2018-10-28', 1, 5, 17, NULL, '2018-10-28 09:39:42', '2018-10-28 09:39:49');
INSERT INTO `pp_weathers` VALUES (152, '2018-10-29', 1, 4, 16, '大风', '2018-10-29 08:47:17', '2018-10-29 08:47:20');
INSERT INTO `pp_weathers` VALUES (153, '2018-10-30', 1, 1, 16, '晴空万里', '2018-10-30 08:47:42', '2018-10-30 08:47:46');
INSERT INTO `pp_weathers` VALUES (154, '2018-10-31', 1, 3, 16, NULL, '2018-10-31 08:48:00', '2018-10-31 08:48:03');
INSERT INTO `pp_weathers` VALUES (155, '2018-11-01', 1, 3, 17, NULL, '2018-11-01 08:48:22', '2018-11-01 08:48:26');
INSERT INTO `pp_weathers` VALUES (156, '2018-11-02', 1, 5, 17, '', '2018-11-02 08:48:48', '2018-11-02 08:48:51');
INSERT INTO `pp_weathers` VALUES (157, '2018-11-03', 1, 7, 17, NULL, '2018-11-03 08:49:09', '2018-11-03 08:49:13');
INSERT INTO `pp_weathers` VALUES (158, '2018-11-04', 1, 5, 15, NULL, '2018-11-04 08:49:34', '2018-11-04 08:49:38');
INSERT INTO `pp_weathers` VALUES (159, '2018-11-05', 1, 5, 14, '微风', '2018-11-05 09:24:39', '2018-11-05 09:24:42');
INSERT INTO `pp_weathers` VALUES (160, '2018-11-06', 1, 6, 14, NULL, '2018-11-06 09:24:55', '2018-11-06 09:24:59');
INSERT INTO `pp_weathers` VALUES (161, '2018-11-07', 3, 3, 13, '寒风', '2018-11-07 09:25:37', '2018-11-07 09:25:42');
INSERT INTO `pp_weathers` VALUES (162, '2018-11-08', 2, 2, 14, NULL, '2018-11-08 09:26:00', '2018-11-08 09:26:04');
INSERT INTO `pp_weathers` VALUES (163, '2018-11-09', 1, 1, 15, NULL, '2018-11-09 09:26:20', '2018-11-09 09:26:24');
INSERT INTO `pp_weathers` VALUES (164, '2018-11-10', 1, 1, 13, NULL, '2018-11-10 09:26:48', '2018-11-10 09:26:51');
INSERT INTO `pp_weathers` VALUES (165, '2018-11-11', 2, 2, 15, NULL, '2018-11-11 09:27:13', '2018-11-11 09:27:17');
INSERT INTO `pp_weathers` VALUES (166, '2018-11-12', 2, 4, 16, '中度污染', '2018-11-12 11:26:15', '2018-11-12 11:26:18');
INSERT INTO `pp_weathers` VALUES (167, '2018-11-13', 2, 5, 13, '重度污染', '2018-11-13 11:26:44', '2018-11-13 11:26:50');
INSERT INTO `pp_weathers` VALUES (168, '2018-11-14', 2, 5, 14, '重度污染，超级严重的雾霾', '2018-11-14 11:27:09', '2018-11-14 11:27:11');
INSERT INTO `pp_weathers` VALUES (169, '2018-11-15', 2, 1, 8, '小雨转多云', '2018-11-15 11:27:51', '2018-11-15 11:27:56');
INSERT INTO `pp_weathers` VALUES (170, '2018-11-16', 2, 0, 7, NULL, '2018-11-16 11:28:20', '2018-11-16 11:28:23');
INSERT INTO `pp_weathers` VALUES (171, '2018-11-17', 1, -1, 10, NULL, '2018-11-17 11:28:41', '2018-11-17 11:28:47');
INSERT INTO `pp_weathers` VALUES (172, '2018-11-18', 1, -3, 10, NULL, '2018-11-18 11:29:33', '2018-11-18 11:29:36');
INSERT INTO `pp_weathers` VALUES (173, '2018-11-19', 1, -2, 9, NULL, '2018-11-19 11:29:59', '2018-11-19 11:30:03');
INSERT INTO `pp_weathers` VALUES (174, '2018-11-20', 2, -1, 10, NULL, '2018-11-20 09:33:21', '2018-11-20 09:33:24');
INSERT INTO `pp_weathers` VALUES (175, '2018-11-21', 1, -3, 9, NULL, '2018-11-21 09:33:46', '2018-11-21 09:33:49');
INSERT INTO `pp_weathers` VALUES (176, '2018-11-22', 1, -3, 8, NULL, '2018-11-22 09:34:17', '2018-11-22 09:34:20');
INSERT INTO `pp_weathers` VALUES (177, '2018-11-23', 1, 0, 9, '阴冷天气', '2018-11-23 09:34:37', '2018-11-23 09:34:41');
INSERT INTO `pp_weathers` VALUES (178, '2018-11-24', 1, -3, 9, '轻度雾霾', '2018-11-24 09:35:25', '2018-11-24 09:35:29');
INSERT INTO `pp_weathers` VALUES (179, '2018-11-25', 1, -3, 8, '中度雾霾', '2018-11-25 09:35:56', '2018-11-25 09:35:59');
INSERT INTO `pp_weathers` VALUES (180, '2018-11-26', 2, 0, 10, '严重雾霾', '2018-11-26 14:11:56', '2018-11-26 14:12:00');
INSERT INTO `pp_weathers` VALUES (181, '2018-11-27', 1, -2, 8, '多云转晴', '2018-11-27 14:12:26', '2018-11-27 14:12:29');
INSERT INTO `pp_weathers` VALUES (182, '2018-11-28', 1, -3, 9, '多云转晴', '2018-11-28 14:12:53', '2018-11-28 14:12:56');
INSERT INTO `pp_weathers` VALUES (183, '2018-11-29', 2, -4, 6, NULL, '2018-11-29 14:13:20', '2018-11-29 14:13:24');
INSERT INTO `pp_weathers` VALUES (184, '2018-11-30', 1, -3, 10, '中度污染', '2018-11-30 14:13:43', '2018-11-30 14:13:49');
INSERT INTO `pp_weathers` VALUES (185, '2018-12-01', 1, -4, 7, '重度污染', '2018-12-01 14:14:22', '2018-12-01 14:14:25');
INSERT INTO `pp_weathers` VALUES (186, '2018-12-02', 2, 0, 7, '重度污染', '2018-12-02 14:14:53', '2018-12-02 14:14:57');
INSERT INTO `pp_weathers` VALUES (187, '2018-12-03', 2, -3, 8, '有风，重度污染', '2018-12-03 10:02:05', '2018-12-03 10:02:09');
INSERT INTO `pp_weathers` VALUES (188, '2018-12-04', 2, -6, 4, NULL, '2018-12-04 10:02:33', '2018-12-04 10:02:36');
INSERT INTO `pp_weathers` VALUES (189, '2018-12-05', 2, -4, 4, NULL, '2018-12-05 10:02:58', '2018-12-05 10:03:01');
INSERT INTO `pp_weathers` VALUES (190, '2018-12-06', 2, -7, 0, NULL, '2018-12-06 10:03:32', '2018-12-06 10:03:36');
INSERT INTO `pp_weathers` VALUES (191, '2018-12-07', 1, -8, -3, NULL, '2018-12-07 10:04:00', '2018-12-07 10:04:03');
INSERT INTO `pp_weathers` VALUES (192, '2018-12-08', 1, -8, -3, NULL, '2018-12-08 10:04:27', '2018-12-08 10:04:30');
INSERT INTO `pp_weathers` VALUES (193, '2018-12-09', 1, -7, 0, NULL, '2018-12-09 10:04:46', '2018-12-09 10:04:50');
INSERT INTO `pp_weathers` VALUES (194, '2018-12-10', 1, -10, -1, '很冷', '2018-12-10 14:51:33', '2018-12-10 14:51:36');
INSERT INTO `pp_weathers` VALUES (195, '2018-12-11', 1, -8, -2, NULL, '2018-12-11 14:53:35', '2018-12-11 14:53:38');
INSERT INTO `pp_weathers` VALUES (196, '2018-12-12', 1, -8, 1, NULL, '2018-12-12 14:54:04', '2018-12-12 14:54:07');
INSERT INTO `pp_weathers` VALUES (197, '2018-12-13', 1, -7, 3, NULL, '2018-12-13 14:54:23', '2018-12-13 14:54:27');
INSERT INTO `pp_weathers` VALUES (198, '2018-12-14', 2, -6, 3, NULL, '2018-12-14 14:54:44', '2018-12-14 14:54:48');
INSERT INTO `pp_weathers` VALUES (199, '2018-12-15', 2, -5, 3, NULL, '2018-12-15 14:55:14', '2018-12-15 14:55:18');
INSERT INTO `pp_weathers` VALUES (200, '2018-12-16', 1, -5, 6, NULL, '2018-12-16 14:55:35', '2018-12-16 14:55:39');
INSERT INTO `pp_weathers` VALUES (201, '2018-12-17', 1, -5, 8, NULL, '2018-12-17 14:56:02', '2018-12-17 14:56:06');
INSERT INTO `pp_weathers` VALUES (202, '2018-12-18', 2, -4, 8, NULL, '2018-12-18 14:56:29', '2018-12-18 14:56:32');
INSERT INTO `pp_weathers` VALUES (203, '2018-12-19', 1, -5, 8, NULL, '2018-12-19 16:43:27', '2018-12-19 16:43:30');
INSERT INTO `pp_weathers` VALUES (204, '2018-12-20', 2, -4, 5, NULL, '2018-12-20 16:43:56', '2018-12-20 16:44:00');
INSERT INTO `pp_weathers` VALUES (205, '2018-12-21', 1, -3, 9, NULL, '2018-12-21 16:44:17', '2018-12-21 16:44:20');
INSERT INTO `pp_weathers` VALUES (206, '2018-12-22', 2, -4, 7, NULL, '2018-12-22 16:45:29', '2018-12-22 16:45:33');
INSERT INTO `pp_weathers` VALUES (207, '2018-12-23', 2, -5, 3, NULL, '2018-12-23 16:46:05', '2018-12-23 16:46:09');
INSERT INTO `pp_weathers` VALUES (208, '2018-12-24', 1, -8, 2, NULL, '2018-12-24 11:12:53', '2018-12-24 11:12:56');
INSERT INTO `pp_weathers` VALUES (209, '2018-12-25', 1, -9, 2, NULL, '2018-12-25 11:13:23', '2018-12-25 11:13:26');
INSERT INTO `pp_weathers` VALUES (210, '2018-12-26', 1, -11, -2, NULL, '2018-12-26 11:13:44', '2018-12-26 11:13:48');
INSERT INTO `pp_weathers` VALUES (211, '2018-12-27', 1, -12, -5, NULL, '2018-12-27 11:14:05', '2018-12-27 11:14:08');
INSERT INTO `pp_weathers` VALUES (212, '2018-12-28', 1, -11, -3, NULL, '2018-12-28 11:14:29', '2018-12-28 11:14:32');
INSERT INTO `pp_weathers` VALUES (213, '2018-12-29', 1, -12, -3, NULL, '2018-12-29 11:14:49', '2018-12-29 11:14:53');
INSERT INTO `pp_weathers` VALUES (214, '2018-12-30', 1, -11, -2, NULL, '2018-12-30 11:17:34', '2018-12-30 11:17:38');
INSERT INTO `pp_weathers` VALUES (215, '2018-12-31', 1, -9, -2, NULL, '2018-12-31 11:17:59', '2018-12-31 11:18:02');

SET FOREIGN_KEY_CHECKS = 1;
