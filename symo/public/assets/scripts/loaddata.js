function loaddata(cat,catid){
    $('#loaddata').html("");
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 'cat':cat,'load':'load'},
        dataType: 'JSON',
        success: function (data) {
           // if(data['status']==200)
                $('#loaddata').load('/set?catid='+catid);

            // else alert(data);
        },
        error: function (textStatus, errorThrown) {
            alert(errorThrown);
            alert(json.stringify( textStatus));
        }
    });



}
function loaddatacloth(e){
    $('#load_cloth_properties').html("");

    $('#load_cloth_properties').load('/addcloth?catid='+e.value);






}
function refresh_page(){

    var formData =new  FormData( document.getElementById('form_data'));
    $("#dataTables").html("");
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
            $("#dataTables").html("");
            data.forEach(function(d){

                $("#dataTables").append(" <div class=\"col-lg-4\">\n" +
        " <img data-dismiss=\"modal\" onclick=\"addcloth("+d['id']+","+d['catid']+",'"+d['url']+"')\" src=\"images/clothes/"+d['url']+"\">\n" +
                    "                            </div>");

            });

        },
        error: function (textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}
function addcloth(clothid,catid,image_name) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 'id':clothid,'catid':catid,'image_name':image_name,'addcloth':'addcloth'},
        dataType: 'JSON',
        success: function (data) {
            $("#cat_"+catid).append("<button id='cloth_"+clothid+"' type=\"button\" class=\"btn btn-default \" onclick='delcloth(\""+clothid+"\")' ><i class=\"fa fa-minus\"></i>" +
                "<img   style='padding: 10px;'  width=\"50\" src=\"/images/clothes/"+image_name+"\">" +
                "</button>");

        },
        error: function (textStatus, errorThrown) {
            alert(errorThrown);

        }
    });
}
function delcloth(clothid) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 'id':clothid,'delcloth':'delcloth'},
        dataType: 'JSON',
        success: function (data) {
            $("#cloth_"+clothid).remove();

        },
        error: function (textStatus, errorThrown) {
            alert(errorThrown);

        }
    });
}