<template>
    <ul>
        <div v-if="loading">
            <br>
            <sync-loader color="#8000d0"></sync-loader>
            <br>
        </div>

        <div v-if="!loading">
            <div v-if="tasks.length == 0" class="has-text-centered">
                <p class="has-text-grey-light is-size-4">You don't have any tasks yet.</p>
                <p class="has-text-grey-light is-size-4">Try adding one! :)</p>
            </div>
            <div v-else>
                <br>
                <li v-for="task in tasksOrdered">
                    <task-item @itemremoved="fetchTasks" :task="task"></task-item>
                </li>
            </div>

        </div>
    </ul>
</template>

<script>
    import SyncLoader from 'vue-spinner/src/SyncLoader.vue';
    import TaskItem from './TaskItem.vue';

    export default {
        props: {

        },

        components: {
            TaskItem, SyncLoader,
        },

        computed: {
            tasksOrdered() {
                return this.tasks.sort((item) => item.completed);
            }
        },

        data() {
            return {
                tasks: [],
                loading: false,
            }
        },

        mounted() {
            this.fetchTasks();
        },

        created() {
            this.$parent.$on('newevent', this.fetchTasks);
        },

        methods: {
            fetchTasks() {
                this.loading = true;
                setTimeout(() => {
                    axios.get('/tasks')
                        .then(response => {
                            this.tasks = response.data;
                        })
                        .catch(error => {
                            console.error("Failed to fetch tasks. " + error);
                        })
                        .then(() => this.loading = false);
                }, 1000)
            },

        },
    }
</script>