@if ($errors->any())
<div class="alert alert-danger">
    <h5>{{ __('Error Occured') }}</h5>
    <ul>
        @foreach ($errors->all() as $err)
            <li class="text-danger">{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-md-6">
        <x-form.input name="first_name" lable="First Name" :value="$user->profile->first_name" />
    </div>
    <div class="col-md-6">
        <x-form.input name="last_name" lable="Last Name" :value="$user->profile->last_name" />
    </div>
</div><br>

<div class="row">
    <div class="col-md-6">
        <x-form.input name="birthday" type="date" lable="Birthday" :value="$user->profile->birthday" />
    </div>
    <div class="col-md-6">
        <x-form.status lable="Gender" name="gender" :value="$user->profile->gender" :option="['male' => 'Male', 'female' => 'Female']" />
    </div>
</div><br>

<div class="row">
    <div class="col-md-4">
        <x-form.input name="postal_code" type="number" lable="Postal Code" :value="$user->profile->postal_code" />
    </div>
    <div class="col-md-4">
        <x-form.input name="job_name" lable="Job Name" :value="$user->profile->job_name" />
    </div>
    
    <div class="col-md-4">
        <x-form.status lable="Account Type" name="account_type" :value="$user->profile->account_type" :option="['entrepreneur' => 'Entrepreneur', 'freelancer' => 'Freelancer']" />
    </div>
</div><br>

<div class="row">
    <div class="col-md-4">
        <x-form.input name="street_address" lable="Street Address" :value="$user->profile->street_address" />
    </div>
    <div class="col-md-4">
        <x-form.input name="city" lable="City" :value="$user->profile->city" />
    </div>
    <div class="col-md-4">
        <x-form.input name="state" lable="State" :value="$user->profile->state" />
    </div>
</div><br>



<div class="group">
    <div class="col-md-12">
        <x-form.textarea lable="Description" name="description" :value="$user->profile->description" />
    </div>
</div><br>

<!--image input-->
<div class="group">
    <div class="col-md-12">
        <x-form.input lable="Image" type="file" name="image" class="dropify"
            accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
    </div>
</div> <br><br>



<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">{{ __('Save Data') }}</button>
</div>
<br><br>
