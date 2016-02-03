<?php
	//force_match("abcdeeacefedc","edc");
	//phpInfo()
	$array = array();
	$array[] = 3;
	$array[] = 2;
	$array[] = 6;
	$array[] = 7;
	$array[] = 4;
	$array[] = 1;
	$array[] = 9;
	$array[] = 5;
	$array[] = 10;
	$array[] = 8;

	
	$array = quickOrder($array,0,9);
	var_dump($array);

	function messend(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");

		curl_setopt($ch, CURLOPT_HTTP_VERSION  , CURL_HTTP_VERSION_1_0 );
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);

		curl_setopt($ch, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD  , 'api:');

		curl_setopt($ch, CURLOPT_POST, TRUE);
		$message = '你有一个新的XXXXX';
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => "13912345678",'message' => $message));

		$res = curl_exec( $ch );
		curl_close( $ch );
		//$res  = curl_error( $ch );
		var_dump($res);
	}

	function fileOpreatTest(){
		//将数据写入文件
		$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
		$txt = "Bill Gates\r\n";
		fwrite($myfile, $txt);
		$txt = "cccc\n";
		fwrite($myfile, $txt);
		fclose($myfile);
	}

	function testjs(){
		//测试访问服务器，然后对本地文件进行操作
		echo "<script type=\"text/javascript\">var tf = fso.CreateTextFile('d:\\test.txt', true);tf.Close();</script>";
	}

	/**
	 * [force_match 暴力字符串匹配]
	 * @param  [type] $source [匹配源字符串]
	 * @param  [type] $str    [要批配的字符片段]
	 * @return [type]         [字符片段是否在源字符串中，如果在，返回第一次匹配成功后在字符串原的位置]
	 */
	function force_match($source,$str){
		$source = str_split($source);
		$str = str_split($str);
		$location = 0;

		$i = 0;
		$j = 0;
		while($i < count($source)){
			if($source[$i] == $str[$j]){
				$i++;
				$j++;
			}else{
				$i = $i - $j + 1;
				$j = 0;
			}
			if($j == count($str)){
				$location = $i - $j + 1;
				break;
			}
		}

		if($location){
			echo "the location is".$location;
		}
		else{
			echo "march error";
		}
	}

	/**
	 * [object_to_array 对象转化为数组]
	 * @param  [type] $obj [description]
	 * @return [type]      [description]
	 */
	function object_to_array($obj){ 
		$_arr = is_object($obj) ? get_object_vars($obj) : $obj; 
		foreach ($_arr as $key => $val) { 
			$val = (is_array($val) || is_object($val)) ? $this->object_to_array($val) : $val;
			$arr[$key] = $val; 
		} 
		return $arr; 
	}
	/**
	 * [_delFileUnderDir 清空某文件夹并删除该文件夹]
	 * @param  [type] $dirName [文件夹路径]
	 * @return [type]          [description]
	 */
	function _delFileUnderDir($dirName){
		if ($handle = opendir($dirName)){
			while (false !== ($item = readdir($handle))) {
				if ($item != "." && $item != "..") {
					if (is_dir($dirName."/".$item)) {
						$this -> _delFileUnderDir($dirName."/".$item);
					} else {
						unlink($dirName."/".$item);
					}
				}
			}
			closedir($handle);
			//删除当前文件夹：
			@rmdir($dirName);
		}
		
	}

	function quickOrder($array,$start,$end){
		Global $array;
		if($start<$end){
			$focus = $array[$start];
			$left = $start;
			$right = $end;
			while($left < $right){
				if($array[$right] > $focus){
					$right--;
				}else{
					$t = $array[$right];
			        for($i = $right; $i > $left; $i --){
			        	$array[$i] = $array[$i - 1];
			        }
			        $array[$left] = $t;
					$left++;
				}
			}
			quickOrder($array,$left+1,$end);
			quickOrder($array,$start,$left-1);
		}

		return $array;
		
	}

	function maopaoOrder($array){
        $b = $array;
        $len = count($b);
        for($k=1;$k<$len;$k++)
        {
            for($j=$len-1,$i=0;$i<$len-$k;$i++,$j--)
                if($b[$j]>$b[$j-1]){
                //如果是从小到大的话，只要在这里的判断改成if($b[$j]<$b[$j-1])就可以了
                $tmp=$b[$j];
                $b[$j]=$b[$j-1];
                $b[$j-1]=$tmp;
            }
        }
        return $b;
    }
    function getRandChar($length){
		$str = null;
		$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		$max = strlen($strPol)-1;

		for($i=0;$i<$length;$i++){
			$str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
		}

		return $str;
  }
	
?>