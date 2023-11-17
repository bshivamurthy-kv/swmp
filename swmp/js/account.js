$(document).ready(function() {
  	
	$("form").each(function() {
    
		$( this ).validate({
		meta : "validate",
		errorPlacement: function(error, element) {
            if (element.attr("name") == "sub_door_name") {
                error.insertAfter("#formsub_door");
            }
            
            else
            {
                error.insertAfter(element);
            }
        }
			
			
	
  });	
	 });
	
	var default_value = "LR Number";


	/*$( "#LRcopy" ).focusin(function() {
	    $(this).removeAttr("value");
	});

	$( "#LRcopy" ).focusout(function() {
	    $(this).attr("value",plcehldr);
	});*/
	
	
	$("#LRcopy").on('change paste', function(){
		
		if(default_value == $(this).val()){
			$(this).val('');
			}
			else if($(this).val() == ""){
				$(this).val(default_value);
				
			}
	});
}); 



function fetchAll(table,selectedid,_this,getselect)
{
/*	console.log(table);
	console.log(id);
	console.log(selectedid);
	console.log(_this);*/
	var getid= $(_this).attr('id');
	$(".se-pre-con").show("slow");
	var getselectedvalue = $('#'+getid+' option:selected').val().split("|");
	
	url = 'include/fetchAll.php?table=' + table+"&selected_col="+selectedid+"&selectedid="+getselectedvalue[0]+"&pagename=getshops";
	$.ajax({
        'async': false,
        'global': false,
        'url': url,
        'success': function (data) {
        	if(data != ''){
        		$('#'+getselect).html(data);
        		$(".se-pre-con").hide("slow");
        	}

        },
        'error': function () {
            
        }
    });


}
function updateLRnumber(_this,changedval)
{

	
	console.log("_this==",$(_this).attr('stock_id'));
	var lrvalue= $(_this).val();
	var getid= $(_this).attr('id');
	var  pagename='LRNumber';
	if($(_this).attr('type') == 'checkbox')
		{
			getid= $(_this).attr('orderid');
			if(getid!=undefined)
			{
				if($(_this).is(':checked'))
				{
				 lrvalue= 'In-Process';
				} else lrvalue= 'Pending';
			} else
			{
				getid= $(_this).attr('stock_id');
				  pagename='Stockupdate';
				if($(_this).is(':checked'))
				{
				 lrvalue= 'Out Stock';
				} else lrvalue= 'In Stock';
			}
			
		}
	$(".se-pre-con").show();
	
	
	//UPDATE `tbl_orders` SET `status` = 'Pending'
	
	
	
	
	url = 'include/fetchAll.php?id=' + getid+"&lrvalue="+lrvalue+"&changedval="+changedval+"&pagename="+pagename;
	$.ajax({
        'async': false,
        'global': false,
        'url': url,
        'success': function (data) {
        	$(".se-pre-con").hide();
        	$(_this).parent().addClass('checkbox-green');
        	$(_this).addClass('disabled');
        	/*if(data != ''){
        		$('#'+getselect).html(data);
        	}*/

        },
        'error': function () {
            
        }
    });


}

function submitForm(changepage)
{
	
	$('#pagename').val(changepage);
	
	$('#myfrm').submit();
	/*$('#myfrm').ajaxSubmit({
        beforeSubmit: showRequest,
        success: processJson
    });*/
    return false;
	
}

function processJson(data) {
    //debugger;
    alert("it worked" + data);
    console.log("respose: " + data);
}
function showRequest(formData, jqForm, options) {
    //debugger;
    var queryString = $.param(formData);
    console.log('About to submit: \n' + queryString + '\n');
    return true;
}

function clearText(field){
	if(field.defaultValue == field.value){
	field.value = "";
	}
	else if(field.value == ""){
	field.value = field.defaultValue;
	}
	}

	function updateqty(_this,changedval,val)
	{
	
		
		console.log("_this111==",$(_this).attr('stock_id'));
		var lrvalue= val;
		var getid= $(_this).attr('stock_id');
		var  pagename='updateqty';
		
					
				
		$(".se-pre-con").show();
		
		
		//UPDATE `tbl_orders` SET `status` = 'Pending'
		
		
		
		
		url = 'include/fetchAll.php?id=' + getid+"&lrvalue="+lrvalue+"&changedval="+changedval+"&pagename="+pagename;
		$.ajax({
			'async': false,
			'global': false,
			'url': url,
			'success': function (data) {
				$(".se-pre-con").hide();
				$(_this).html(data);
				/*if(data != ''){
					
				}*/
	
			},
			'error': function () {
				
			}
		});
	
	
	}