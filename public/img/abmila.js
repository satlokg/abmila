
function archiveFunction(id,type) {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "Your data is lost permanent.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, archive it!",
  cancelButtonText: "No, cancel please!",
  closeOnConfirm: true,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    $.ajax({
          url: 'ajax/delete/'+id+'/'+type, //this is your uri
          type: "GET", //this is your method
          dataType: 'json',
          success: function(response){
            swal("Done!","It was succesfully deleted!","success");
            location.reload();
          }
      });         // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your data is safe :)", "error");
  }
});
}

function populateSubCat(){
 var cat = $('#cat').find(":selected").val(); //alert(cat);
 var action = "getCategory";
          var url = SITE_URL+"/admin/ajax/"+action+"/"+cat;
         // alert(url);
          $.ajax({
                method: 'get',
                url: url,
                dataType:'html',
                success: function(response){
                 $('#scat').html(response);
                    console.log(response);
                },
                error: function(data){
                    console.log(data);
                    //alert("fail" + ' ' + this.data)
                },
            });
            //response: $.parseJSON(response)
                          // $.each(response, function(index) { console.log(response);
                          //         // $.each(response[index], function(key, value) {
                          //            var newOption = new Option(response[index].subcategory_name, response[index].id, false, false);
                          //            $('#scat').append(newOption).trigger('change');
                          //         // });
                          //     });
        }
function populateSubCatForKey(){
 var cat = $('#cat').find(":selected").val(); //alert(cat);
 var action = "getCategoryName";
          var url = SITE_URL+"/admin/ajax/"+action+"/"+cat;
         // alert(url);
          $.ajax({
                method: 'get',
                url: url,
                dataType:'html',
                success: function(response){
                 $('#scat').html(response);
                    console.log(response);
                },
                error: function(data){
                    console.log(data);
                    //alert("fail" + ' ' + this.data)
                },
            });
        }
function populateService(){
 var subcat = $('#subcat').find(":selected").val();
 var action = "getService";
          var url = SITE_URL+"/admin/ajax/"+action+"/"+subcat;
          //alert(url);
          $.ajax({
                method: 'get',
                url: url,
                dataType:'html',
                success: function(response){
                 $('#srv').html(response);
                    console.log(response);
                },
                error: function(data){
                    console.log(data);
                    //alert("fail" + ' ' + this.data)
                },
            });
           
        }
function populateServiceForKey(){
 var subcat = $('#subcat').find(":selected").val();
 var action = "getServiceName";
          var url = SITE_URL+"/admin/ajax/"+action+"/"+subcat;
          //alert(url);
          $.ajax({
                method: 'get',
                url: url,
                dataType:'html',
                success: function(response){
                 $('#srv').html(response);
                    console.log(response);
                },
                error: function(data){
                    console.log(data);
                    //alert("fail" + ' ' + this.data)
                },
            });
           
        }
function populateBrand(){
 var subcat = $('#brnd').find(":selected").val();
 var action = "getBrand";
          var url = SITE_URL+"/admin/ajax/"+action+"/"+subcat;
          //alert(url);
          $.ajax({
                method: 'get',
                url: url,
                dataType:'html',
                success: function(response){
                 $('#brd').html(response);
                    console.log(response);
                },
                error: function(data){
                    console.log(data);
                    //alert("fail" + ' ' + this.data)
                },
            });
           
        }