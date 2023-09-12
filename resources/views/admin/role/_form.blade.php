
<div class="form-row">
    <div class="col-md-12">
        <x-form.input name="name" lable="Title Project" :value="$role->name" required  />
    </div>
</div><br>

<div class="form-group row">
    @foreach (app('abilities') as $ability=>$lablel )
    <div class="form-check col-3">
        <input type="checkbox"  name="abilities[]" label="Role Nmae" value="{{$ability}}" class="form-check-input" id="flexCheckDefault" @if(in_array($ability,($role->abilities ?? []))) checked @endif >
        <label class="form-check-lable col-3" for="flexCheckDefault">
            {{$lablel}}
        </label>

    </div>
    @endforeach
</div>


    <button type="submit" class="btn btn-primary">{{ __('Save Data') }}</button>

