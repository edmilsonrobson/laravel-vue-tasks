<template>
    <div class="box">
        <div class="field has-addons">
            <div class="control">
                <input class="input is-large" v-model="name" type="text" placeholder="Name your task...">
            </div>
            <div class="control">
                <a @click='addTask' class="button is-large is-info">
                    Add!
                </a>
            </div>
        </div>
        <task-list></task-list>
    </div>
</template>

<script>
    import TaskList from './TaskList.vue';

    export default {
        props() {
            return {
                isDevelopment: {type: Boolean, default: false}
            }
        },

        components: {
            TaskList,
        },

        data() {
            return {
                name: '',
            }
        },

        methods: {
            addTask() {
                axios.post('/tasks', {name: this.name})
                    .then(response => {
                        swal('Alright!', 'You added a new task: ' + this.name, 'success');
                        this.name = '';
                        this.$emit('newevent')
                    })
                    .catch(error => {
                        const errorData = error.response.data;

                        if (errorData) {
                            let errorString = '';
                            for(let prop in errorData) {
                                errorString += errorData[prop][0] + '\n';
                            }
                            swal('Oops..!', errorString, 'error');
                        } else {
                            swal('Oops..!', 'We had an error trying to save your task. Call my programmer!\n\n' + error, 'error');
                        }
                    });
            }
        }
    }
</script>