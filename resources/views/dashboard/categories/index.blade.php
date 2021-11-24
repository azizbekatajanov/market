@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th class="disabled-sorting text-right">Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th class="col-1">ID</th>
                <th class="col-6">Name</th>
                <th>Date</th>
                <th class="disabled-sorting text-right">Actions</th>
            </tr>
            </tfoot>
            <tbody id="app3">
                <tr v-for="category in categories" >
                    <td>@{{ category.id }}</td>
                    <td>@{{ category.name }}</td>
                    <td>@{{ category.created_at }}</td>
                    <td class="text-right">
                        <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                        <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                        <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app3',
            data: {
                categories: []
            },
            methods: {
                async getCategories(){
                    const { data: categories } = await axios.get('/api/dashboard/category');
                    this.categories = categories.data;
                }
            },
            async created() {
                await this.getCategories();
            }
        })
    </script>
@endsection

