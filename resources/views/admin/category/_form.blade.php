<div class="form-group">
    <x-form.input lable="Name" name="name" type="text" class="form-control" :value="$category->name" placeholder="Name" required />
</div>
<div class="form-group">
    <x-form.textarea lable="Description" id="editor"  name="notes" :value="$category->notes" placeholder="Description" />
</div>
<!-- Wrap the editor with an element with the class trumbowyg-dark -->

<div class="form-group">
    <x-form.status lable="Status" name="status" :value="$category->status" :option="['active' => 'Active', 'inactive' => 'Inactive']" />
</div>
<div class="form-group">
    <x-form.input lable="Image" name="image" type="file" class="form-control" :value="$category->name" />
</div>
<div class="form-group">
    <label>{{ __('Parent Category') }}</label>
    <select class="js-example-basic-single" style="width:100%" name="parent_id" @class([
        'is-invalid' => $errors->has('parent_id'),
    ])>
        <option value="" selected disabled>Primary Category</option>
        @foreach ($parent as $parent)
            <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id) == $parent->id)>{{ $parent->name }}</option>
        @endforeach
        @error('parent_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </select>
</div>
<button type="submit" class="btn btn-primary me-2">Save</button>
