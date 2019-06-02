<template>
    <div>
        <div class="row show-grid ">
            <form action="" method="POST">

                <div class="col-lg-12">


                    <div v-for="cat in cats" class="col-md-4">
                        <button type="button" class="btn btn-warning "
                                @click='loaddata(cat.id)' data-toggle="modal"
                                data-target="#SelectCloth"><i class="fa fa-plus"></i>

                            <img width="50" :src="'/'+cat.image">
                        </button>
                        <div :id="'cat_'+cat.id">



                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-container col-md-12 ">
                        <div class="col col-md-4">
                            <div class="col-md-12 text-center " style="border: none;">
                                <label  style="border: none;">مناسب برای فصل</label>
                            </div>

                            <div class="col-md-12 " style="border: none;">

                                <div style="max-height: 100px;overflow: auto;padding: 5px;">
                                    <i v-for="season in seasons" >
                                    <input type="checkbox" name="season[]"
                                           :value="season.id" >{{season.name}}<br/>
                                    </i>

                                </div>
                            </div>

                        </div >
                        <div class="col col-md-4">
                            <div class="col-md-12 text-center " style="border: none;">
                                <label  style="border: none;">نوع استایل</label>
                            </div>
                            <div class="col-md-12  text-left " style="border: none;">
                                <div style="max-height: 100px;overflow: auto;padding: 5px;">
                                    <i  v-for="style in styles">
                                    <input  type="checkbox" name="style[]"
                                           :value="style.id">{{ style.name }}  <br>
                                    </i>
                                </div>
                            </div>

                        </div>
                        <div class="col col-md-4">
                            <div class="col-md-12 text-center " style="border: none;">
                                <label  style="border: none;" class="">مناسب برای افراد</label>
                            </div>
                            <div class="col-md-12 text-center" style="border: none;display: inline-flex;">


                                <select name="less_years" style="width: 70px;margin: auto" class="form-control">


                                    <option v-for="i in getNumbers(1,80)" :value="i">{{i}}</option>


                                </select>
                                <span>تا</span>
                                <select name="more_years" style="width: 70px;margin: auto" class="form-control">
                                    <option v-for="i in getNumbers(1,80)" :value="i">{{i}}</option>
                                </select>


                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">

                        <div class="col-md-12  ">
                            <div class="text-center">
                                <label > امتیاز خودتان به این ست</label>
                            </div>
                            <div class="text-center">
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="10"/><label class="full"
                                                                                                    for="star5"
                                                                                                    title="Awesome - 10 stars"></label>
                                    <input type="radio" id="star4half" name="rating" value="9"/><label class="half"
                                                                                                       for="star4half"
                                                                                                       title="Pretty good - 9 stars"></label>
                                    <input type="radio" id="star4" name="rating" value="8"/><label class="full"
                                                                                                   for="star4"
                                                                                                   title="Pretty good - 8 stars"></label>
                                    <input type="radio" id="star3half" name="rating" value="7"/><label class="half"
                                                                                                       for="star3half"
                                                                                                       title="Meh -7 stars"></label>
                                    <input type="radio" id="star3" name="rating" value="6"/><label class="full"
                                                                                                   for="star3"
                                                                                                   title="Meh - 6 stars"></label>
                                    <input type="radio" id="star2half" name="rating" value="5"/><label class="half"
                                                                                                       for="star2half"
                                                                                                       title="Kinda bad - 5 stars"></label>
                                    <input type="radio" id="star2" name="rating" value="4"/><label class="full"
                                                                                                   for="star2"
                                                                                                   title="Kinda bad - 4 stars"></label>
                                    <input type="radio" id="star1half" name="rating" value="3"/><label class="half"
                                                                                                       for="star1half"
                                                                                                       title="Meh - 3 stars"></label>
                                    <input type="radio" id="star1" name="rating" value="2"/><label class="full"
                                                                                                   for="star1"
                                                                                                   title="Sucks big time - 2 star"></label>
                                    <input type="radio" id="starhalf" name="rating" value="1"/><label class="half"
                                                                                                      for="starhalf"
                                                                                                      title="Sucks big time - 1 stars"></label>
                                </fieldset>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="">

                            <input type="submit" class="btn btn-default" name="clean" value="پارک کردن همه"/>
                            <input type="submit" class="btn btn-primary" name="submit" value="درج در مجموعه"/>

                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!-- POPUP -->
        <div class="modal fade" id="SelectCloth" tabindex="-1" role="dialog" aria-labelledby="SelectClothLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="SelectClothLabel">درج لباس</h4>
                    </div>
                    <!-- filter side -->
                    <div class="modal-body">

                        <div class="panel-body" id="loaddata">
                            <load-set-component @clicked="loadcloths" :data=dataloading ></load-set-component>

                        </div>
                        <!-- filter image -->
                        <div class="modal-footer">

                            <div class="row text-center" id="dataTables">

                                <div v-for="cloth in resCloths " class="col-lg-4" v-if="showres" >

                                     <img width='200px' data-dismiss="modal" @click="addcloth(cloth.id,cloth.category_id,cloth.images[0].path)" :src="cloth.images[0].path">
                                    </div>


                            </div>
                        </div>
                        <!-- end image -->
                    </div>
                    <!-- end  side -->
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!--END POPUP -->
    </div>
</template>

<script>
    export default {
        name: "admin-create-set-component",

        props:['data'],
        data(){
            return{
                cats:this.data['cats'],
                seasons:this.data['seasons'],
                styles:this.data['styles'],
                dataloading:[],
                showres:false,
                resCloths:[]
            }
        },
        methods:{
            getNumbers:function(start,stop){
                return new Array(stop-start).fill(start).map((n,i)=>n+i);
            },
            loaddata:function (id) {
                axios.get('/fetchcat/'+id).then(res=>{
                    this.dataloading=res.data;
                }).catch(err=>{console.error(err)})

            },
            addcloth:function (clothid,catid,image_name) {
                $("#cat_"+catid).append("<button name='test' id='cloth_"+clothid+"' type=\"button\" class=\"btn btn-default \" onclick='delcloth(\""+clothid+"\")' ><i class=\"fa fa-minus\"></i>" +
                    "<img   style='padding: 10px;'  width=\"50\" src="+image_name+">" +
                     "  <input type='hidden' name='cloth[]' value='"+clothid+"'>"+
                    "</button>");
            },
            loadcloths:function (res) {
                console.log(res);
                this.showres=true;
                this.resCloths=res;
            }


        }
    }
</script>

<style scoped>

</style>