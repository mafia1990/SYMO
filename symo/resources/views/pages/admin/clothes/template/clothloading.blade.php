@if(count($pcats)>0)
    @foreach($pcats as $pcat)
        @if($pcat->catid== $catid)
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="category">{{ __($pcat->name) }}</label>
                    <select name="pcats[]" class="form-control">
                        <option value="0">انتخاب کنید</option>
                        @if(count($pcats_data)>0)
                            @foreach($pcats_data as $pcat_data)
                                @if($pcat_data->catpid== $pcat->id)
                                    <option value="{!! $pcat_data->id !!}">{!! $pcat_data->name !!}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        @endif
    @endforeach
@endif