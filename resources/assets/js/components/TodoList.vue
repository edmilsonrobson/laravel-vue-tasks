<template>
    <div class="box">
        <div class="field has-addons">
            <div class="control">
                <input class="input is-large" v-model="taskInput" type="text" placeholder="Name your task...">
            </div>
            <div class="control">
                <a @click='addTask' class="button is-large is-info">
                    Add!
                </a>
            </div>
        </div>
        <br>
        <task-list></task-list>
    </div>
</template>

<script>
    import TaskList from './TaskList.vue';

    export default {
        props() {
            return {
                isDevelopment: {type:Boolean, default: false},
            }
        },

        components: {
          TaskList,
        },

        data() {
            return {
                taskInput: '',
            }
        },

        methods: {
            addTask() {
                swal('Alright!', 'You added a new task: ' + this.taskInput, 'success');
                this.taskInput = '';
            }
        }
    }
</script>