var userid;
function delete_cloth(id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 'clothid':id,'op':'del'},
        dataType: 'JSON',
        success: function (data) {
            if(data['status']==200)
                $( "#user-"+id ).remove();
            else alert(data);
        }
    });

}

function verify_cloth(e,id){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var status=(e.classList.value.split(' ').indexOf("btn-default")==-1)?0:1;
    $.ajax({
        /* the route pointing to the post function */
        url: '',
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN,'clothid':id,'op':'verify','status':status},
        dataType: 'JSON',
        success: function (data) {
            if(data['status']==200){
                if(status) {
                    e.classList.remove("btn-default");
                    e.classList.add("btn-success");
                }else  {
                    e.classList.remove("btn-success");
                    e.classList.add("btn-default");
                }
            }
            else alert(data);
        }
    });








}
function  delete_clothes() {
    var selected = [];
    $('input:checked').each(function() {

   var id=$(this).attr('value');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 'clothid':id,'op':'del'},
        dataType: 'JSON',
        success: function (data) {
            if(data['status']==200)
                $( "#cloth-"+id ).remove();
            else alert(data);
        }
    });
    });
}
