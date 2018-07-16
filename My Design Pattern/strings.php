<?php

$pattern = '/fl[oa4\]]t/';//mean string start with fl and end with t and contain o OR a OR 4 OR ] but must but \ before ] to add it 
$str = 'my flat rent is heigh';

preg_match_all($pattern,$str,$found);
// will store the value if exist in $found

var_dump ($found);//will print 1 mean true

$pattern2 = '/1[0-9]9/';//[0-9] mean 0 to 9 [a-z] [A-Z]
$str2 = '129';
echo preg_match_all($pattern2,$str2);//will print 1 mean true

$pattern3= '/9[20-77][0-9]9/';
/**
*mena have number
*start with 9 and 
*next is number from 2 to 7 OR from 0 to 9 and next is number from 0 to 9 and 
*end with 9
*Note[20-77] mean 2 or number from 0 to 7 or 7
**/
$pattern4= '/[0-9][0-9]-[a-z][A-Z]/';//mean string like 129-sQ

$pattern5= '/mosta[^abcde]a/';//^ mean not
//mean string like start with mosta and have next character not a,b,c,d,e and end with a