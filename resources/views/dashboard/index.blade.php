@extends('layouts.dashboard')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
@section('content')

    <h1 id="get">
        @{{ text }}
    </h1>

    <script>
        // console.log('hello')
        new Vue({
            el: '#get',
            data: {
                text: '11231231232123'
            },
            async created(){
                console.log('rendered page')
                const items = await fetch('/api/category')
                    .then(res => res.json())
                    .then(data => console.log(data))
            }
        })
    </script>
@endsection
