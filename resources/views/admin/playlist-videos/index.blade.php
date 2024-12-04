@extends('admin.layouts.main')

@section('page-content')
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Playlist Videos</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Author</th>
                <th>Playlist Name</th>
                <th>Total Videos</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($playlistVideos as $playlist)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $playlist->user->name }}</td>
                  <td>{{ $playlist->name }}</td>
                  <td>{{ $videos->where('playlist_video_id', $playlist->id)->count() }}</td>
                  <td>
                    <a href="/admin/playlist-videos/{{ $playlist->slug }}/edit" class="btn btn-warning btn-circle btn-sm">
                      <i class="fas fa-info-circle"></i>
                    </a>
                    <a href="/admin/playlist-videos/{{ $playlist->slug }}" class="btn btn-danger btn-circle btn-sm"
                      data-confirm-delete="true"><i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
