@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>User Id</td>
          <td>Content</td>
          <td>Code</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $share)
        <tr>
            <td>{{$share->id}}</td>
            <td>{{$share->user_id}}</td>
            <td>{{$share->content}}</td>
            <td>{{$share->code}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection