var url = $('#base_url').val();



 //$(document).ready(function(){

 	// function sliderdata(){
 	// 	$.ajax({
 	// 		'method':'POST',
 	// 		'url': url+'admin/slider/sliderdatas',
 	// 		dataType:"json",
 	// 		success:function(res){
 	// 			console.log(res);
 	// 		}
 		
 	// 	})
// }
 	

sliderdata();
history();
gallery();
services();
testimonial();
eventDatatable();
players();
fixtire();
aboutus();
clientsDatatable();
country_pageDatatable();
immigrationDatatable();
languageDatatable();


function languageDatatable(){
    var i="1";
        $('#languageDatatable').DataTable({
            'destroy': true,
            'processing': true,
            'serverSide': true,
            "order": [[ 0, "desc" ]],
            'serverMethod': 'post',
            'ajax': {
                'url':url+'admin/test_preparation/preparationdataa',
                // success:function(data){
                //  console.log(data);
                // },error:function(data){
                //  console.log(data);
                // }
            },

            'columns': [
            { data: 'id' },
            { data: 'title' },
            { data: 'language' },
            { data: 'short_description' },
            { data: 'path' },
            { data: 'action' }
        ],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
        });
}


function immigrationDatatable(){
    var i="1";
        $('#immigrationDatatable').DataTable({
            'destroy': true,
            'processing': true,
            'serverSide': true,
            "order": [[ 0, "desc" ]],
            'serverMethod': 'post',
            'ajax': {
                'url':url+'admin/immigration/immigrationdataa',
                // success:function(data){
                //  console.log(data);
                // },error:function(data){
                //  console.log(data);
                // }
            },

            'columns': [
            { data: 'id' },
            { data: 'title' },
            { data: 'short_description' },
            { data: 'path' },
            { data: 'action' }
        ],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
        });
}

function country_pageDatatable(){
    var i="1";
        $('#country_pageDatatable').DataTable({
            'destroy': true,
            'processing': true,
            'serverSide': true,
            "order": [[ 0, "desc" ]],
            'serverMethod': 'post',
            'ajax': {
                'url':url+'admin/country/list',
                // success:function(data){
                //  console.log(data);
                // },error:function(data){
                //  console.log(data);
                // }
            },

            'columns': [
            { data: 'country_page_id' },
            { data: 'title' },
            { data: 'category' },
            { data: 'main' },
            { data: 'path' },
            { data: 'action' }
        ],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
        });
}




function clientsDatatable(){
    var i="1";
        $('#clientsDatatable').DataTable({
            'destroy': true,
            'processing': true,
            'serverSide': true,
            "order": [[ 0, "desc" ]],
            'serverMethod': 'post',
            'ajax': {
                'url':url+'admin/clients/clientsdatas',
                // success:function(data){
                //  console.log(data);
                // },error:function(data){
                //  console.log(data);
                // }
            },

            'columns': [
            { data: 'id' },
            { data: 'path' },
            { data: 'action' }
        ],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
        });
}



function aboutus(){
    var i="1";
        $('#aboutusDatatable').DataTable({
            'destroy': true,
            'processing': true,
            'serverSide': true,
            "order": [[ 0, "desc" ]],
            'serverMethod': 'post',
            'ajax': {
                'url':url+'admin/aboutus/aboutusdatas',
                // success:function(data){
                //  console.log(data);
                // },error:function(data){
                //  console.log(data);
                // }
            },

            'columns': [
            { data: 'id' },
            { data: 'title' },
            { data: 'description' },
            { data: 'path' },
            { data: 'action' }
        ],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
        });
}



function fixtire(){
	var i="1";
	   	$('#fixtureDatatable').DataTable({
	   	  'processing': true,
          'serverSide': true,
           stateSave: true,
           "bDestroy": true,
           'responsive':true,
           "order": [[ 0, "desc" ]],
           'serverMethod': 'post',
	      	'ajax': {
	          	'url':url+'admin/fixture/fixturedatas',
	          	 "type": "POST",
	      	},
	      	'columns': [
	      	{ data: 'id' },
		    { data: 'team_one' },
		    { data: 'team_one_score' },
		    { data: 'team_two' },
		    { data: 'team_two_score' },
		    { data: 'date' },
		    { data: 'status' },
		    { data: 'action' }
		],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
	   	});
}


function players(){
	var i="1";
	   	$('#playersDatatable').DataTable({
	   	   'processing': true,
           'serverSide': true,
            stateSave: true,
           "bDestroy": true,
           'responsive':true,
           "order": [[ 0, "desc" ]],
           'serverMethod': 'post',
	      	'ajax': {
	          	'url':url+'admin/players/playersdatas',
	          	 "type": "POST",
	      	},
	      	'columns': [
	      	{ data: 'name' },
		    { data: 'name' },
		    { data: 'email' },
		    { data: 'contactnumber' },
		    { data: 'clubName' },
		    { data: 'address' },
		    { data: 'ptofile' },
		    { data: 'selected_payers' },
		    { data: 'action' }
		],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
	   	});
}


function eventDatatable(){
	var i="1";
	   	$('#eventDatatable').DataTable({
	   		'destroy': true,
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'ajax': {
	          	'url':url+'admin/events/eventsdatas',
	          	// success:function(data){
	          	// 	console.log(data);
	          	// },error:function(data){
	          	// 	console.log(data);
	          	// }
	      	},

	      	'columns': [
             { data: 'title' },
    		 { data: 'title' },
    		 { data: 'author' },
    		 { data: 'description' },
    		 { data: 'path' },
    		 { data: 'action' }
		],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
	   	});
}


function testimonial(){
	var i="1";
	   	$('#testimonialDatatable').DataTable({
	   		'destroy': true,
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'ajax': {
	          	'url':url+'admin/testimonials/testimonialdatas',
	          	// success:function(data){
	          	// 	console.log(data);
	          	// },error:function(data){
	          	// 	console.log(data);
	          	// }
	      	},

	      	'columns': [
	      	{"render":function(){
	      		return i++;
	      	}},
		{ data: 'name' },
		 { data: 'author' },
		 { data: 'description' },
		 { data: 'path' },
		 { data: 'action' }
		],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                //("td:first", nRow).html(iDisplayIndex +1);
               //return nRow;
            }
	   	});
}


function history(){
	var i="1";
	   	$('#history_table').DataTable({
	   		'destroy': true,
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'ajax': {
	          	'url':url+'admin/history/historydatas',
	          	// success:function(data){
	          	// 	console.log(data);
	          	// },error:function(data){
	          	// 	console.log(data);
	          	// }
	      	},

	      	'columns': [
	      	{"render":function(){
	      		return i++;
	      	}},
		{ data: 'title' },
		 { data: 'description' },
		 { data: 'more' },
		 { data: 'action' }
		],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                //("td:first", nRow).html(iDisplayIndex +1);
               //return nRow;
            }
	   	});
}


function gallery(){
	var i="1";
	   	$('#gallery_table').DataTable({
	   		'destroy': true,
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'ajax': {
	          	'url':url+'admin/gallery/gallerydatas',
	          	// success:function(data){
	          	// 	console.log(data);
	          	// },error:function(data){
	          	// 	console.log(data);
	          	// }
	      	},

	      	'columns': [
	      	{"render":function(){
	      		return i++;
	      	}},
		{ data: 'title' },
		 { data: 'path' },
		 { data: 'action' }
		],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                //("td:first", nRow).html(iDisplayIndex +1);
               //return nRow;
            }
	   	});
}


function services(){
	var i="1";
	   	$('#servicesDatatable').DataTable({
	   		'destroy': true,
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'ajax': {
	          	'url':url+'admin/services/servicesdatas',
	          	// success:function(data){
	          	// 	console.log(data);
	          	// },error:function(data){
	          	// 	console.log(data);
	          	// }
	      	},

	      	'columns': [
	      	{"render":function(){
	      		return i++;
	      	}},
		{ data: 'title' },
		 { data: 'description' },
		 { data: 'path' },
		 { data: 'action' }
		],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                //("td:first", nRow).html(iDisplayIndex +1);
               //return nRow;
            }
	   	});
}




 function deletehistory(e){
if (confirm('Are you sure you want to delete?')) {
	var $id = $(e).attr('data-id');
    $.ajax({
    	method:'POST',
    	url:url+'admin/history/delete',
    	data:{id:$id},
    	dataType:"json",
    	success:function(res){
    		if(res.status == 200){
    			swal(res.msg);
    			history();
    		}else{
    			
    		}
    	},error:function(res){
    	}
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}

function deletefixture(e){
    if (confirm('Are you sure you want to delete?')) {
	var $id = $(e).attr('data-id');
    $.ajax({
    	method:'POST',
    	url:url+'admin/fixture/delete',
    	data:{id:$id},
    	dataType:"json",
    	success:function(res){
    		if(res.status == 200){
    			swal(res.msg);
    			history();
    		}else{
    			
    		}
    	},error:function(res){
    	}
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}


 function deletetestimonials(e){
if (confirm('Are you sure you want to delete?')) {
	var $id = $(e).attr('data-id');
    $.ajax({
    	method:'POST',
    	url:url+'admin/testimonials/delete',
    	data:{id:$id},
    	dataType:"json",
    	success:function(res){
    		if(res.status == 200){
    			swal(res.msg);
    			testimonial();
    		}else{
    			
    		}
    	},error:function(res){
    	}
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}
function deleteevents(e){
    if (confirm('Are you sure you want to delete?')) {
	var path = $(e).attr('data-path');
	var $id = $(e).attr('data-id');
    $.ajax({
    	method:'POST',
    	url:url+'admin/events/delete',
    	data:{id:$id,'path':path},
    	dataType:"json",
    	success:function(res){
    		console.log(res);
    		if(res.status == 200){
    			swal(res.msg);
    			eventDatatable();
    		}else{
    			
    		}
    	},error:function(res){
    		//console.log(res);
    	}
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}
 function deletegallery(e){
if (confirm('Are you sure you want to delete?')) {
	var path = $(e).attr('data-path');
	var $id = $(e).attr('data-id');
    $.ajax({
    	method:'POST',
    	url:url+'admin/gallery/delete',
    	data:{id:$id,'path':path},
    	dataType:"json",
    	success:function(res){
    		console.log(res);
    		if(res.status == 200){
    			swal(res.msg);
    			gallery();
    		}else{
    			
    		}
    	},error:function(res){
    		//console.log(res);
    	}
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}

 function deleteslider(e){
if (confirm('Are you sure you want to delete?')) {
	var path = $(e).attr('data-path');
	var $id = $(e).attr('data-id');
    $.ajax({
    	method:'POST',
    	url:url+'admin/slider/delete',
    	data:{id:$id,'path':path},
    	dataType:"json",
    	success:function(res){
    		if(res.status == 200){
    			sliderdata();

    		}else{
    			
    		}
    	}
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}

function deleteabouus(e){
    if (confirm('Are you sure you want to delete?')) {
    var path = $(e).attr('data-path');
    var $id = $(e).attr('data-id');
    $.ajax({
        method:'POST',
        url:url+'admin/aboutus/delete',
        data:{id:$id,'path':path},
        dataType:"json",
        success:function(res){
            if(res.status == 200){
                swal(res.msg);
                aboutus();

            }else{
                
            }
        }
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}

function deleteservices(e){
	if (confirm('Are you sure you want to delete?')) {
	var path = $(e).attr('data-path');
	var $id = $(e).attr('data-id');
    $.ajax({
    	method:'POST',
    	url:url+'admin/services/delete',
    	data:{id:$id,'path':path},
    	dataType:"json",
    	success:function(res){
    		if(res.status == 200){
    			swal(res.msg);
    			services();

    		}else{
    			
    		}
    	}
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}

function deleteStudy(e){
    if (confirm('Are you sure you want to delete?')) {
    var path = $(e).attr('data-path');
    var $id = $(e).attr('data-id');
    $.ajax({
        method:'POST',
        url:url+'admin/country/delete',
        data:{id:$id,'path':path},
        dataType:"json",
        success:function(res){
            if(res.status == 200){
                swal(res.msg);
                country_pageDatatable();

            }else{
                
            }
        }
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}



 function sliderdata(){
 	// $(document).ready(function(){
var i="1";
	   	$('#sliderDatatable').DataTable({
	   		'destroy': true,
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'ajax': {
	          	'url':url+'admin/slider/sliderdatas',
	          	// success:function(data){
	          	// 	console.log(data);
	          	// },error:function(data){
	          	// 	console.log(data);
	          	// }
	      	},

	      	'columns': [
	      	{"render":function(){
	      		return i++;
	      	}},
		{ data: 'title' },
		 { data: 'description' },
		 { data: 'path' },
		 { data: 'action' }
		],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                //("td:first", nRow).html(iDisplayIndex +1);
               //return nRow;
            }
	   	});
	//});
}



 function deleteplayers(e){
if (confirm('Are you sure you want to delete?')) {
	var $id = $(e).attr('data-id');
    $.ajax({
    	method:'POST',
    	url:url+'admin/players/delete',
    	data:{id:$id},
    	dataType:"json",
    	success:function(res){
    		if(res.status == 200){
    			swal(res.msg);
    			players();
    		}else{
    			
    		}
    	},error:function(res){
    	}
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}

function accountVerify(e){
  if(confirm('are you sure')){
      
       $.ajax({
    	method:'POST',
    	url:url+'admin/players/accountverified',
    	data:{id:e},
    	dataType:"json",
    	success:function(res){
    		if(res.status == 200){
    		    swal(res.msg);
    		    setTimeout(function(){
    		        	
    		        players();
    		    },2000)
    		    
    		}else{
    			
    		}
    	}
    })
    
  }
}

function accountRejected(e){
  if(confirm('are you sure')){
      
       $.ajax({
    	method:'POST',
    	url:url+'admin/players/accountrejected',
    	data:{id:e},
    	dataType:"json",
    	success:function(res){
    		if(res.status == 200){
    		    
    		    swal(res.msg);
    		    setTimeout(function(){
    		        	
    		        players();
    		    },2000)
    		    
    		}else{
    			
    		}
    	}
    })
    
  }
}

function deletecountryabroad(e){
    if (confirm('Are you sure you want to delete?')) {
        var path = $(e).attr('data-path');
        var $id  = $(e).attr('data-id');
        $.ajax({
            method:'POST',
            url:url+'admin/delete/page',
            data:{id:$id,'path':path,'folder':'country','table':'country_page','tblId':'country_page_id'},
            dataType:"json",
            success:function(res){
                if(res.status == 200){
                    swal(res.msg);
                    country_pageDatatable();
                }else{
                    swal("Cancelled", "Please try later", "error"); 
                }
            },error:function(res){
                //console.log(res);
            }
        })
    } else {
        alert('Why did you press cancel? You should have confirmed');
    }

}



function deleteimmigration(e){
    if (confirm('Are you sure you want to delete?')) {
    var path = $(e).attr('data-path');
    var $id = $(e).attr('data-id');
    $.ajax({
        method:'POST',
        url:url+'admin/delete/delete',
        data:{id:$id,'path':path,'table':'immigration','folder':'immigration','tblId':'id'},
        dataType:"json",
        success:function(res){
            if(res.status == 200){
                swal(res.msg);
                immigrationDatatable();

            }else{
                
            }
        }
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}

function deleteprepration(e){
    if (confirm('Are you sure you want to delete?')) {
    var path = $(e).attr('data-path');
    var $id = $(e).attr('data-id');
    $.ajax({
        method:'POST',
        url:url+'admin/delete/delete',
        data:{id:$id,'path':path,'table':'test_preparation','folder':'test_preparation','tblId':'id'},
        dataType:"json",
        success:function(res){
            if(res.status == 200){
                swal(res.msg);
                languageDatatable();

            }else{
                
            }
        }
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}

function deleteclients(e){
    if (confirm('Are you sure you want to delete?')) {
    var path = $(e).attr('data-path');
    var $id = $(e).attr('data-id');
    $.ajax({
        method:'POST',
        url:url+'admin/delete/delete',
        data:{id:$id,'path':path,'table':'clients','folder':'clients','tblId':'id'},
        dataType:"json",
        success:function(res){
            if(res.status == 200){
                swal(res.msg);
                clientsDatatable();

            }else{
                
            }
        }
    })
} else {
    alert('Why did you press cancel? You should have confirmed');
}
}

