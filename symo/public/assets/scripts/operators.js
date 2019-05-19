var userid;
function delete_user(id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 'userid':id,'op':'del'},
        dataType: 'JSON',
        success: function (data) {
            if(data['status']==200)
                $( "#user-"+id ).remove();
            else alert(data);
        }
    });

}

function verify_user(e,id){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: '',
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN,'userid':id,'op':'verify'},
        dataType: 'JSON',
        success: function (data) {
            if(data['status']==200){
                if(data['data']==1) {
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
function  delete_users() {
    var selected = [];
    $('input:checked').each(function() {

   var id=$(this).attr('value');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 'userid':id,'op':'del'},
        dataType: 'JSON',
        success: function (data) {
            if(data['status']==200)
                $( "#user-"+id ).remove();
            else alert(data);
        }
    });
    });
}
function chat_user(id){
    userid=id;
    $("#chat-log").html("");
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 'userid':id,'op':'chatlog'},
        dataType: 'JSON',
        success: function (data) {
            if(data['status']==200){

                for(i=0;data[i]!=null;i++){
                    if(data[i].type=='operator'){

                        $("#chat-log").append(   "  \
                         <li class=\"left clearfix\">\
                        <span class=\"chat-img pull-left\">\
                        <img src=\""+data[i].srcAvatar +"\" width='50px' alt=\"User Avatar\" class=\"img-circle\" />\
                        </span>\
                        <div class=\"chat-body clearfix\">\
                        <div class=\"header\">\
                        <strong class=\"primary-font\">"+ data[i].src_name+"  </strong>\
                        <small class=\" text-muted\">\
                        <i class=\"fa fa-clock-o fa-fw\"></i>"+data[i].date+"\
                        </small>\
                        </div>\
                        <p>\
                        "+ data[i].msg+"\
                        </p>\
                        </div>\
                        </li>\
                           ");

                    }else{

                        $("#chat-log").append(   "  \
                         <li class=\"right clearfix\">\
                        <span class=\"chat-img pull-right\">\
                        <img src=\""+data[i].desAvatar +"\" width='50px' alt=\"User Avatar\" class=\"img-circle\" />\
                        </span>\
                        <div class=\"chat-body clearfix\">\
                        <div class=\"header\">\
                        <strong class=\"pull-right primary-font\">"+ data[i].src_name+"  </strong>\
                        <small class=\"text-muted\">\
                        <i class=\"fa fa-clock-o fa-fw\"></i>"+data[i].date+"\
                        </small>\
                        </div>\
                        <p>\
                        "+ data[i].msg+"\
                        </p>\
                        </div>\
                        </li>\
                           ");


                    }
                }

            }

           else alert(data);

        }
    });



}
$( "#btn-chat" ).click(function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var msg=$( "#btn-input" ).val();
    $.ajax({
        /* the route pointing to the post function */
        url: "",
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, 'userid':userid,'op':'addtext','msg':msg},
        dataType: 'JSON',
        success: function (data) {


            if(data['status']==200)
            {

                $( "#btn-input" ).val("");
                chat_user(userid);

            }
            else alert(data);
        }
    });

});