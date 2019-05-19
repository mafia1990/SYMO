 function sendmsg(userid) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    var msg=$( "#msg-"+userid ).val();
    $.ajax({
        /* the route pointing to the post function */
        url: "/",
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

}

 function chat_user(id){
     userid=id;
     $("#chat-log-"+id).html("");
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
                     if(data[i].type=="designer"){

                         $("#chat-log-"+id).append(   "  \
                         <li class=\"left clearfix\">\
                        <span class=\"chat-img pull-left\">\
                        <img src=\"http://placehold.it/50/55C1E7/fff\" alt=\"User Avatar\" class=\"img-circle\" />\
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

                         $("#chat-log-"+id).append(   "  \
                         <li class=\"right clearfix\">\
                        <span class=\"chat-img pull-right\">\
                        <img src=\"http://placehold.it/50/55C1E7/fff\" alt=\"User Avatar\" class=\"img-circle\" />\
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