<template>
    <div class="box">
        <div class="columns">
            <div class="column is-2">
                <div v-if="task.completed == '0'" class="has-text-centered">
                    <a href="#" @click="completeTaskItem" class="button is-success">Done!</a>
                    <a href="#" @click="deleteTaskItem" class="button is-danger">Delete</a>
                </div>
                <div class="has-text-centered" v-else>
                    <p class="has-text-grey-light">COMPLETED</p>
                </div>
            </div>
            <div class="column">
                <p v-if="task.completed == '0'">{{ task.name }}</p>
                <p v-else><s> {{ task.name }}</s> <small> (Completed at {{ task.formatted_completed_at }} UTC)</small></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            task: {type: Object, required: true},
        },

        methods: {
            completeTaskItem() {
                axios.post('/tasks/' + this.task.id + '/completed', {completed: true})
                    .then(() => {
                        swal('You rock!', 'Good job! The task was marked as done.', 'success');
                        this.$emit('itemremoved');
                    })
                    .catch(error => {
                        swal('Oops..!', 'Something terrible happened! Call my programmer:\n\n' + error, 'error');
                    });
            },

            deleteTaskItem() {
                swal({
                    title: 'Are you sure?',
                    text: 'Do you really want to delete this task?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yup, delete it!",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                }, () => {
                    setTimeout(() => {
                        axios.delete('/tasks/' + this.task.id)
                            .then(() => {
                                swal('You got it!', 'The task was deleted.', 'success');
                                this.$emit('itemremoved');
                            })
                            .catch(error => {
                                swal('Oops..!', 'Something terrible happened! Call my programmer:\n\n' + error, 'error');
                            })
                    }, 1000);

                });

            }
        },

    }
</script>