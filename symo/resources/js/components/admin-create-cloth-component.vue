<template>


    <div class="panel-body direction">
        <div class="row">
            <div class="col-lg-6">

                <div class="form-group">
                    <label> متن محصول </label>
                    <input class="form-control" required name="title">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label> نوع لباس</label>
                    <div style="height: 35px">
                        <select @change="checkcat()" v-model="sex_selected" name="sex" class=" form-control">
                            <option value=0>مردانه</option>
                            <option value=1>زنانه</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>دسته بندی</label>
                    <div style="height: 35px">
                        <select name="category_id" disabled id="categorySelect" class="form-control">
                            <option></option>

                        </select>
                    </div>
                </div>
            </div>
            <div id="load_cloth_properties">

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>تصویر</label>
                    <div class="dropzone dz-clickable" id="photo">
                        <div class="dz-default dz-message" data-dz-message="">
                            <span>تصاویر لباس ها را اینجا قرار دهید</span>
                        </div>
                    </div>
                    <input type="hidden" name="pic" id="photo-id">

                </div>

            </div>
            <div class="col-lg-6">


                <div class="form-group">
                    <div class="form-group">
                        <label class="text-left">رنگ</label>
                    </div>
                    <div class="form-group" style="display: flex">


                        <div @click="checkClick()" v-for="color in colors"
                             :style="' margin:5px; width: 70px;height: 70px; background:#'+color.code">
                            <input :value="color['id']" name="color[]" type="checkbox" class="bg-white color-choose "
                                   style=" opacity: 0;">
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label> فروشگاه</label>
                    <div style="height: 35px">
                        <select name="shop_id" class="shop_select form-control direction">
                            <option></option>
                            <option v-for="shop in shops" :value=shop.id>{{shop.id}} -{{shop.shop}}</option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>توضیحات محصول </label>
                    <textarea rows="6" class="form-control" name="comment" placeholder=""></textarea>

                </div>
            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <label>قیمت محصول </label>
                    <input class="form-control" type='text' name="amount">

                </div>
            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <label>نوع تخفیف</label>
                    <input class="" @click="showDiscount(0)" TYPE="radio" value="0" name="discount_type">
                    بر اساس درصد
                    <input class="" @click="showDiscount(1)" type="radio" value="1" name="discount_type">
                    بر اساس قیمت
                    <div id="discount">
                       </div>
                </div>
            </div>
            <div class="col-lg-6 direction">
                <div class="form-group">

                    <label>وضعیت کاربر</label>

                    <div class=" direction ">
                        <input type="radio" name="status" value="0">
                        بلاک
                        <input type="radio" name="status" value="1">
                        غیر فعال
                        <input type="radio" checked name="status" value="2">
                        فعال
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">درج به مجموعه</button>
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
                shops: this.data['shops'],
                colors: this.data['colors'],
                sex_selected: [],
            }

        },
        methods: {
            showDiscount: function (type) {
                if (type) {
                    document.getElementById('discount').innerHTML = " <input placeholder=\"مقدار تخفیف خود را وارد کنید\"   class=\"form-control\" value=\"\"  type=\"text\"  id=\"discount_amount\" name=\"discount\">";
                    return;
                }
                var options = "";
                for (var i = 1; i <= 100; i++) {
                    options += " <option value=" + i + "  >" + i + "%</option>";


                }
                document.getElementById('discount').innerHTML = "<select    name=\"discount\" id=\"discount_precent\" >\n" + options +
                    "  </select>";


            },

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
            checkClick: function () {

                if (event.target.tagName == "INPUT" && event.target.parentElement.style.opacity != .4) {
                    event.target.parentElement.style.opacity = .4;
                    event.target.parentElement.style.margin = "10px";
                } else if (event.target.parentElement.style.opacity == .4) {
                    event.target.parentElement.style.opacity = 1;
                    event.target.parentElement.style.margin = "5px";
                }
            },
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