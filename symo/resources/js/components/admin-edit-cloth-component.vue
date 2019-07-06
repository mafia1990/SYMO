<template>


    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">

                <div class="form-group">
                    <label> متن محصول </label>
                    <input class="form-control" required name="title" :value=cloth.title >

                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label> نوع لباس</label>
                    <div style="height: 35px">
                        <select @change="checkcat()" v-model="sex_selected" name="sex" class=" form-control">
                            <option  value=0>مردانه</option>
                            <option   value=1>زنانه</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>دسته بندی</label>
                    <div style="height: 35px">
                        <select name="category_id" id="categorySelect" class="form-control">
                            <option v-for="cat in cats" :value="cat['id']" :selected="cat.id==cloth.category_id">{{
                                cat['name']}}
                            </option>

                        </select>

                    </div>
                </div>
            </div>
            <div id="load_cloth_properties">
                <div v-for="pcat in pcats" v-if="pcat.category_id==cloth.category_id" class="col-lg-6">
                    <div class="form-group">
                        <label>{{ pcat.name }}</label>
                        <select multiple  name="pcats[]" v-bind:class="(pcat.multiselect)? 'select_multiple form-control':'select_single form-control'"
                                 tabindex="-1">
                            <option v-for="pcat_data in pcatsd" v-if="pcat_data.categoryproperties_id==pcat.id"
                                    :value=pcat_data.id v-bind:selected="isExist(pcat_data.id)">
                                {{ pcat_data.name }}
                            </option>
                        </select>

                       </div>
                 </div>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>تصویر</label>
                    <div class="dropzone dz-clickable" id="photo">
                        <div class="dz-default dz-message" data-dz-message="">
                            <span>تصاویر لباس ها را اینجا قرار دهید</span>
                        </div>
                    </div>

                    <input type="hidden" name="pic" id="photo-id" value>

                </div>

            </div>
            <div class="col-lg-6">


                <div class="form-group">
                    <div >
                        <label class="text-left">رنگ</label>
                    </div>
                    <div    v-for="color in colors" :style="{'background': '#'+color.code}">
                        <input  type="checkbox"  :value="color.id" name="color[]" :checked="isExistColor(color.id)">
                        <label>{{ color.code}}</label>
                    </div>



                </div>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label> فروشگاه</label>
                    <div style="height: 35px">
                        <select name="shop_id" class="shop_select form-control direction">
                            <option v-for="shop in shops" :selected="shop.id==cloth.shop_id" :value=shop.id>{{shop.id}} -{{shop.shop}}</option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>توضیحات محصول </label>
                    <textarea rows="6" class="form-control" name="comment" placeholder="Enter comment">{{ cloth.comment }}</textarea>

                </div>
            </div>

            <div class="col-lg-6 direction">
                <div class="form-group">
                    <label>وضعیت لباس</label>
                    <div class=" direction "  >
                        <input type="radio" :checked="cloth.status==0" name="status" value="0">
                        بلاک
                        <input type="radio" :checked="cloth.status==1" name="status" value="1">
                        غیر فعال
                        <input type="radio" :checked="cloth.status==2" name="status" value="2">
                        فعال
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group direction">
            <button type="submit" class="btn btn-success">به روز رسانی</button>
            <button type="reset" class="btn btn-default">پاک کردن فرم</button>
        </div>
    </div>
</template>

<script>

    export default {
        name: "admin-create-cloth-component",
        props: ['data'],
        data() {
            return {
                cats: this.data['cats'],
                pcats: this.data['pcats'],
                pcatsd: this.data['pcatsd'],
                colors: this.data['colors'],
                catid: this.data['catid'],
                shops: this.data['shops'],
                cloth: this.data['cloth'],
                pclothd: this.data['pclothd'],
                cloth_colors: this.data['clothColors'],
                cloth_images: this.data['clothImages'],
                sex_selected:this.data.cloth.sex,
            }

        },
        methods: {
            checkcat: function () {
                var sex = this.sex_selected;
                var options = "<option></option>";
                this.cats.forEach(function (cat) {
                    if (cat.sex == sex)
                        options += "<option value='" + cat.id + "'>" + cat.name + "<option>";
                });
                document.getElementById('categorySelect').removeAttribute('disabled');
                document.getElementById('categorySelect').innerHTML = options;
            },
           isChecked(id){
             if(id==this.cloth)
                 self.isChecked=true;
           },
            isExist: function (pcatd_id) {


                var res = this.pclothd.some(function (pcloth_data) {
                    if (pcloth_data.category_property_data_id == pcatd_id) {
                        return "selected";
                    }
                    return false;
                });
                return res;
            },
            isExistColor: function (color_id) {
                    var ress = this.cloth_colors.some(function (cloth_color) {
                        if (cloth_color.pivot.color_id == color_id) {
                            return true;
                        }
                        return false;
                    });
                console.log( ress);
                return ress;
            }

        }

    }

</script>
<style>
    .color-choose {
        float: left;
        margin: 5px;
        width: 70px;
        height: 70px;


    }

</style>