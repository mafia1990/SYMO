<template>
    <div class="panel panel-default">
        <div class="panel-heading   " style="display:  flow-root;">
            <span class="float-left">users profile</span>
            <span style="float: right;"> <a href="customers/create">
            <button type="button" class="btn btn-primary  ">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </span>

        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Platform(s)</th>
                        <th>image</th>
                        <th>opration</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="user in customers " v-bind:class="'odd grade'+ xc"> <!-- gradeC -->
                        <td>{{user['name']}}</td>
                        <td>{{user['email']}}</td>
                        <td> {{user['phone']}}</td>
                        <td>{{user['platform']}}</td>
                        <td class="text-center">
                            <img v-if="user['avatar']==''"  width="50" class=" img-circle" src="/images/users/user.jpg"/>
                            <img v-else class=" img-circle" width="50" :src="user['avatar']"/>
                        </td>
                        <td class="text-center">
                            <button @click="delete_user(user['id'])" type="button" class="btn btn-danger btn-circle"><i
                                    class="fa fa-times"></i>

                            </button>
                            <a :href="'customers/'+user['id']+'/edit'">
                                <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i>
                                </button>
                            </a>
                            <button @click="verify_user(user['id'])" type="button" v-if="user['status']==2"
                                    class="btn btn-success  btn-circle"><i class="fa fa-check"></i>
                            </button>
                            <button @click="verify_user(user['id'])" type="button" v-else
                                    class="btn btn-default  btn-circle"><i class="fa fa-check"></i>
                            </button>
                        </td>

                    </tr>


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</template>

<script>
    export default {

        props: ['data'],

        data() {
            return {
                customers: this.data['customers'],
                xc: this.data['xc'],

            }
        },
        methods: {
            delete_user: function (id) {
                var e = event;


                axios.post('/admin/customers/' + id, {
                    '_method': 'DELETE',
                    'id': id
                        }).then(res => {
                    for(var i=0;i<4;i++){
                        if(e.path[i].tagName=="TR")
                        {
                            e.path[i].remove();
                               break;

                        }
                    }
                }).catch(err => {
                    console.log(err);

                });

            },
            verify_user: function (id) {
                var e = event;
                axios.post('/admin/customers/' + id, {
                    '_method': 'PATCH',
                    'id': id,
                    'statusChange': "true"

                }).then(res => {
                    if (e.path[0].classList.contains("btn") && e.path[0].classList.contains("btn-success")) {
                        e.path[0].classList.remove("btn-success");
                        e.path[0].classList.add("btn-default");
                    } else if (e.path[0].classList.contains("btn")) {
                        e.path[0].classList.add("btn-success");
                        e.path[0].classList.remove("btn-default");
                    }
                    if (e.path[1].classList.contains("btn-success")) {
                        e.path[1].classList.remove("btn-success");
                        e.path[1].classList.add("btn-default");
                    } else {
                        e.path[1].classList.add("btn-success");
                        e.path[1].classList.remove("btn-default");
                    }

                }).catch(err => {
                    console.log(err);

                });

            }

        }
    }
</script>
