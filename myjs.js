/**
 * [getDateStr 实现日期加减天数]
 * @param  {[type]} AddDayCount [日期加减天数，可以为正数，也可以为负数]
 * @return {[type]}             [返回处理完之后的日期，为“2015-10-12”格式]
 */
function getDateStr(AddDayCount) {
	var dd = new Date(); 
	dd.setDate(dd.getDate()+AddDayCount);//获取AddDayCount天后的日期 
	var y = dd.getFullYear();
	var m = dd.getMonth()+1;//获取当前月份的日期 
	var d = dd.getDate(); 
	return y+"-"+m+"-"+d; 
}
/**
 * [checkAll 复选框全选]
 * @param  {[type]} checkName [复选框name]
 * @return {[type]}           [description]
 */
function checkAll(checkName){ 
	var checkname = checkName;
	if($("input[name='"+checkname+"']:checked").length == 0){
		$("input[name='"+checkname+"']").each(function(){this.checked=true;}); 
	}else{ 
		$("input[name='"+checkname+"']").each(function(){this.checked=false;}); 
	} 
}

/**
* checkbox 的全选逻辑
*/
var $checkAll = $('input[check-all]');
var $allCheckbox = $('#data-table input[data-id]');
$checkAll.on('change',function(){
	var checked = $(this).prop('checked');
	$allCheckbox.prop('checked' ,checked )
});
$allCheckbox.on('change' , function(){
	var isallChecked = true;
	$allCheckbox.each(function(index,ele){
		if( false === $(ele).prop('checked')){
			isallChecked = false;
			return false;
		}
	});
	$checkAll.prop('checked' , isallChecked);
});
