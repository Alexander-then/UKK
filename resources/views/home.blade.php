<!-- mengekspor design layout -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card-header bg-dark text-white">
                <h4>Profile</h4>
                <!-- Button logout -->
                <button type="button" class="btn btn-danger">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="text-decoration:none; color: white;">
                        {{ __('Logout') }}
                    </a>
                </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-header bg-dark text-white">
                <h4>Home</h4>
                <!-- Button untuk add tweet/post -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PostingTweet">Add Tweet</button>
            </div>
            <hr>
            <!-- Perulangan data -->
            @foreach ($tweet as $twet)
            <div class="card-body border border-dark border-rounded my-2">
                <h4 style="margin-bottom: 2%;">{{ $twet->isi_posting }}</h4>
                <img src="{{ asset('storage/tweet/'.$twet->gambar_posting) }}" alt="Gambar posting" width="100%">
                <p style="margin-top: 3%;">{{ $twet->file_posting }}</p>

                <!-- Button edit dan delete -->
                <button type="button" class="btn btn-warning">Edit</button>
                <form action="{{ route('delete-tweet', $twet->id) }}" method="get" class="ml-5">
                    <input type="hidden" value="delete">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            @endforeach
        </div>
        <div class="col-md-3">
            <div class="card-header bg-dark text-white">
                <input type="search" name="cari" id="cari" placeholder="Search #hashtag" class="rounded">
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah tweet atau post -->
<div class="modal fade" id="PostingTweet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Tweet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add-tweet" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="isi_postingan">Tweet</label>
                <textarea name="isi_posting" id="isi_posting" cols="30" rows="5" class="form-control" placeholder="Ketik sesuatu..."></textarea>
            </div>
            <div class="form-group">
                <label for="gambar_posting">Foto (Optional)</label>
                <input type="file" name="gambar_posting" id="gambar_posting" class="form-control">
            </div>
            <div class="form-group">
                <label for="file_posting">File (Optional)</label>
                <input type="file" name="file_posting" id="file_posting" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Post Tweet</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
