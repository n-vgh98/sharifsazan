@if (session('success'))
    <script>
        Swal.fire({
            title: '{{ __('translation.done') }}',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: '{{ __('translation.ok') }}'
        })
    </script>
@endif
@if (session('fail'))
    <script>
        Swal.fire({
            title: '{{ __('translation.fail') }}',
            text: '{{ session('fail') }}',
            icon: 'error',
            confirmButtonText: '{{ __('translation.ok') }}'
        })
    </script>
@endif
