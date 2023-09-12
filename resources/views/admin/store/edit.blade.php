<x-dashboard>
    <div class="col-12 grid-margin stretch-card ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Edit Store') }}</h4>
                <form action="{{ route('store.update', $store->id) }}" method="post" enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    @method('put')
                    @include('admin.store._form')
                </form>
            </div>
        </div>
    </div>
    @push('css')
        <link rel="stylesheet" href="{{ asset('trumbowyg/ui/trumbowyg.min.css') }}">
    @endpush
    @push('js')
        <!-- Import jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
        </script>
        <script src="{{ asset('trumbowyg/trumbowyg.min.js') }}"></script>

        <!-- Import Trumbowyg -->

        <script>
            $('#editor').trumbowyg();
        </script>
        <!-- plugins:js -->
        <script src="{{ asset('../../assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('../../assets/vendors/select2/select2.min.js') }}"></script>
        <script src="{{ asset('../../assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('../../assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('../../assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('../../assets/js/misc.js') }}"></script>
        <script src="{{ asset('../../assets/js/settings.js') }}"></script>
        <script src="{{ asset('../../assets/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ asset('../../assets/js/file-upload.js') }}"></script>
        <script src="{{ asset('../../assets/js/typeahead.js') }}"></script>
        <script src="{{ asset('../../assets/js/select2.js') }}"></script>
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
    @endpush
</x-dashboard>
