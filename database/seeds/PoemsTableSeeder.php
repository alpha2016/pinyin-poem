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
                'content'      => '季子平安否？便归来，平生万事，那堪回首？行路悠悠谁慰藉？母老家贫子幼。
                记不起、从前杯酒。魑魅搏人应见惯，总输他、覆雨翻云手！冰与雪，周旋久。&泪痕莫滴牛衣透。
                数天涯、依然骨肉，几家能够？比似红颜多命薄，更不如今还有。只绝塞、苦寒难受。
                廿载包胥承一诺，盼乌头、马角终相救。置此札，君怀袖。&我亦飘零久，十年来，深恩负尽，死生师友。
                宿昔齐名非忝窃，试看杜陵消瘦。曾不减，夜郎僝僽。薄命长辞知己别，问人生，到此凄凉否？千万恨，为君剖。
                &兄生辛未我丁丑，共些时，冰霜摧折，早衰蒲柳。词赋从今须少作，留取心魂相守。
                但愿得，河清人寿。归日急翻行戍稿，把空名料理传身后。言不尽，观顿首。',
                'description'  => '清顺治十四年，作者好友吴兆骞参加江南乡试中举，后因主考官作弊受牵连，次年三月在北京复试，
                由于考场内有许多清兵巡视，发挥不利，十一月与其他七人一同受责打四十大板，并处抄没家产，举家流放到黑龙江宁古塔。
                该词为作者以词代书寄赠好友的关心劝慰之作。',
                'admin_id'     => 1,
                'created_at'   => \Carbon\Carbon::now(),
                'updated_at'   => \Carbon\Carbon::now()
            ]
        ));
    }
}
