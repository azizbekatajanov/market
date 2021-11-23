@extends('layouts.dashboard')
@section('content')

    <h1 id="get">
        123
    </h1>
    <script>
        console.log('hello')
        new Vue({
            el: 'get',
            async created(){
                console.log('rendered page')
                const items = await fetch('/api/category')
                    .then(res => res.json())
                    .then(data => console.log(data))
            }
        })
    </script>
@endsection
