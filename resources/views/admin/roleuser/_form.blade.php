

<div class="form-group">
    <label>{{ __('User Name') }}</label>
    <select class="js-example-basic-single" style="width:100%" name="user_id" @class([
        'is-invalid' => $errors->has('user_id'),
    ])>
        <option value="" selected disabled>Select user Name</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}" @selected(old('user_id', $roleuser->user_id) == $user->id)>{{ $user->name }}</option>
        @endforeach
        @error('user_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </select>
</div>


<button type="submit" class="btn btn-primary me-2">Save</button>
