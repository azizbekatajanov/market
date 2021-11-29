@extends('layouts.auth')
@section('content')
    <div class="wrapper wrapper-full-page">
        <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('{{asset('/images/register.jpg')}}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Register</h2>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 mr-auto">
                                        <form class="form" method="" action="">
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="username" placeholder="Username...">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="first_name" placeholder="First Name...">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="username" placeholder="Last Name...">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">mail</i>
                            </span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" placeholder="Email...">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock_outline</i>
                            </span>
                                                    </div>
                                                    <input type="password" name="password" placeholder="Password..." class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock_outline</i>
                            </span>
                                                    </div>
                                                    <input type="password" name="password_confirmation" placeholder="Password confirmation..." class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group has-default">
                                                <div class="input-group">
                                                    <div class="col-sm-4">
                                                        <div class="picture-container">
                                                            <div class="picture">
                                                                <img src="{{asset('/images/default-avatar.png')}}" class="picture-src" id="wizardPicturePreview" title="" />
                                                                <input type="file" id="wizard-picture">
                                                            </div>
                                                            <h6 class="description">Choose Picture</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked="">
                                                    <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                                                    I agree to the
                                                    <a href="#something">terms and conditions</a>.
                                                </label>
                                            </div>
                                            <div class="text-center">
                                                <a href="#pablo" class="btn btn-primary btn-round mt-4">Get Started</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
