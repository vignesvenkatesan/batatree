// Tree Management activity Document
var hostname = "localhost/bata2/";

function divDisplay(elementid){
	$(elementid).removeClass("div_disable");
	$(elementid).addClass("div_enable");
}

//function to hidden the display div or element
function divNoDisplay(elementid){
	$(elementid).addClass("div_disable");
	$(elementid).removeClass("div_enable");
}
//GEneric ajax call update.
	//url value should be get after "index.php/"
	//listboxid - should be id of the select/listbox
	function getListBoxUpdate(listboxid,parturl){
		$(listboxid+' option').remove();
		$(listboxid).append($('<option/>',{value:"",text:"---None---"}));

		$.ajax({url: "http://"+hostname+"index.php/"+parturl, success: function(result){
		var arrBuilder = jQuery.parseJSON(result);
		$.each(arrBuilder, function (index, value) {
				$(listboxid).append($('<option/>', { 
					value: value.tree_id,
					text :  value.tree_label
				}));
			}); 
		}});
	}

function webService_request(parturl){
	$.ajax({type:'POST', url: "http://"+hostname+"index.php/"+parturl, data: $("#add_child").serialize(), success: function(result){
		if(result == "Added Node"){
			$("#node_name").val("");
			divNoDisplay("#adderror");
			$(location).attr('href','http://'+hostname+'index.php/tree/');
		}else{
			divDisplay("#adderror");
		}
	}});
}

$(document).ready( function() {
	getListBoxUpdate('#tree_parentnode','tree_webservice/tree');

	$("#node_add").click(function(){ webService_request('tree_webservice/addtree');
		return false;
	});
	divNoDisplay("#adderror");
});