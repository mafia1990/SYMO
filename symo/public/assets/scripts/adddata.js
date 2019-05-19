$('.add').click(function(e){

    var type=$(this).attr('data-title');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var name=$("input[name="+type+"]").val();
    var formData = new FormData();
    if(type=="category"){
        var image=$("input[name="+type+"-image]")[0].files[0];
        if(image==null){
            alert("لطفا عکسی برای این دسته بندی قرار دهید");
            return;
        }
        formData.append("category-image", image);
        $("input[name="+type+"-image]")[0].value="";
    }
    else if(type=="category_properties")
        formData.append("catid",$("[name=pcategory]").val());
    else if(type=="category_properties_data")
        formData.append("pcatid",$("[name=category_properties_data]").val());
    /* send the csrf-token and the input to the controller */

    formData.append("_token", CSRF_TOKEN);
    formData.append("cat", type);
    formData.append("op", 'add');
    formData.append("name", name);
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
       // data: {_token: CSRF_TOKEN, 'name':name,'cat':type,'op':'add','image':(image)?image:""},
        data: formData,
        dataType: 'JSON',

        success: function (data) {
            if(data['status']==200) {
                $("input[name="+type+"]").val('');

                $("#"+type).append('<option value=' + data['id'] + '>' + name + '</option>');
            } else alert(data);
        }
    });
});
$('.del').click(function(e){

    var type=$(this).attr('data-title');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var  catlist= document.getElementById(type);
    for(var i=catlist.selectedOptions.length-1;i>-1;i--){
        $.ajaxSetup({async: false});
        $.ajax({
            /* the route pointing to the post function */
            url: "",
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, 'id':catlist.selectedOptions[i].value,'cat':type,'op':'del'},
            dataType: 'JSON',
            success: function (data) {
                if(data['status']==200) {
                    catlist.remove(catlist.selectedOptions[i].index);
                } else alert(data);
            }
        });
    }

});
function changecat(e){



    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var formData = new FormData();
    /* send the csrf-token and the input to the controller */
    $("#category_properties").html("");
    formData.append("_token", CSRF_TOKEN);
    formData.append("catid", e.value);
    formData.append("op", 'changecat');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
        // data: {_token: CSRF_TOKEN, 'name':name,'cat':type,'op':'add','image':(image)?image:""},
        data: formData,
        dataType: 'JSON',

        success: function (data) {

                data.forEach(function(d){


                    data.forEach(function(d){

                        $("#category_properties").append("  <option value="+d['id']+">"+d['title']+"</option> ");

                    });


                });

        }
    });


}
function select_cat(e){



    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var formData = new FormData();
    /* send the csrf-token and the input to the controller */
    $("#select_category").html("");
    formData.append("_token", CSRF_TOKEN);
    formData.append("catid", e.value);
    formData.append("op", 'changecat');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
        data: formData,
        dataType: 'JSON',

        success: function (data) {

            data.forEach(function(d){


                $("#select_category").html("<option value=\"0\">انتخاب کنید</option>");
                data.forEach(function(d){

                    $("#select_category").append("  <option value="+d['id']+">"+d['title']+"</option> ");

                });


            });

        }
    });


}
function select_pcat(e){



    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var formData = new FormData();
    /* send the csrf-token and the input to the controller */
    $("#category_properties_data").html("");
    formData.append("_token", CSRF_TOKEN);
    formData.append("pcatid", e.value);
    formData.append("op", 'changepcat');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
        // data: {_token: CSRF_TOKEN, 'name':name,'cat':type,'op':'add','image':(image)?image:""},
        data: formData,
        dataType: 'JSON',

        success: function (data) {

            data.forEach(function(d){



                data.forEach(function(d){

                    $("#category_properties_data").append("  <option value="+d['id']+">"+d['name']+"</option> ");

                });


            });

        }
    });


}
