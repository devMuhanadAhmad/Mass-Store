<div class="form-group">
    <x-form.input lable="Name" name="name" type="text" class="form-control" :value="$user->name" placeholder="Name" required />
</div>
<div class="form-group">
    <x-form.input lable="Email" name="email" type="email" class="form-control" :value="$user->email" placeholder="Email" required/>
</div>
<div class="form-group">
    <x-form.input lable="Password" name="password" type="password" class="form-control" :value="$user->password" placeholder="Password"  required/>
</div>
<div class="form-group">
    <x-form.input lable="Password Confirmation" name="password_confirmation" type="password" class="form-control" :value="$user->password" placeholder="Password Confirmation"  required/>
</div>
<div class="form-group">
    <x-form.status lable="Type Account" name="type_account" :value="$user->type_account" :option="['salesman' => 'Salesman', 'trader' => 'Trader']" />
</div>
<div class="form-group">
    <x-form.status lable="Status" name="status" :value="$user->status" :option="['active' => 'Active', 'inactive' => 'Inactive']" />
</div>
<button type="submit" class="btn btn-primary me-2">Save</button>



