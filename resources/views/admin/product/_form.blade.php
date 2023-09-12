<input name="store_id" type="hidden" type="text"   value="{{$product->store_id}}"/>

<div class="form-group col-12">
    <x-form.input lable="Name" name="name" type="text" class="form-control" :value="$product->name" placeholder="Name"
        required />
</div>
<div class="form-group col-12">
    <x-form.textarea lable="Description" id="editor" name="notes" :value="$product->notes" placeholder="Description" />
</div>
<div class="row">
<div class="form-group col-6">
    <x-form.input lable="Price" name="price" type="number" class="form-control" :value="$product->price"
        placeholder="Price" required />
</div>
<div class="form-group col-6">
    <x-form.input lable="Compare Price" name="compare_price" type="number" class="form-control" :value="$product->compare_price"
        placeholder="Compare Price" />
</div>
</div>
<div class="row">
<div class="form-group col-6">
    <x-form.input lable="Quantity" name="quantity" type="number" class="form-control" :value="$product->quantity"
        placeholder="quantity " />
</div>
<div class="form-group col-6">
    <x-form.input lable="Size" name="size" type="number" class="form-control" :value="$product->size"
        placeholder="size" />
</div>
</div>
<div class="row">
<div class="form-group col-6">
    <x-form.input lable="Manufacturer Company" name="manufacturer_company" type="text" class="form-control"
        :value="$product->manufacturer_company" placeholder="Manufacturer Company " />
</div>
<div class="form-group col-6">
    <x-form.input lable="Product Material" name="product_material" type="text" class="form-control" :value="$product->product_material"
        placeholder="Product Material" />
</div>
</div>
<div class="row">
<div class="form-group col-6">
    <x-form.status lable="Status" name="status" :value="$product->status" :option="['active' => 'Active', 'inactive' => 'Inactive']" />
</div>
<div class="form-group col-6">
    <x-form.status lable="Type" name="type" :value="$product->type" :option="['silver' => 'Silver', 'diamond' => 'Diamond', 'gold' => 'Gold', 'general' => 'General']" />
</div>
</div>
<div class="form-group">
    <x-form.input lable="Image" name="image" type="file" class="form-control"  />
</div>
<div class="form-group">
    <x-form.input lable="Gallary" name="gallary[]" multiple="multiple" type="file" class="form-control"  />
</div>
<div class="form-row">
        <x-form.input name="tags" type="text" lable="tags"   :value="implode(',',$tags)" required />
</div><br>
<div class="form-group">
    <label>{{ __('Category Product') }}</label>
    <select class="js-example-basic-single" style="width:100%" name="category_id" @class([
        'is-invalid' => $errors->has('category_id'),
    ])>
        <option value="" selected disabled>Primary product</option>
        @foreach ($categories as $parent)
            <option value="{{ $parent->id }}" @selected(old('category_id', $product->category_id) == $parent->id)>{{ $parent->name }}</option>
        @endforeach
        @error('category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </select>
</div>
<button type="submit" class="btn btn-primary me-2">Save</button>
@push('css')
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script>
 var inputElm = document.querySelector('[name=tags]'),
 tagify = new Tagify(inputElm);

 var inputElm = document.querySelector('[name=skills]'),
 tagify = new Tagify(inputElm);

</script>
@endpush
