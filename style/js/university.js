var url = $('#base_url').val();
university_pageDatatable();
course_pageDatatable()
cost_pageDatatable();

function cost_pageDatatable(){
    var id = $('#costFinder').val();;
    var i="1";
        $('#cost_pageDatatable').DataTable({
            'destroy': true,
            'processing': true,
            'serverSide': true,
            "order": [[ 0, "desc" ]],
            'serverMethod': 'post',
            'ajax': {
                'url':url+'admin/country/costedata',
                'data':{'id':id},
                // success:function(data){
                //  console.log(data);
                // },error:function(data){
                //  console.log(data);
                // }
            },

            'columns': [
            { data: 'id' },
            { data: 'type_exppense' },
            { data: 'cost' },
            { data: 'status' }
       ],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
        });
}

function university_pageDatatable(){
    var id = $('#universityFinder').val();;
    var i="1";
        $('#university_pageDatatable').DataTable({
            'destroy': true,
            'processing': true,
            'serverSide': true,
            "order": [[ 0, "desc" ]],
            'serverMethod': 'post',
            'ajax': {
                'url':url+'admin/country/universitylist',
                'data':{'id':id},
                // success:function(data){
                //  console.log(data);
                // },error:function(data){
                //  console.log(data);
                // }
            },

            'columns': [
            { data: 'id' },
            { data: 'university' },
            { data: 'path' },
            { data: 'action' }
       ],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
        });
}

function course_pageDatatable(){
    var id = $('#courseFinder').val();;
    var i="1";
        $('#course_pageDatatable').DataTable({
            'destroy': true,
            'processing': true,
            'serverSide': true,
            "order": [[ 0, "desc" ]],
            'serverMethod': 'post',
            'ajax': {
                'url':url+'admin/country/courselist',
                'data':{'id':id},
                // success:function(data){
                //  console.log(data);
                // },error:function(data){
                //  console.log(data);
                // }
            },

            'columns': [
            { data: 'course_id' },
            { data: 'course' },
            { data: 'status' }
       ],
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            }
        });
}

function editCourses(e,id){
  if(id != ''){
        $.ajax({
            method:'post',
            url   : url+'admin/country/countrycourses',
            data  : {id:id},
            dataType : 'json',
            success:function(res){
               if(res.status == 200){
                    $('#courseId').val(id);
                    $('#coursenme').val(res.data.course);
               }
            }
        })
    }
    $('#editcourses').modal('show');   
}

  $.validator.setDefaults({
    submitHandler: function (form) {

        var formData =  new FormData(document.getElementById('courseForm'));

     $('#subBtn').attr('disabled',true);
     $.ajax({
        method : $('#courseForm').attr('method'),
        url    : $('#courseForm').attr('action'),
        data   :formData,
        dataType : 'json',
        contentType: false,
        processData: false,
        success:function(res){
           if(res.status == 200){
            swal(res.msg);
            course_pageDatatable();
            $('#subBtn').attr('disabled',false);
           }else{
            $('#subBtn').attr('disabled',false);
             swal(res.msg);
           }
        }

     })
      return false;
    }
  });

$('#courseForm').validate({
    rules: {
      title: {
        required: true,
      },
     
    },
    messages: {
      email: {
        required: "Please fill out this field",
      },
      password: {
        required: "lease fill out this field",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

 function editUniversity(e,id){
    if(id != ''){
        $.ajax({
            method:'post',
            url   : url+'admin/country/countryUniversity',
            data  : {id:id},
            dataType : 'json',
            success:function(res){
               if(res.status == 200){
                    $('#universityId').val(id);
                    $('#universitynme').val(res.data.university);
                    $('#universitypath').val(res.data.path);
               }
            }
        })
    }
    $('#edituniversity').modal('show'); 

  }

   $(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {

        var formData =  new FormData(document.getElementById('universityForm'));

     $('#subBtn').attr('disabled',true);
     $.ajax({
        method : $('#universityForm').attr('method'),
        url    : $('#universityForm').attr('action'),
        data   :formData,
        dataType : 'json',
        contentType: false,
        processData: false,
        success:function(res){
           if(res.status == 200){
            swal(res.msg);
            university_pageDatatable();
            $('#subBtn').attr('disabled',false);
           }else{
            $('#subBtn').attr('disabled',false);
             swal(res.msg);
           }
        }

     })
      return false;
    }
  });
  $('#universityForm').validate({
    rules: {
      title: {
        required: true,
      },
     
    },
    messages: {
      email: {
        required: "Please fill out this field",
      },
      password: {
        required: "lease fill out this field",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});



function editCost(e,id){
  if(id != ''){
        $.ajax({
            method:'post',
            url   : url+'admin/country/countrycost',
            data  : {id:id},
            dataType : 'json',
            success:function(res){
               if(res.status == 200){
                    $('#costId').val(id);
                    $('#type_exppense').val(res.data.type_exppense);
                    $('#amtcost').val(res.data.cost);
               }
            }
        })
    }
    $('#editcourses').modal('show');   
}

$(function () {
$.validator.setDefaults({
    submitHandler: function (form) {

        var formData =  new FormData(document.getElementById('costForm'));

     $('#subBtn').attr('disabled',true);
     $.ajax({
        method : $('#costForm').attr('method'),
        url    : $('#costForm').attr('action'),
        data   :formData,
        dataType : 'json',
        contentType: false,
        processData: false,
        success:function(res){
           if(res.status == 200){
            swal(res.msg);
            cost_pageDatatable();
            $('#subBtn').attr('disabled',false);
           }else{
            $('#subBtn').attr('disabled',false);
             swal(res.msg);
           }
        }

     })
      return false;
    }
  });
});

 $('#costForm').validate({
    rules: {
      title: {
        required: true,
      },
      cost: {
        required: true,
      },
     
    },
    messages: {
      email: {
        required: "Please fill out this field",
      },
      password: {
        required: "lease fill out this field",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

function deleteuniversity(e){
    if (confirm('Are you sure you want to delete?')) {
        var path = $(e).attr('data-path');
        var $id  = $(e).attr('data-id');
        $.ajax({
            method:'POST',
            url:url+'admin/delete/delete',
            data:{id:$id,'path':path,'folder':'university','table':'university','tblId':'id'},
            dataType:"json",
            success:function(res){
                if(res.status == 200){
                    swal(res.msg);
                    university_pageDatatable();
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

function deletecourse(e){
    if (confirm('Are you sure you want to delete?')) {
        var path = $(e).attr('data-path');
        var $id  = $(e).attr('data-id');
        $.ajax({
            method:'POST',
            url:url+'admin/delete/delete',
            data:{id:$id,'path':path,'folder':'','table':'course','tblId':'course_id'},
            dataType:"json",
            success:function(res){
                if(res.status == 200){
                    swal(res.msg);
                    course_pageDatatable();
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

function deletecost(e){
    if (confirm('Are you sure you want to delete?')) {
        var path = $(e).attr('data-path');
        var $id  = $(e).attr('data-id');
        $.ajax({
            method:'POST',
            url:url+'admin/delete/delete',
            data:{id:$id,'path':path,'folder':'','table':'cost','tblId':'id'},
            dataType:"json",
            success:function(res){
                if(res.status == 200){
                    swal(res.msg);
                    cost_pageDatatable();
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

