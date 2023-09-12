<div class="form-group">
    <x-form.input lable="Name" name="name" type="text" class="form-control" :value="$store->name" placeholder="Name" required />
</div>
<div class="form-group col-12">
    <x-form.textarea lable="Description" id="editor" name="notes" :value="$store->notes" placeholder="Description" />
</div>
@if (Auth::user()->type_account == 'admin')
<div class="form-group">
    <x-form.status lable="Status" name="status" :value="$store->status" :option="['active' => 'Active', 'inactive' => 'Inactive']" />
</div>
@endif
<div class="form-group">
    <x-form.input lable="Image" name="image" type="file" class="form-control"  />
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


