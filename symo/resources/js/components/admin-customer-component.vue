<template>
    <div class="panel panel-default direction">
        <div class="panel-heading   " style="display:  flow-root;">
            <span class="pull-right">کاربران مشخصات</span>
            <span style="float: left;"> <a href="customers/create">
            <button type="button" class="btn btn-success   ">
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
                        <th>کد کاربر</th>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>تماس</th>
                        <th>عکس پروفایل</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
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

            }
        },

    }
</script>
