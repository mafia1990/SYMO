var setid;
function delete_set(id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 'id':id,'op':'del'},
        dataType: 'JSON',
        success: function (data) {
            if(data['status']==200)
                $( "#set-"+id ).remove();
            else alert(data);
        }
    });

}







}
function  delete_sets() {
    var selected = [];
    $('input:checked').each(function() {

        var id=$(this).attr('value');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            /* the route pointing to the post function */
            url: "",
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, 'setid':id,'op':'del'},
            dataType: 'JSON',
            success: function (data) {
                if(data['status']==200)
                    $( "#set-"+id ).remove();
                else alert(data);
            }
        });
    });
}
