
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
	
    data: {
        todos: [],
        newTodo: {
            id: '',
            description: '',
			is_completed: ''
        },
        createMode: true,
    },
	
    created() {
        this.fetchTodoList();
    },

    methods: {
        fetchTodoList() {
            axios.get('/todos').then((res) => {
                this.todos = res.data;
            });
        },
        addTodo() {
            axios.post('/todos',this.newTodo)
            .then((res) => {
                this.newTodo.description = '';
                this.newTodo.is_completed = '';
                this.fetchTodoList();
            })
            .catch((err) => console.error(err));
        },
        editTodo(todo)  {
            this.newTodo.id = todo.id;
            this.newTodo.description = todo.description;
            this.newTodo.is_completed = todo.is_completed;
            this.createMode = false;
        },

        updateTodo(){
            axios.put('/todos/'+this.newTodo.id, this.newTodo)
            .then((res) => {
                this.fetchTodoList();
                this.newTodo.id = '';
                this.newTodo.description = '';
				this.newTodo.is_completed = '';
                this.createMode = true;
            });
        },
        removeTodo(id) {
            axios.delete('/todos/' + id)
            .then((res) => {
                this.fetchTodoList()
            })
            .catch((err) => console.error(err));
        },
    }
});
