@if(count($pcats)>0)
    @foreach($pcats as $pcat)
        @if($pcat->category_id== $catid)
            <div class="col-lg-6" >
                <div class="form-group" >
                    <label for="category">{{ __($pcat->name) }}</label>

                    <select name="pcats[]"  class="{{($pcat->multiselect)?"select_multiple": "select_single"}} form-control"    tabindex="-1" >
                        @if(count($pcats_data)>0)
                            @foreach($pcats_data as $pcat_data)
                                @if($pcat_data->categoryproperties_id== $pcat->id)
                                    <option value="{!! $pcat_data->id !!}">{!! $pcat_data->name !!}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
<script>
    $('.select_multiple').select2({
        placeholder: 'انتخاب کنید',
        multiple:true,
    });
    $('.select_single').val(null).trigger('change');
    $('.select_multiple').val(null).trigger('change');
    $('.select_single').select2({
        placeholder: 'انتخاب کنید',
        multiple:false,
    });

</script>
        @endif
    @endforeach
@endif
