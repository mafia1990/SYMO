<template>
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-user fa-fw"></i> مدیریت مدل های لباس
            <div class="pull-left">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">

                        <span class="caret"></span>
                        عملیات
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="sets/create">درح ست</a>
                        <li><a href="javascript:void();" @click="delete_sets()">حدف ست ها</a></li>

                    </ul>
                </div>
            </div>
        </div>
    <div class="panel-body">

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                <thead >
                <tr>

                    <th>id</th>
                    <th>designer name</th>
                    <th>season</th>
                    <th>style</th>
                    <th>designers point </th>
                    <th>point</th>
                    <th>opration</th>
                </tr>
                </thead>
                <tbody>


                <tr  v-for="set in sets" class="odd gradeC" :id="'set-'+set['id']"> <!-- gradeC -->


                    <td>
                       {{set.id}}
                    </td>
                    <td>
                       {{set.user.name}}
                    </td>
                    <td>
                        <span v-for="season in set.seasons">
                        <span>{{season.name}}</span>
                        </span>

                    </td>
                    <td>
                         <span v-for="style in set.styles">
                        <span>{{style.name}}</span>
                        </span>

                    </td>


                    <td>
                        <span v-for="point in set.point ">
                        <span v-if="point.type==1"> {{  point.point}}</span>
                        </span>
                    </td>
                    <td class="text-center">
                   <span v-for="point in set.point ">
                        <span v-if="point.type==0"> {{  point.point}}</span>
                        </span>
                    </td>
                    <td class="text-center">
                        <button @click="delete_set(set['id'])" type="button" class="btn btn-danger btn-circle"><i
                                class="fa fa-times"></i>

                        </button>
                        <a :href="'sets/'+set['id']+'/edit'">
                            <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i>
                            </button>
                        </a>
                        <button @click="verify_user(set['id'])" type="button" v-if="set['status']==2"
                                class="btn btn-success  btn-circle"><i class="fa fa-check"></i>
                        </button>
                        <button @click="verify_user(set['id'])" type="button" v-else
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
        name: "admin-sets-component",
        props:['data'],
        data(){
            return{
                sets:this.data['sets']
            }
        },
        methods:{
            deleteset:function (setid) {
                
            }

        }
    }
</script>

