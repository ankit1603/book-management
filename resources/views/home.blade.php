@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Book Management</div>

                <div class="panel-body">
					<table class="table table-bordered">
						<tr>
							<th>Author</th>
							<th>Book Name</th>
							<th>Actions</th>
						</tr>
						<tr v-for="todo in todos">
							<td>@{{todo.author}}</td>
							<td>@{{todo.bookname}}</td>
							<td>
                                <button class="btn btn-primary" @click="editTodo(todo)">Edit</button>
								<button class="btn btn-danger" @click="removeTodo(todo.id)">Delete</button>
							</td>
						</tr>
					</table>
					<div class="form-group" v-if="createMode">
						<form method="POST" action="#" @submit.prevent="addTodo()">
							<div class="col-md-8">
								<input type="text" class="form-control" placeholder="Enter Author" v-model="newTodo.author" name="description" />
								<input type="text" class="form-control" placeholder="Enter Book name" v-model="newTodo.bookname" name="description" />
								<!--input type="checkbox" v-model="newTodo.is_completed" name="is_completed" id="is_completed" value="1" /-->
								<!--label for="is_compeleted">Is completed?</label-->
							</div>
							<div class="col-md-2">
								<button class="btn btn-primary" type="submit">Add Todo</button>
							</div>
						</form>
					</div>
					<div class="form-group" v-else="createMode">
						<form method="POST" action="#" @submit.prevent="updateTodo()">
							<div class="col-md-8">
								<input type="text" class="form-control" v-model="newTodo.author" name="description" />
								<input type="text" class="form-control" v-model="newTodo.bookname" name="description" />
								<!--input type="checkbox" v-model="newTodo.is_completed" name="is_completed" id="is_completed" value="1" /-->
								<!--label for="is_compeleted">Is completed?</label-->
							</div>
							<div class="col-md-2">
								<button class="btn btn-primary" type="submit">Update Todo</button>
							</div>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
