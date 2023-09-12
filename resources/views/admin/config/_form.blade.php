<div class="form-group">
    <label>App Name</label>
    <x-form.input name="config[app.name]" :value="config('app.name')" />
</div>
<div class="form-group">
    <label>Logo</label>
    <x-form.input name="config[contact.logo]" type="file" :value="config('contact.logo')" />
</div>
<div class="row">

    <div class="form-group col-6">
        <label>Time Zone</label>
        <x-form.input name="config[app.timezone]" :value="config('app.timezone')" />
    </div>
    <div class="form-group col-6">
        <label>Address</label>
        <x-form.input name="config[contact.address]" :value="config('contact.address')" />
    </div>
   
</div>
<div class="row">
    <div class="form-group col-6">
        <label>Phone</label>
        <x-form.input name="config[contact.phone]" :value="config('contact.phone')" />
    </div>
    <div class="form-group col-6">
        <label>Email</label>
        <x-form.input name="config[contact.email]" :value="config('contact.email')" />
    </div>
</div>
<div class="row">
    <div class="form-group col-3">
        <label>Facebook</label>
        <x-form.input name="config[contact.facebook]" :value="config('contact.facebook')" />
    </div>

    <div class="form-group col-3">
        <label>Twiter</label>
        <x-form.input name="config[contact.twiter]" :value="config('contact.twiter')" />
    </div>
    <div class="form-group col-3">
        <label>Instagram</label>
        <x-form.input name="config[contact.instagram]" :value="config('contact.instagram')" />
    </div>
    <div class="form-group col-3">
        <label>Linkedin</label>
        <x-form.input name="config[contact.linkedin]" :value="config('contact.linkedin')" />
    </div>
</div>

{{--
<div class="form-group">
    <label>Currency</label>
    <x-form.select2 name="config[app.currency]" :options="$currencies" :selected="config('app.currency')" />
</div>
--}}

<button type="submit" class="btn btn-primary me-2">Save</button>
