@if( $errors->any() )
    @foreach($errors->all() as $error)
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{!! $error !!}',
                footer: '<a href>Why do I have this issue?</a>'
            })
        </script>
    @endforeach
@endif



@if( session('success') )

    <script>

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{!! session('success') !!}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@endif

@if( session('error') )
    <script>
        Swal.fire({
            icon: 'error',
            text: '{!! session('error') !!}',
        })
    </script>
@endif


