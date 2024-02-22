const { createApp } = Vue
const enpoint = 'http://127.0.0.1:80/boolean/php-todo-list-json/api/'
const app = createApp({
    name: 'TO DO LIST',
    data: () => ({
        tasks: [],
        text: ''
    }),
    methods: {
        addTask() {
            const data = { task: this.text }
            const config = { headers: { 'Content-Type': 'multipart/form-data' } }
            axios.post(enpoint, data, config).then(res => {
                this.tasks = res.data
                this.text = ''
            })
        }
    },
    created() {
        axios.get(enpoint).then(res => {
            this.tasks = res.data
        })
    }
})
app.mount('#root')