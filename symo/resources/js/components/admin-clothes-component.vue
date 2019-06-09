<template>
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-user fa-fw"></i>Clothes properties
            <div class="pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        Actions
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">

                        <li><a href="./clothes/create">Add cloth</a>    </li>

                        <li><a href="javascript:void();" @click="delete_clothes">Delete Clothes</a></li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover direction" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Cloth ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr  v-for="cloth in clothes"  v-bind:class="'odd grade'+ data['xc']"  :id="'cloth-'+cloth['id']"> <!-- gradeC -->
                        <td>

                            <input type="checkbox" :value="cloth['id']"/>
                            {{cloth['id']}}

                        </td>
                        <td>{{cloth['title']}} </td>
                    <td>  {{cloth.category['name'] }}</td>
                        <td class="text-center" >
                            <img  class=" img-circle" width="50px" height="50px" v-if="cloth.images.length>0" :src="cloth.images[0].path" />
                            <img  class=" img-circle" width="50px" height="50px" v-else  />
                        </td>

                        <td class="text-center">
                            <button @click="delete_cloth(cloth['id'])" type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>

                            </button>
                            <a :href="'clothes/'+cloth['id']+'/edit'"><button  type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i>
                            </button></a>

                            <button @click="verify_user(cloth['id'])" type="button" v-if="cloth['status']==2"
                                    class="btn btn-success  btn-circle"><i class="fa fa-check"></i>
                            </button>
                            <button @click="verify_user(cloth['id'])" type="button" v-else
                                    class="btn btn-default  btn-circle"><i class="fa fa-check"></i>
                            </button>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!--End Advanced Tables -->
</template>

<script>
    export default {
        name: "admin-clothes-component",
        props:['data'],

        data() {
            return {
                clothes: this.data['clothes'],

            }
        },
        methods: {
            delete_clothes: function () {
                var selected = [];
                $('input:checked').each(function (e) {

                    var id = $(this).attr('value');
                    axios.delete('/admin/clothes/' + id).then(res => {
                        $("#cloth-" + id).remove();
                    }).catch(err => {
                        console.error(err);
                    })
                });

            }
        },
        beforeMount() {

        }

    }
</script>

<style scoped>

</style>