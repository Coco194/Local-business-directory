@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                New Address
            </div>
            <div class="card-body">
                <form action="/store-address" method="post">
                  @csrf
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                           
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Contact No</label>
                                <input type="text" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror">
                                @error('contact_number')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                           
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                           
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                           
                            </div>
                        </div>
                    </div>
                    <button type="submit" style="float: right" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
