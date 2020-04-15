@extends('layouts.app')

@section('content')


       <form action="store-tasks" method="POST">
       	@csrf
            <div id="myDIV" class="header">
              <h2>My To Do List</h2>
              <input type="text" name="name" placeholder="Title...">
              <button type="submit" class="addBtn">Add</button>
            </div>
        </form>
        <ul id="myUL">
        	@foreach($datas as $data)
          <li>
            <div class="task">
                {{ $data->name }}
            </div>
            <div class="action">
                <a href="{{$data->id}}/edit"><i class="fa fa-edit"></i></a>
            </div>
{{--             <div class="action">
            	<form action="{{$data->id}}/delete" method="GET">
                <button type="submit" class="iccon"><i class="fa fa-trash-alt"></i></button>
                </form> 
            </div> --}}
            <div class="action">
            	<a href="{{$data->id}}/delete"><i class="fa fa-trash-alt"></i></a>
            </div>
          </li>
			@endforeach
        </ul>

@endsection