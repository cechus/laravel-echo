<template>
    <div class="container">
        <ul>
            <li v-for="(task, index) in tasks" :key="index">{{ task.body}}</li>
        </ul>
        <input type="text" v-model="newTask" @blur="addTask">
    </div>
</template>

<script>
    export default {
        data(){
            return{
                newTask:null,
                tasks:[]
            }
        },
        created() {
            axios.get('/tasks').then(response=>{
                this.tasks = response.data;
            })

        },
        methods:{
            addTask(){
                axios.post('/tasks', {'body': this.newTask});
                this.tasks.push(this.newTask);

                this.newTask = '';
            }
        }
    }
</script>
