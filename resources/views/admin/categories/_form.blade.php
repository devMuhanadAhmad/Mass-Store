<input type="hidden" wire:model="category_id">

<div class="form-group">
    <label for="exampleInputName13">Name</label>
    <input type="text" wire:model="name" class="form-control" id="exampleInputName13" placeholder="Name">
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="exampleInputName10">Description</label>
    <textarea type="text" wire:model="notes" class="form-control" rows="4" id="exampleInputName10"
        placeholder="Description"></textarea>
    @error('notes')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
{{--

    @php
    $arr=['active','inactive']
    @endphp

    <div class="form-group">
        <label >Status</label>
        <select wire:model="status" class="form-control" >
            @foreach ($arr as $val)
            <option value="{{$val}}">{{$val}}</option>
            @endforeach
        </select>
        @error('status')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    --}}
<div class="form-group">
    <label for="exampleInputName1">Image</label>
    <input type="file" wire:model="image" class="form-control" id="exampleInputName1" placeholder="Name">
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>Parent Category</label>
    <select wire:model="parent_id" class="form-control">
        <option value="" selected disabled>Primary Category</option>
        @foreach ($parent as $parent)
            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
        @endforeach
    </select>
    @error('parent_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<button type="submit" class="btn btn-primary me-2">Submit</button>
