<?php

// echo "<ul>
// <li>!php execude in server return browser</li>
// <li>!what content file php => html , css ,js ,php code</li>
// <li>!encapsulation طريقة لاخفاء التفاصيل عن المستخدم</li>
// <li>!بحجز قيمة لمتغير مباشرة عند عدم اعطاء قيمة لمتغير بحط null</li>
// <li>XAMP local server</li>
// <li>PHP Version use phpinfo(</li>
// <li>In Sentive echo = ECHO غير حساسة لحالة الاحرف</li>
// <li></li>
// <li>Data Type => boolean + integer + float + string + array</li>
// <li>variable not define type befor variabile => \$a=5 , \$b=>[''=>'']</li>
// <li>CAsting convert value =>echo (int) (10+(int)1.2)</li>
// <li>return False => [] , \"\" , [0]</li>
// <li>Escaping =>\</li>
// <li>nl2br =>new line tow Br tags =>echo nl2br('1-php
//                                                2-js
//                                                3java</li>
// <li>opertor == != === or and not xor</li>
// <li>page in web static dynmic</li>
// <li>Declare variable =>\$age=25</li>
// <li>reDeclare variable =>\$age=30 =>اعادة تعريف القيمة</li>
// <li>Constant => const Title=\"Store\" => قيمة ثابتة على مستوى التطبيق</li>
// <li>Magic Constant __LINE__ == __line__ // __dir__</li>
// <li>echo \"<br> line/\".__LINE__. \"<br> file/ \".__file__.\"<br> dir/ \".__dir__</li>
// <li>Const =>echo PHP_VERSION => 8.2</li>
// <li>a=a+20 == a+=20</li>
// <li>Incremt a=10 $a++ //10  $++a //11</li>
// <li>Concanate . $a.\"<br>\".fun()</li>
// <li>2+4+*5 // (2+4)*5 </li>
// <li>if => block code run is true</li>
// <li></li>
// <li></li>
// <li></li>
// <li></li>

// </ul>";
// //echo phpinfo();
// //echo "<br> line/".__LINE__. "<br> file/ ".__file__."<br> dir/ ".__dir__;
// echo PHP_VERSION;

// $a=10;
// $a=$a++;//10
// $a=++$a;//11
// echo$a;//11

use Flasher\Laravel\Support\Laravel;

//const
//  const LARAVEL = 10;
//  const LARAVEL = 15;//error
//  echo $LARAVEL;

//variable
// $name='ali';//declare
// $name='ahmad';//redeclare
// $age=&$name;//refernce varaiable
// echo $name.$age;

//casting
// $a=(int)10.2; //casting
// echo $a;

//increment
// $a=1;
// echo 'a= '.$a.'<br>a++='.$a++.'<br>a='.$a;//1,1,2


//check
// is_float()
// is_double()
// is_int()
// if(is_int(15)){
//     echo 'yes';
// }

//math
$arr=[1,2,3];
echo 'min='.min($arr).'max='.max($arr);

echo(round(0.60));  // returns 1
echo(rand());
