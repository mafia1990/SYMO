<template>


    <div class="panel-body">
        <div class="row">
        <div class="col-lg-6">

                <div class="form-group">
                    <label> عنوان محصول </label>
                    <input class="form-control" required name="title" >

                </div>
            </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>دسته بندی</label>
                <select @click="loaddatacloth()" name="category" class="form-control">
                    <option  value="">انتخاب کنید</option>
                    <option  v-for="cat in cats" :value="cat['id'] ">{{ cat['name']}}</option>



                </select>

            </div>
        </div>
        <div id="load_cloth_properties">

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>تصویر</label>
                <input name="pic[]" type="file" >
                <input name="pic[]" type="file" >
                <input name="pic[]" type="file" >
            </div>

        </div>
        <div class="col-lg-6">


            <div class="form-group" >
                <label class="text-left" >رنگ</label>
            </div>
                <div class="form-group" style="display: flex">


                <div @click="checkClick()" v-for="color in colors" :style="' margin:5px; width: 70px;height: 70px; background:#'+color.code">
                <input :value="color['id']"  name="color[]" type="checkbox"  class="bg-white color-choose " style=" opacity: 0;">
                </div>





            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>توضیحات محصول </label>
                <textarea rows="6" class="form-control" name="comment" placeholder="Enter comment"></textarea>

            </div>
        </div>
        </div>
        <div class="form-group">
            <button type="reset" class="btn btn-success">پاک کردن فرم</button>
            <button type="submit" class="btn btn-primary">درج به مجموعه</button>
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
                colors: this.data['colors'],

            }

        },
        methods:{
            checkClick:function() {
                if (event.target.tagName == "INPUT" && event.target.parentElement.style.opacity != .4) {
                    event.target.parentElement.style.opacity = .4;
                    event.target.parentElement.style.margin = "10px";
                } else if (event.target.parentElement.style.opacity == .4) {
                    event.target.parentElement.style.opacity = 1;
                    event.target.parentElement.style.margin = "5px";
                }
            },
            loaddatacloth:function(){
                    var id=event.target.value;

                    $('#load_cloth_properties').html("");

                    $('#load_cloth_properties').load('/fetchcatp?id='+id);


                },

        },
    }
</script>
<style>
    .color-choose{
        float: left;
        margin: 5px;
        width: 70px;
        height: 70px;


    }

</style>