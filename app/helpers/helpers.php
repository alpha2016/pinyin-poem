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

        $integerZh = doTrans($integer, $type, 1);
        $filter = $integerZh . '点' . decimalFourFormat($decimal, $type);

        if (mb_substr($filter, 0, 1) == '零') {
            if (mb_substr($filter, 0, 2) == '零点') {
                return $filter;
            }
            return mb_substr($filter, 1);
        } else {
            return str_replace('零点', '点', $integerZh . '点' . decimalFourFormat($decimal, $type));
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