@extends('layouts.dashboard')

@section('content')

    <div id="get">
        @{{ text }}
    </div>

    <script>
        // console.log('hello')
        new Vue({
            el: '#get',
            data: {
                text: '11231231232123'
            },
            async created(){
                console.log('rendered page')
            }
        })
    </script>
@endsection
