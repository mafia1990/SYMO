<template>
    <div>
        <form @change="refresh_page()" method="POST" action="" id="form_data">
            <input type="hidden" name="catid" :value="data['catid']">
            <div class="col-lg-12">
                <div class="form-group col-md-6 row">
                    <label  class="col-md-3 col-form-label text-md-right">جستجو </label>
                    <div class="col-md-9 ">
                        <input class="form-control" maxlength="50" name="title" placeholder=""/>
                    </div>
                </div>


                <div v-for="pcat in data['pcats']"  v-if="pcat.catid==data['catid']" class="form-group col-md-6 row">
                    <label  class="col-md-3 col-form-label text-md-right">{{ pcat.name }}</label>
                    <div class="col-md-9 ">
                        <select  name="pcats[]" class="form-control">
                            <option value="0">همه موارد</option>


                            <option v-for="pcat_data in data['pcats_data']"  v-if="pcat_data.catpid==pcat.id"   :value="pcat_data.id">{{pcat_data.name }}</option>

                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6 row">
                    <label  class="col-md-3 col-form-label text-md-right">رنگ</label>
                    <div class="col-md-9 ">
                        <select multiple name="colors[]" class="form-control">
                            <option selected value="0">همه موارد</option>
                            <option v-for="color in data['colors']" :style="'background: #'+color.code"
                                    :value="color.id">{{color.code }}</option>
                        </select>
                    </div>
                </div>


            </div>

        </form>
    </div>
</template>

<script>
    export default {
        props:['data'],
        name: "load-set-component",
        data(){
            return{



            }
        },
        methods:{
            refresh_page:function() {


                var formData = new FormData(document.getElementById('form_data'));
                formData.append('skip',0);
                axios.post('/api/clothes', formData).then((res) => {

                    console.log(res.data);

                        this.$emit('clicked',res.data);


                   
                }).catch(err => {
                    console.log(err);
                })
            },


        }
    }
</script>
