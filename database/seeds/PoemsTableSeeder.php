<?php

use Illuminate\Database\Seeder;

class PoemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('poems')->insert(array(
            [
                'poem_type_id' => 7,
                'author'       => '顾贞观',
                'title'        => '金缕曲',
                'content'      => '季子平安否？便归来，平生万事，那堪回首？行路悠悠谁慰藉？母老家贫子幼。记不起、从前杯酒。魑魅搏人应见惯，总输他、覆雨翻云手！
                冰与雪，周旋久。泪痕莫滴牛衣透。数天涯、依然骨肉，几家能够？比似红颜多命薄，更不如今还有。只绝塞、苦寒难受。廿载包胥承一诺，
                盼乌头、马角终相救。置此札，君怀袖。我亦飘零久，十年来，深恩负尽，死生师友。宿昔齐名非忝窃，试看杜陵消瘦。曾不减，夜郎僝僽。
                薄命长辞知己别，问人生，到此凄凉否？千万恨，为君剖。兄生辛未我丁丑，共些时，冰霜摧折，早衰蒲柳。词赋从今须少作，留取心魂相守。但愿得，
                河清人寿。归日急翻行戍稿，把空名料理传身后。言不尽，观顿首。',
                'description'  => '清顺治十四年，作者好友吴兆骞参加江南乡试中举，后因主考官作弊受牵连，次年三月在北京复试，
                由于考场内有许多清兵巡视，发挥不利，十一月与其他七人一同受责打四十大板，并处抄没家产，举家流放到黑龙江宁古塔。
                该词为作者以词代书寄赠好友的关心劝慰之作。',
                'picture'      => 'https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/logo_white_fe6da1ec.png',
                'admin_id'     => 1,
                'created_at'   => \Carbon\Carbon::now(),
                'updated_at'   => \Carbon\Carbon::now()
            ],
            [
                'poem_type_id' => 4,
                'author'       => '王维',
                'title'        => '送别',
                'content'      => '山中相送罢，日暮掩柴扉。春草年年绿，王孙归不归。',
                'description'  => '【注解】：
                                    又题：《山中送别》
                                    １、柴扉：柴门。
                                    ２、王孙：贵族的子孙，这里指送别的友人。
                                    
                                    【韵译】：
                                    在山中送走了你以后，
                                    夕阳西坠我关闭柴扉。
                                    春草明年再绿的时候，
                                    游子呵你能不能回归？',
                'picture'      => 'https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/logo_white_fe6da1ec.png',
                'admin_id'     => 1,
                'created_at'   => \Carbon\Carbon::now(),
                'updated_at'   => \Carbon\Carbon::now()
            ]
        ));
    }
}
