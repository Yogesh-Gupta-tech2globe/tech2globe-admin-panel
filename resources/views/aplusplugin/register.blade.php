
@extends("layout.layout")
@section("content")
<?php $base_url = "http://localhost:8000"; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id="aplusformSubmit">@csrf
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Apluscontent Plugin Register</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-2">
                            <label>Domain</label>
                            <input type="text" name="domain" class="form-control" required placeholder="example.com">
                        </div>
                        <div class="form-group mt-2">
                            <label>Username</label>
                            <input type="text" name="name" class="form-control" required placeholder="Enter your Name">
                        </div>
                        <div class="form-group mt-2">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="Enter your Email">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection