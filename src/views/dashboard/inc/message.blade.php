@if (session('notify'))
    @php($notify = session('notify'))
    @if($notify['status']==true)
        <script>
            toastr.success("{{$notify['message']}}");
        </script>
    @elseif($notify['status']==false)
        @foreach($notify['errors'] as $error)
            <script>
                toastr.error("{{$error}}");
            </script>
        @endforeach

    @endif

@endif
