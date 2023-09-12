<x-dashboard>
    <div class="col-12 grid-margin stretch-card ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('Categories') }}</h4>
                <p class="card-description"> {{ __('Add Category') }} </p>
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    @include('admin.category._form')
                </form>
            </div>
        </div>
    </div>
    @push('css')
        <link rel="stylesheet" href="{{asset('trumbowyg/ui/trumbowyg.min.css')}}">
    @endpush
    @push('js')
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


        <!-- Import jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
        </script>

        <!-- Import Trumbowyg -->
        <script src="{{asset('trumbowyg/trumbowyg.min.js')}}"></script>

        <script>
            $('#editor').trumbowyg();
        </script>
    @endpush
</x-dashboard>
