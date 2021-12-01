@extends('layouts.auth')
@section('content')
    <div class="wrapper wrapper-full-page" id="register">
        <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('{{asset('/images/register.jpg')}}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Register</h2>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <form class="form" method="POST" @submit.prevent="sendData" enctype="multipart/form-data">
                                      <div class="col-md-5 mr-auto">
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <i class="material-icons">face</i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="username" placeholder="Username..." v-model="name">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <i class="material-icons">face</i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="first_name" placeholder="First Name..." v-model="firstName">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <i class="material-icons">face</i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name..." v-model="lastName">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <i class="material-icons">mail</i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" placeholder="Email..." v-model="email">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <i class="material-icons">lock_outline</i>
                                                        </span>
                                                    </div>
                                                    <input type="password" name="password" placeholder="Password..." class="form-control" v-model="password">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <i class="material-icons">lock_outline</i>
                                                        </span>
                                                    </div>
                                                    <input type="password" name="password_confirmation" placeholder="Password confirmation..." v-model="confirmPassword" class="form-control">
                                                </div>
                                            </div>
                                      </div>

                                        <div class="col-md-5 mr-auto">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="{{asset('/images/default-avatar.png')}}" class="picture-src" id="wizardPicturePreview" title="" />
                                                    <input type="file" id="wizard-picture">
                                                </div>
                                                <h6 class="description">Choose Picture</h6>
                                            </div>
                                        </div>

                                            <div class="text-center">
                                                <button class="btn btn-primary btn-round mt-4" @submit="sendData">Get Started</button>
                                            </div>
                                        </form>

{{--                                                      image input                         --}}

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <script>
                new Vue({
                    el: "#register",
                    data: {
                        name: "",
                        firstName: "",
                        lastName: "",
                        email: "",
                        password: "",
                        confirmPassword: ""
                    },
                    methods: {
                        async sendData(){
                            const userData = {
                                username: this.name,
                                first_name: this.firstName,
                                last_name: this.lastName,
                                email: this.email,
                                password: this.password,
                                password_confirmation: this.confirmPassword
                            }

                            const res = await axios.post('/api/register', userData)

                            if (res) {
                                window.location.href = '{{ route('homepage') }}'
                            }
                        }
                    }
                })
            </script>
@endsection
