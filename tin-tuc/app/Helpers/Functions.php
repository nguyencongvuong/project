<?php
namespace App\Helpers;
use TaxonomyNews;
use News;

class Functions
{
	public static function ConvertString($string){
	        $a=['Á','Ả','À','Ã','Ạ','Ă','Ắ','Ằ','Ẳ','Ặ','Ẵ','Â','Ấ','Ầ','Ẩ','Ậ','Ẫ','á','à','ả','ã','ạ','ă','ằ','ẳ','ắ','ẵ','ặ','â','ầ','ẩ','ậ','ẩ','ấ','ẫ'];
	        $d=['Đ','đ'];
	        $u=['Ú','Ủ','Ù','Ũ','Ụ','Ư','Ứ','Ừ','Ự','Ữ','Ử','ú','ủ','ù','ụ','ũ','ư','ứ','ừ','ử','ự','ữ'];
	        $o=['Ơ','Ớ','Ở','Ờ','Ỡ','Ợ','ơ','ớ','ở','ờ','ỡ','ợ','Ó','Ỏ','Ò','Ọ','Õ','ó','ò','ỏ','ọ','õ','Ô','Ố','Ổ','Ồ','Ộ','ô','ộ','ồ','ố','ổ','ỗ'];
	        $e=['É','Ẻ','È','Ẹ','Ẽ','é','ẻ','è','ẹ','ẽ','Ê','Ế','Ể','Ề','Ệ','Ễ','ê','ế','ể','ề','ệ','ễ'];
	        $y=['Ý','Ỷ','Ỳ','Ỹ','Ỵ','ý','ỷ','ỳ','ỵ','ỹ'];
	        $i=['Í','Ỉ','Ì','Ị','Ĩ','í','ì','ỉ','ĩ','ị'];
	        $s=['%','"',"'",'--','---','- ',' -',' - ','/',',','%20'];
	        $space=['  ','   ',''];
	        $convert=str_replace($a,'a',$string);
	        $convert=str_replace($d,'d',$convert);
	        $convert=str_replace($o,'o',$convert);
	        $convert=str_replace($e,'e',$convert);
	        $convert=str_replace($u,'u',$convert);
	        $convert=str_replace($i,'i',$convert);
	        $convert=str_replace($y,'y',$convert);
	        $convert=str_replace($s,'-',$convert);
	        $convert=str_replace($space,' ',$convert);
	        return strtolower($convert);      
	}
}
?>