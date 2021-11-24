@extends('layouts.dashboard')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@section('content')
    <div class="container-fluid" id="app3">
        <div class="swal2-container swal2-center swal2-fade swal2-shown"   v-show="isVisible">
            <div aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"            >
                <div class="swal2-header">
                    <ul class="swal2-progresssteps" style="display: none;"></ul>
                    <div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
                    <div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div>
                    <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;"><span class="swal2-icon-text">!</span></div>
                    <div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div>
                    <div class="swal2-icon swal2-success" style="display: none;">
                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                        <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                        <div class="swal2-success-ring"></div>
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                    </div>
                    <img class="swal2-image" style="display: none;">
                    <h2 class="swal2-title" id="swal2-title" style="display: flex;">Are you sure?</h2>

                    <button type="button" class="swal2-close" style="display: none;" @click="visibleHandler">×</button>
                </div>
                <div class="swal2-content">
                    <div id="swal2-content" style="display: block;">You will not be able to recover this imaginary file!</div>
                    <input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;">
                    <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                    <select class="swal2-select" style="display: none;"></select>
                    <div class="swal2-radio" style="display: none;"></div>
                    <label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label>
                    <textarea class="swal2-textarea" style="display: none;"></textarea>
                    <div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div>
                </div>
                <div class="swal2-actions" style="display: flex;"><button type="button" class="swal2-confirm btn btn-success" aria-label="" @click="removeCategoryHandler">
                    Yes, delete it!
                </button><button type="button" class="swal2-cancel btn btn-danger" aria-label="" style="display: inline-block;"
                    @click="visibleHandler"
                >
                        No, keep it
                    </button></div>
                <div class="swal2-footer" style="display: none;"></div>
            </div>
        </div>
        <div class="popup">
            <form class="form" @submit="sendCategoryHandler">
                @csrf
                <input type="text" name="name" placeholder="Введите название категорию" style="width: 300px; height: 40px;" v-model="inputVal"/>
                <button class="btn btn-success">Добавить категорию</button>
            </form>
        </div>
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
            <tbody >
                <tr v-for="category in categories" >
                    <td>@{{ category.id }}</td>
                    <td>@{{ category.name }}</td>
                    <td>@{{ category.created_at }}</td>
                    <td class="text-right">
                        <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                        <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                        <a href="#" class="btn btn-link btn-danger btn-just-icon remove" @click="visibleHandler(category.id)" >
                            <i class="material-icons">close</i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <script>
        new Vue({
            el: '#app3',
            data: {
                categories: [],
                inputVal: '',
                isVisible: false,
                categoryId: null,
            },
            methods: {
                async getCategories(){
                    const { data: categories } = await axios.get('/api/dashboard/category');
                    this.categories = categories.data;
                },
                visibleHandler(id){
                    this.isVisible = !this.isVisible
                    this.categoryId = id
                },
                async removeCategoryHandler(){
                    await axios.delete(`/api/dashboard/category/${this.categoryId}`)
                    this.isVisible = false
                    window.location.reload()
                },
                async sendCategoryHandler(){
                    try {
                        const res = await axios.post('/api/dashboard/category', {
                            name: this.inputVal,
                        })
                        console.log(res);

                    } catch (e) {
                        console.log(e.response.data.message);
                    }
                }
            },
            async created() {
                await this.getCategories();
            }
        })
    </script>
@endsection

