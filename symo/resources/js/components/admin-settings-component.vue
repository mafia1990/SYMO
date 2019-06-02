<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="category">درج دسته بندی </label>
                        <div class="row">
                            <div class="col-lg-4">
                                <input class="form-control" type="text" name="category"/>
                            </div>
                            <div class="col-lg-8">
                                <input class="form-control" type="file" name="category-image"/>
                            </div>
                        </div>
                        <select multiple name="category_list" class="form-control" id="category">

                            <option v-for="cat in cats" :value="cat['id']">{{ cat['name'] }}</option>

                        </select>

                    </div>
                </div>
                <div class="col-lg-2">
                    <button @click="addcat" type="button" class="btn btn-warning add " data-title="category"><i
                            class="fa fa-plus"></i>
                    </button>

                    <button @click="delcat" type="button" class="btn btn-danger del " data-title="category"><i
                            class="fa fa-minus"></i>
                    </button>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="category_properties">درج مدل های خاص دسته بندی</label>
                        <div class="form-group">
                            <label> نام دسته بندی</label>
                            <select name="pcategory" id="pcategory" class="form-control" @click="changecat">
                                <option value="0">انتخاب کنید</option>

                                <option v-for="cat in cats" :value="cat['id']">{{ cat['name'] }}</option>


                            </select>
                        </div>
                        <input class="form-control" type="text" name="category_properties"/>

                        <select multiple class="form-control" id="category_properties">

                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button @click="addcat" type="button" class="btn btn-warning add" data-title="category_properties">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button @click="delcat" type="button" class="btn btn-danger del " data-title="category_properties">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>

                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="season">درج فصول </label>
                        <input class="form-control" type="text" name="season"/>

                        <select multiple class="form-control" id="season">

                            <option v-for="season in seasons" :value="season['id'] ">{{ season['name']}}</option>

                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button @click="addcat" type="button" class="btn btn-warning add " data-title="season"><i
                            class="fa fa-plus"></i>
                    </button>
                    <button @click="delcat" type="button" class="btn btn-danger del " data-title="season"><i
                            class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="col-lg-10">
                <div class="form-group">
                    <label for="category_properties">درج داده برای مدل های خاص دسته بندی</label>
                    <div class="form-group">
                        <label for="category_properties"> انتخاب دسته بندی</label>
                        <select name="category_properties" class="form-control" id="category_properties_list" @change="select_cat">
                            <option value="0">انتخاب کنید</option>
                            <option v-for="cat in cats" :value="cat['id']">{{ cat['name'] }}</option>


                        </select>
                    </div>
                    <div class="form-group">
                        <label>انتخاب مشخصه</label>
                        <select id="select_category" name="category_properties_data"  class="form-control"
                                @change="select_pcat">
                            <option value="0">انتخاب کنید</option>
                            <option v-for="pcat in pcats" :value="pcat['id']">{{ pcat['name'] }}</option>


                        </select>
                    </div>
                    <input class="form-control" type="text" name="category_properties_data"/>

                    <select multiple class="form-control" id="category_properties_data">

                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <button @click="addcat" type="button" class="btn btn-warning add" data-title="category_properties_data"><i
                        class="fa fa-plus"></i>
                </button>
                <button @click="delcat" type="button" class="btn btn-danger del " data-title="category_properties_data"><i
                        class="fa fa-minus"></i>
                </button>
            </div>
            <div class="col-lg-10">
                <div class="form-group">
                    <label for="style">درج استایل </label>
                    <input class="form-control" type="text" name="style"/>

                    <select multiple class="form-control" id="style">
                        <option v-for="style in styles" :value="style['id']">{{ style['name'] }}</option>

                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <button @click="addcat" type="button" class="btn btn-warning add " data-title="style"><i
                        class="fa fa-plus"></i>
                </button>
                <button @click="delcat" type="button" class="btn btn-danger del " data-title="style"><i
                        class="fa fa-minus"></i>
                </button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                cats: this.data['cats'],
                seasons: this.data['seasons'],
                pcats: this.data['pcats'],
                styles: this.data['styles']
            }
        },
        methods: {
            addcat: function (e) {
                if (e.target.tagName == "I")
                    e = e.path[1];
                else
                    e = event.target;
                var type = $(e).attr('data-title');
                var name = $("input[name=" + type + "]").val();
                var formData = new FormData();
                if (type == "category") {
                    var image = $("input[name=" + type + "-image]")[0].files[0];
                    if (image == null) {
                        alert("لطفا عکسی برای این دسته بندی قرار دهید");
                        return;
                    }
                    formData.append("category-image", image);
                    $("input[name=" + type + "-image]")[0].value = "";
                } else if (type == "category_properties")
                    formData.append("catid", $("[name=pcategory]").val());
                else if (type == "category_properties_data")
                    formData.append("pcatid", $("[name=category_properties_data]").val());
                /* send the csrf-token and the input to the controller */

                formData.append("cat", type);
                formData.append("op", 'add');
                formData.append("name", name);
                axios.post('/admin/settings', formData, {
                    headers: {'Content-type': 'multipart/form-data'}
                }).then(res => {

                    $("input[name=" + type + "]").val('');

                    $("#" + type).append('<option value=' + res.data.id + '>' + name + '</option>');

                }).catch(err => {
                    console.error(err);
                });

            },
            delcat: function (e) {
                if (e.target.tagName == "I")
                    e = e.path[1];
                else
                    e = event.target;
                var type = $(e).attr('data-title');
                var catlist = document.getElementById(type);
                for (var i = catlist.selectedOptions.length - 1; i > -1; i--) {
                    axios.patch('/admin/settings/' + catlist.selectedOptions[i].value, {
                        'type': type,
                        'index': catlist.selectedOptions[i].index
                    }).then(res => {

                        catlist.remove(res.data);

                    }).catch(err => console.error(err))

                }
            },
            changecat: function () {
                var formData = new FormData();
                /* send the csrf-token and the input to the controller */
                $("#category_properties").html("");
                formData.append("catid", $('#pcategory').val());
                formData.append("op", 'changecat');
                axios.post('/admin/settings', formData).then(res => {
                    res.data.forEach(function (r) {
                        $("#category_properties").append("  <option value=" + r.id + ">" + r.name + "</option> ");
                    });
                }).catch(err => {
                    console.error(err);
                });


            },
            select_cat: function () {

                var formData = new FormData();
                $("#select_category").html("");
                formData.append("catid", $('#category_properties_list').val());
                formData.append("op", 'changecat');
                axios.post("", formData).then(res => {
                    $("#select_category").html("<option value=\"0\">انتخاب کنید</option>");
                    res.data.forEach(function (d) {
                            $("#select_category").append("  <option value=" + d['id'] + ">" + d['name'] + "</option> ");
                    });
                }).catch(err => {
                    console.error(err);
                })

            },
            select_pcat: function () {


                var formData = new FormData();
                /* send the csrf-token and the input to the controller */
                $("#category_properties_data").html("");
                formData.append("pcatid",$('#select_category').val());
                formData.append("op", 'changepcat');
                axios.post('',formData).then(res=>{
                        res.data.forEach(function(d){
                                $("#category_properties_data").append("<option value="+d['id']+">"+d['name']+"</option>");
                            });
                        }).catch(err=>{console.error(err)});
            }
        }
    }
</script>

