@extends('layouts.printing')
@section('title', 'All Members Print')
@section('content')

<div class="container-fluid">
  <header class="section mb-5">
    <div class="container">
      <a href="/dashboard">
        <img src="{{ asset('images/Sanctuary.png') }}" alt=""
          style="width: 100px; height: 100px; margin: 1rem auto; class=" img-responsive">
      </a>
    </div>
    <div class="container">
      <h2 class="heading text-center">Sanctuary Service Unit.</h2>
      <h6 class="heading text-center">MOTTO: Doing The Will Of God From The Heart. </h6>
      <button class="btn btn-success float-right" value="Print" onclick="window.print()">Print Members</button>
    </div>
  </header>
  <div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Full Name</th>
          <th scope="col">Mail</th>
          <th scope="col">Hall</th>
          <th scope="col">Sub Unit</th>
          <th scope="col">Position</th>
        </tr>
      </thead>
      <tbody>
        @if($members->count() > 1)
        @foreach($members as $member)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ ucfirst($member->sur_name) }} {{ ucfirst($member->first_name) }} {{ ucfirst($member->last_name) }}</td>
          <td>{{ $member->email }}</td>
          <td>{{ $member->hall }}</td>
          <td>{{ ucfirst($member->sub_unit) }}</td>
          <td>{{ $member->user_rank }}</td>
        </tr>
        @endforeach
        @else
        Sorry, You have no members yet.
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection