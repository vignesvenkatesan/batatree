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
					value: value.key,
					text :  value.val
				}));
			}); 
		}});
	}

function webService_request(parturl){
	$.ajax({url: "http://"+hostname+"index.php/"+parturl, success: function(result){
		console.log(result);
		var arrBuilder = jQuery.parseJSON(result);
		var arrNodes = [];
		var arrChildNodes = [];
		var i = 0;
		var temp = 0;

		arrChildNodes[0] = [''];

		$.each(arrBuilder, function (index, value) {
			temp = 0;
			if(value.tree_parent_id == 0){
				if(arrNodes[value.tree_parent_id] !== undefined){
					temp = arrNodes[0].length;
				}else{
					arrNodes[0] = [];	
				}
				arrNodes[0][temp] = [];
				arrNodes[0][temp]['id'] = value.tree_id;
				arrNodes[0][temp]['label'] = value.tree_label;
			}else{
				if(arrChildNodes[value.tree_parent_id] !== undefined){
					temp = arrChildNodes[value.tree_parent_id].length;
				}else{
					arrChildNodes[value.tree_parent_id] = [];	
				}
				arrChildNodes[value.tree_parent_id][temp] = [];
				arrChildNodes[value.tree_parent_id][temp]['id']= value.tree_id;
				arrChildNodes[value.tree_parent_id][temp]['label']= value.tree_label;
			}
			i++;
		});

		treenodes(arrNodes,arrChildNodes);
	}});
}

var maindiv = "#tree_views";
function treenodes(arrNodes,arrChildNodes){
	var m_level = [];

 testint = 12/arrNodes[0].length;
 $.each(arrNodes[0], function(index,value){
 	if($("#row1").length==0){
 		createRow("row1");
 	}
 	
 	clasname = "col-md-"+testint+" treediv";
 	createNode("#row1",clasname,value['label']);
 	m_level[value['id']] = 1;
 });

  var rowpos = "";
  $.each(arrChildNodes, function(index, nodearr){
  	console.log(nodearr);
  	if(nodearr !== "" && nodearr !== undefined){
  		if(m_level[index] >= 0){
  			clasname = "col-md-4 treediv";
  			newrow = m_level[index]+1;
		  	rowpos = "#row"+newrow;
			if($(rowpos).length==0){
				rowval = "row"+newrow;
				createRow(rowval);
			}

			if(nodearr.length >1){
		  		$.each(nodearr,function(ix,value){
			  		createNode(rowpos,clasname,value['label']);
			 		m_level[value['id']] = newrow;	
		  		});
		  	}else{
		  		createNode(rowpos,clasname,nodearr[0]['label']);
		 		m_level[nodearr[0]['id']] = newrow;
		  	}
  		}
  	}  	
  });


  var max = m_level.reduce(function(a, b) {
	    return Math.max(a, b);
	});

  for(i=2;i<=max;i++){
  	rowpos = "#row"+i;
  	divcounts = $(rowpos+' > div').length
	divs = 12/divcounts;
	clasname = "col-md-"+divs;
	$.each( $(rowpos), function(i, left) {
	   $('div', left).each(function() {
	   		$(this).removeClass('col-md-4');
	   		$(this).addClass(clasname);
	   });
	})
  }

	

}

function createRow(rowvalue){
	/*d = document.createElement('div');
	$(d).addClass("row")
		.attr("id",rowvalue)
	    .appendTo(maindiv);*/

	var $div = $("<div>", {id: rowvalue, class: "row"});
	$(maindiv).append($div);

	return true;
}

function createNode(parentrow,classdiv,label){
	/*d = document.createElement('div');
	$(d).addClass(classdiv)
		.html(label)
	    .appendTo(parentrow);*/
	var $div = $("<div>", {class: classdiv});
	$div.text(label);
	$(parentrow).append($div);
	console.log(parentrow+label);
}


$(document).ready( function() {
	webService_request('tree_webservice/tree');
});