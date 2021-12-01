@extends('layouts.auth')
@section('content')
    <div class="wrapper wrapper-full-page" id="login">
        <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{asset('/images/login.jpg')}}'); background-size: cover; background-position: top center;">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                            <div class="card card-login card-hidden">
                                <div class="card-header card-header-rose text-center">
                                    <h4 class="card-title">Login</h4>
                                </div>
                                <div class="card-body ">
                                    <form
                                        method="POST"
{{--                                        action="/api/login"--}}
                                        @submit="sendForm"
                                    >
                                        @csrf
                                      <span class="bmd-form-group">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="material-icons">face</i>
                                            </span>
                                          </div>
                                          <input
                                              type="text"
                                              class="form-control"
                                              name="username"
                                              placeholder="Username..."
                                              v-model="name"
                                          >
                                            @error('username')
                                            <p>{{$message}}</p>
                                            @enderror
                                        </div>
                                      </span>
                                        <span class="bmd-form-group">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="material-icons">lock_outline</i>
                                            </span>
                                          </div>
                                          <input
                                                type="password"
                                                name="password"
                                                class="form-control"
                                                placeholder="Password..."
                                                v-model="password"
                                          >
                                            @error('password')
                                            <p>{{$message}}</p>
                                            @enderror
                                        </div>
                                      </span>
                                        <div class="card-footer justify-content-center">
                                            <button @click="sendForm" class="btn btn-rose btn-link btn-lg">Lets Go</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
        new Vue({
            el: "#login",
            data: {
                name: "",
                password: "",
                token: localStorage.getItem('token'), //get your local storage data
            },
            methods: {
                async sendForm(){
                   try{
                       const res = await axios.post('/api/login',{
                           username: this.name,
                           password: this.password
                       })
                        if(res.data){
                            this.token = res.data.access_token
                            window.location.href = '{{ route('homepage') }}'
                            localStorage.setItem('token', this.token)
                        }else{
                            window.location.href = '{{ route('auth.login') }}'
                        }

                   }catch(e){
                       console.log(e)
                   }
                }
            },
            created(){
                const token = localStorage.getItem('token')
            },
        })
    </script>
@endsection
