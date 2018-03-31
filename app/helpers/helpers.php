<?php
// 数字转成中文
if(!function_exists('numToZh')) {
    function numToZh($num, $type){
        // 如果开头是 0，系统默认是八进制/十六进制，暂时不考虑
        if (substr($num, 0, 2) != '0.' && substr($num, 0, 1) == 0) {
            return '数据格式不正确，请检查';
        }

        $number = explode('.', $num);
        $count = count($number);
        $integer = $count >= 1 ? $number[0] : '';
        $decimal = $count >= 2 ? str_split($number[1], 1) : '';   // 直接处理成数组
        $decimalZh = $decimal == '' ? '' : '点' . decimalFourFormat($decimal, $type);
        $integerZh = doTrans($integer, $type, 1);

        $filter = $integerZh . $decimalZh;

        if (mb_substr($filter, 0, 1) == '零') {
            if (mb_substr($filter, 0, 2) == '零点') {
                return $filter;
            }
            return mb_substr($filter, 1);
        } else {
            return str_replace('零点', '点', $integerZh . $decimalZh);
        }
    }
}

// 执行转换的过程
if (!function_exists('doTrans')) {
    function doTrans($number, $type, $isNeedUnit)
    {
        // 补位数字，如果不能被 4 整除，在前面补位缺少个数的 0
        $substitution = '0000';
        $need = strlen($number) % 4 ? 4 - strlen($number) % 4 : 0;
        $formatInteger = substr($substitution, 0, $need) . $number;

        // 单位数组，为了超过 4 位的数字准备
        $unitArray = ['', '万', '亿', '万'];
        $formatNumberArray = array_chunk(str_split($formatInteger, 1), 4, false);
        $str = '';
        foreach ($formatNumberArray as $key => $val) {
            $count = count($formatNumberArray);
            $unit = $count >= 2 ? $unitArray[$count - ($key + 1)] : '';

            $str .= integerFourFormat($val, $type, $isNeedUnit) . $unit;
        }

        return $str;
    }
}

// 四位为单位进行转换,带单位
if (!function_exists('integerFourFormat')) {
    function integerFourFormat($array, $type, $isNeedUnit = 1) {
        $zhSpecialArray = $type == 'chs' ? ['千', '百', '十', '零'] : ['仟', '佰', '拾', '零'];
        $zhPrimaryArray = getDataByType($type);

        // 千百十个的单位，用于处理整体超过5位，后几位是000x类的
        if ($array[0] == 0) {
            $thousand = '零';
        } else {
            $thousand = isset($array[0]) && $array[0] ? $zhPrimaryArray[$array[0]] . ($isNeedUnit ? $zhSpecialArray[0] : '') : '';
        }

        $hundred = isset($array[1]) && $array[1] ? $zhPrimaryArray[$array[1]] . ($isNeedUnit ? $zhSpecialArray[1] : '') : '';
        $decade = isset($array[2]) && $array[2] ? $zhPrimaryArray[$array[2]] . ($isNeedUnit ? $zhSpecialArray[2] : '') : '';
        $unit = isset($array[3]) && $array[3] ? $zhPrimaryArray[$array[3]] : '';

        return $thousand . $hundred . $decade . $unit;
    }
}

// 四位为单位进行转换,带单位
if (!function_exists('decimalFourFormat')) {
    function decimalFourFormat($array, $type) {
        $zhPrimaryArray = getDataByType($type);

        $str = '';
        foreach ($array as $key => $value) {
            $str .= $zhPrimaryArray[$value];
        }

        return $str;
    }
}

// 根据type 来获取数组
if (!function_exists('getDataByType')) {
    function getDataByType($type) {
        $zhs = ['零', '一', '二', '三', '四', '五', '六', '七', '八', '九', '十'];
        $zht = ['零', '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖', '拾'];
        return $type == 'chs' ? $zhs : $zht;
    }
}

// 字符串反转，继续保持同位置大小写一致
// url: https://segmentfault.com/q/1010000010627229/a-1020000010628898 
if (!function_exists('reverse')) {
    function reverse($str) {
        $words = explode(' ', $str);
        $new_words = '';
        foreach ($words as &$word) {
            $rev_word = strrev($word);
            $new_word = '';
            for ($i =0; $i < strlen($word); $i++) {
                $new_word .= preg_match('/^[A-Z]+$/', $word[$i]) 
                    ? strtoupper($rev_word[$i]) : strtolower($rev_word[$i]);
            }
            $new_words .= $new_word. ' ';
        }
        return substr($new_words, 0, -1); 
    }
}

if (!function_exists('sensitiveWordFilter')) {
    function sensitiveWordFilter($str)
    {
        // 最高级别过滤
        // if ($str) {
        //     return '根据最高个人想法，禁止发言';
        // }

        // $words = getSensitiveWords();
        $words = ['fuck', '傻逼', 'bitch啊'];   // 建议从文件或者缓存中读取敏感词列表，英文约定小写
        $flag = false;

        // 提取中文部分，防止其中夹杂英语等
        preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $str, $match);
        $chineseStr = implode('', $match[0]);
        $englishStr = strtolower(preg_replace("/[^A-Za-z0-9\.\-]/", " ", $str));

        $flag_arr = array('？', '！', '￥', '（', '）', '：' , '‘' , '’', '“', '”', '《' , '》', '，', 
        '…', '。', '、', 'nbsp', '】', '【' ,'～', '#', '$', '^', '%', '@', '!', '*', '-'. '_', '+', '=');
        $contentFilter = preg_replace('/\s/', '', preg_replace("/[[:punct:]]/", '', 
        strip_tags(html_entity_decode(str_replace($flag_arr, '', $str), ENT_QUOTES, 'UTF-8'))));

        // 全匹配过滤,去除特殊字符后过滤中文及提取中文部分
        foreach ($words as $word)
        {
            // 判断是否包含敏感词,可以减少这里的判断来降低过滤级别，
            if (strpos($str, $word) !== false || strpos($contentFilter, $word) !== false || strpos($chineseStr, $word) !== false 
            || strpos($englishStr, $word) !== false) {
                return '敏感词:' . $word;
            }
        }
        return $flag ? 'yes' : 'no';
    }
}

/**
 * 批量更新的助手方法
 */
if (!function_exists('updateBatch')) {
    function updateBatch($table, $multipleData = [])
    {
        try {
            if (empty($multipleData)) {
                throw new \Exception("数据不能为空");
            }
            $tableName = DB::getTablePrefix() . $table; // 表名
            $firstRow = current($multipleData);

            $updateColumn = array_keys($firstRow);
            // 默认以id为条件更新，如果没有ID则以第一个字段为条件
            $referenceColumn = isset($firstRow['id']) ? 'id' : current($updateColumn);
            unset($updateColumn[0]);
            // 拼接sql语句
            $updateSql = "UPDATE " . $tableName . " SET ";
            $sets = [];
            $bindings = [];
            foreach ($updateColumn as $uColumn) {
                $setSql = "`" . $uColumn . "` = CASE ";
                foreach ($multipleData as $data) {
                    $setSql .= "WHEN `" . $referenceColumn . "` = ? THEN ? ";
                    $bindings[] = $data[$referenceColumn];
                    $bindings[] = $data[$uColumn];
                }
                $setSql .= "ELSE `" . $uColumn . "` END ";
                $sets[] = $setSql;
            }
            $updateSql .= implode(', ', $sets);
            $whereIn = collect($multipleData)->pluck($referenceColumn)->values()->all();
            $bindings = array_merge($bindings, $whereIn);
            $whereIn = rtrim(str_repeat('?,', count($whereIn)), ',');
            $updateSql = rtrim($updateSql, ", ") . " WHERE `" . $referenceColumn . "` IN (" . $whereIn . ")";
            // 传入预处理sql语句和对应绑定数据
            return DB::update($updateSql, $bindings);
        } catch (\Exception $e) {
            return false;
        }
    }
}
