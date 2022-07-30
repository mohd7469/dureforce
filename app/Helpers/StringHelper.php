<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class StringHelper extends Str
{
    public const
        LOWER_CASE = 1,
        UPPER_CASE = 2,
        NO_CASE = 3;

    public static function isEmail($value): bool
    {
        return static::contains($value, '@');
    }

    public static function isBoolean($value): bool
    {
        return static::isValueTrue($value) || static::isValueFalse($value);
    }

    public static function doesNotContain($haystack, $needles): bool
    {
        return !static::contains($haystack, $needles);
    }

    public static function isId($value): bool
    {
        /**
         * Using is_numeric instead of typecasting using (int) is important here.
         * A string with mix of string and integers will scoop integer values in
         * most cases making it look like an integer ID when it is not.
         */
        return is_numeric($value);

        /*$value = (int)$value;

        if ($zeroIsValid) {
            return $value >= 0;
        }

        return $value > 0;*/
    }

    public static function isValueTrue($value): bool
    {
        return ArrayHelper::inArray(self::trimLower($value), ['true', '1', 'yes'])
            || $value === 1
            || $value === true;
    }

    public static function isValueFalse($value): bool
    {
        return empty($value) || ArrayHelper::inArray(self::trimLower($value), ['false', '0', 'no'])
            || $value === 0
            || $value === false;
    }

    public static function trimLower(?string $str): string
    {
        return static::lower(trim($str));
    }

    public static function trimUpper(?string $str): string
    {
        return static::upper(trim($str));
    }

    /**
     * @param $value
     * @param string $glue
     * @return null|string
     */
    public static function arrayToString($value, $glue = ','): ?string
    {
        return ArrayHelper::isArray($value) ? implode($glue, $value) : $value;
    }

    /**
     * return the first name on the basis of space
     * e.g 'Tom hanks' return 'Tom'
     * @param $name
     * @return mixed
     */
    public static function firstName($name)
    {
        $parts = explode(' ', trim($name), 2);

        return count($parts) > 0 ? $parts[0] : null;
    }


    /**
     * return the first name if last name does not exit
     * @param $name
     * @return mixed
     */
    public static function lastName($name)
    {
        $parts = explode(' ', trim($name), 2);

        return count($parts) > 1 ? $parts[1] : self::firstName($name);
    }

    public static function replace($string, array $replacePairs = [])
    {
        return strtr($string, $replacePairs);
    }

    public static function removeHtml($string)
    {
        $string = preg_replace('/\s+/', ' ', $string);
        $string = str_replace(['</div>', '&nbsp;'], ["\n", ' '], $string);

        return strip_tags($string);
    }

    /**
     * Checks if a string or an array of strings are equals to a string or an array of strings irrespective of whitespaces, order or case (lower or upper).
     * It actually checks $comparing is subarray of $compareWith.
     *
     * @TESTS also handles null values. $comparing = null and $comparingWith= 'aveenash'. Returns false
     * @TESTS $comparing array should be equal or greater than $compareWith.
     * @TESTS comparing = ['1', '2', '1'], $compareWith = ['1', '2'] will return false.
     * @TESTS any order comparing = ['a', 'b', 'c'], $compareWith = ['c', 'a', 'e', 'b'] will return true.
     * @FAILS: if comparing = ['1', '2', '1'] and $compareWith = ['1', '2', '3'] will return true. So, can not handle duplicates.
     *
     * @param $comparing
     * @param $compareWith
     * @return bool
     */
    public static function equalsExt($comparing, $compareWith): bool
    {
        $comparing = is_array($comparing) ? $comparing : [$comparing];
        $compareWith = is_array($compareWith) ? $compareWith : [$compareWith];
        if (count($comparing) > count($compareWith)) {
            return false;
        }

        $comparing = array_map('trim', array_map('strtolower', $comparing));
        $compareWith = array_map('trim', array_map('strtolower', $compareWith));

        return count(array_intersect($comparing, $compareWith)) === count($comparing);
    }

    /**
     * Checks if the strings in the provided array are equal. Can be used to compare two or more strings.
     * @param array $strings
     * @return bool
     */
    public static function equals(array $strings): bool
    {
        if (empty($strings)) { // empty values mean they are equal
            return true;
        }

        if (!is_string($firstValue = $strings[0])) { // if not string, not equal
            return false;
        }

        $firstValueLength = static::length($firstValue);

        foreach ($strings as $string) {
            if (static::length($string) !== $firstValueLength || !static::contains($firstValue, $string)) {
                return false;
            }
        }

        return true;
    }

    /**
     * converts string to provided case (upper or lower) with trim flag.
     *
     * @param mixed $string
     * @param int $case
     * @param bool $trim
     *
     * @return mixed
     */
    public static function to($string, int $case = self::LOWER_CASE, bool $trim = false)
    {
        if (is_string($string)) {
            if ($trim) {
                $string = trim($string);
            }
            switch ($case) {
                case self::LOWER_CASE:
                    return self::lower($string);
                case self::UPPER_CASE:
                    return self::upper($string);
            }
        }

        return $string;
    }

    /**
     * StartsWithExtended. Can return index of matching needle.
     *
     * @param string $haystack
     * @param string|string[] $needles
     * @param bool $index
     * @return int|bool
     */
    public static function startsWithExt($haystack, $needles, $index = false)
    {
        foreach ((array)$needles as $i => $needle) {
            if ($needle !== '' && substr($haystack, 0, strlen($needle)) === (string)$needle) {
                return $index ? $i : true;
            }
        }

        return false;
    }

    /**
     * Inverse of @param array $strings
     * @return bool
     * @link static::equals
     *
     */
    public static function notEquals(array $strings): bool
    {
        return !static::equals($strings);
    }

    public static function convertToImapUtf8(string $value): string
    {
        return imap_utf8($value);
    }

    public static function isEmpty($strings): bool
    {
        $ret = true;
        foreach ($strings as $s) {
            $ret = $ret && empty(trim($s));
        }
        return $ret;
    }

    /**
     * @param $string
     * @param bool $withHyphens , Sometimes you may need hyphens in your string
     * @param string $replaceWith
     * @return null|string|string[]
     */
    public static function removeOrReplaceSpecialCharacters($string, $withHyphens = true, $replaceWith = '')
    {
        if (!$withHyphens) {
            $string = str_replace('-', ' ', $string);
        }

        return preg_replace('/[^A-Za-z0-9\-]/', $replaceWith, $string);
    }

    public static function isChinese($words): int
    {
        return preg_match("/\p{Han}+/u", $words);
    }

    public static function isJapanese($words): bool
    {
        return preg_match('/[\x{4E00}-\x{9FBF}\x{3040}-\x{309F}\x{30A0}-\x{30FF}]/u', $words);
    }

    public static function isKorean($string)
    {
        return preg_match('/[\x{3130}-\x{318F}\x{AC00}-\x{D7AF}]/u', $string);
    }

    public static function isForeignLanguage($words): bool
    {
        return static::isJapanese($words) || static::isChinese($words) || static::isKorean($words);
    }

    public static function extractNumeric(string $value, $allInstancesMerged = false): int
    {
        preg_match_all('!\d+!', $value, $matches);

        if (is_array($matches) && !empty($matches)) {
            $firstMatch = $matches[0];

            if (is_array($firstMatch) && !empty($firstMatch)) {
                if ($allInstancesMerged) {
                    return (int)implode('', $firstMatch);
                }

                return $firstMatch[0];
            }
        }

        return 0;
    }

    /**
     * @param $data
     * @return mixed
     * @deprecated
     *
     * ----  DO NOT USE IN V3 - THIS FUNCTION IS ONLY USED TO DECRYPT THE HASHED SETTINGS FROM V2  ----
     *
     */
    public static function decrypt($data)
    {
        $encryptPasswords = [
            'MJ7400576955ee==66014ee5e5eebc66015194946055eea81113117955eea7=8c6af741505899JA',
            'IG932173955eebc6==lebc660148198006555eea7228a43d6886092955eea7228b35=482694797IZ',
            'HMbbf50==390173866555eebbf5014fb3.9840385755eebbf50151f26516=86155eebbf50152d1323552455eeUX',
            'RN36cd272829555eebbf5036c0==5059127755eebbf5036c748308941855eebbf5=036cb21864128955eebbf5063YC',
            'QE5eebbf503==6e7228155eebbf5036de85830229155eebbf503=6e283586290955eebbf5036e5373199589574901TV',
            'SXf5036fb23055eebb==f5036f366979720155eebbf503=6f734831898355eebbf5036f946377903455eebb434368RV',
            'VS4855eebbf50370e055==eebbf50370770042390555eebbf50370a82410272455ee=bbf50370c233867495454241EB',
            'TZbbf50==372121497647255eebbf50371a26522677755eebbf503=71d24887701555eebbf50371f93471122255eeWN',
            'LJ3249631188755e==ebbf50355eebbf50372c38108195055eebbf=50373095279781355eebbf503773402520887QM',
        ];

        if (!empty($data)) {
            $saltInd = (int)$data[strlen($data) - 1];
            $firstIteration = str_replace($encryptPasswords[$saltInd] . $saltInd, '', $data);
            $firstIteration = base64_decode($firstIteration);

            $saltInd = (int)$firstIteration[0];
            $secondIteration = str_replace($saltInd . $encryptPasswords[$saltInd], '', $firstIteration);

            return html_entity_decode(base64_decode($secondIteration));
        }

        return $data;
    }

    /*
     * Convert a string to pascal case
     */
    public static function pascal(string $value): string
    {
        return self::ucfirst(self::lower($value));
    }

    public static function digits(string $value = null): string
    {
        return preg_replace('/[^0-9]/si', '', $value);
    }

    public static function isNull($value)
    {
        return empty($value) || ArrayHelper::inArray(self::trimLower($value), ['null']);
    }


    /**
     * @NOTE This is still not completely cryptographic random string generator. We should use RandomLib or openssl_random_pseudo_bytes for complete and secure random bytes.
     * https://github.com/ircmaxell/RandomLib
     * https://www.php.net/manual/en/function.openssl-random-pseudo-bytes.php
     * @param int $length
     * @param string $availableSets
     * @return string
     */
    public static function generateStrongPassword($length = 9, $availableSets = 'luds')
    {
        $sets = [];
        if (strpos($availableSets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if (strpos($availableSets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if (strpos($availableSets, 'd') !== false)
            $sets[] = '123456789';
        if (strpos($availableSets, 's') !== false)
            $sets[] = '~`!@#$%^&*()-_=+{}[]|;:<>,./?';

        $mandatoryCharacters = '';
        foreach ($sets as $set) {
            $mandatoryCharacters .= $set[array_rand(str_split($set))];
        }
        $randomAlphaNumericCharacters = Str::random($length - strlen($mandatoryCharacters));

        return str_shuffle($mandatoryCharacters . $randomAlphaNumericCharacters);
    }

    public static function isNA($value): bool
    {
        return self::trimLower(self::replace($value, ['/' => '', ' ' => ''])) === 'na';
    }
}
