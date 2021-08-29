<template>
    <div class="activation_panel">
        <input
        :value="input"
        class="input"
        placeholder="Ключ активации..."
        >

        <button @click="activate()" id="activate_button" class="activate_button">Активировать</button>
        
        <div class="activate_response" v-if="activate_response">{{ activate_response_text }}</div>

        <SimpleKeyboardAct @onChange="onChange" @onKeyPress="onKeyPress" :input="input"/>
    </div>
</template>

<script>
    import SimpleKeyboardAct from './SimpleKeyboardAct';

    export default {
        data() {
            return {
                input: '',
                activate_response: false,
                activate_response_text: '',

                dreambox_theme: '',
                dreambox_orientation: '',
                dreambox_title: '',
                dreambox_module_photoalbums: '',
                dreambox_module_videoalbums: '',
                dreambox_module_news: '',
                dreambox_module_routes: '',
                dreambox_module_reviews: '',
            }
        },
        created() {
        },
        computed: {
        },
        methods: {
            onChange(input) {
                this.input = input;
            },
            onKeyPress(button) {
                //console.log("button", button);
            },
            activate() {
                if(this.input === '') {
                    this.activate_response = true,
                    this.activate_response_text = 'Введите ключ!'
                } else {
                    document.getElementById('activate_button').style.visibility = "hidden";
                    setTimeout(function(){
                        document.getElementById('activate_button').style.visibility = "visible";
                    }, 2000);
                    axios
                        .get(`http://touchlab.su/api/key/view/${this.input}`)
                        .then(response => {
                            this.activate_response = true
                            if(response.data.programs[0].title_code === 'dreambox') {

                                this.dreambox_theme = response.data.parameters[0].dreambox_theme
                                this.dreambox_orientation = response.data.parameters[0].dreambox_orientation
                                this.dreambox_title = response.data.parameters[0].dreambox_title
                                this.dreambox_module_photoalbums = response.data.parameters[0].dreambox_module_photoalbums
                                this.dreambox_module_videoalbums = response.data.parameters[0].dreambox_module_videoalbums
                                this.dreambox_module_news = response.data.parameters[0].dreambox_module_news
                                this.dreambox_module_routes = response.data.parameters[0].dreambox_module_routes
                                this.dreambox_module_reviews = response.data.parameters[0].dreambox_module_reviews

                                if(response.data.status === 'waiting') {
                                    axios
                                    .post(`http://touchlab.su/api/key/activate/${this.input}`, {status: 'active'} )
                                    .then(response => {
                                        this.activate_response = true
                                        this.activate_response_text = 'Активация прошла успешно'
                                        this.$parent.activated = 'n'
                                        axios
                                            .post(`/api/front/settings`, {
                                                id: 1,
                                                nta: 'n',
                                                theme: this.dreambox_theme,
                                                orientation: this.dreambox_orientation,
                                                title: this.dreambox_title,
                                                module_photoalbums: this.dreambox_module_photoalbums,
                                                module_videoalbums: this.dreambox_module_videoalbums,
                                                module_news: this.dreambox_module_news,
                                                module_routes: this.dreambox_module_routes,
                                                module_reviews: this.dreambox_module_reviews,
                                            })
                                            .then(response => {
                                                window.location.reload();
                                            })
                                            .catch(err => {
                                                this.activate_response = true
                                                this.activate_response_text = 'Ошибка активации' + err
                                            })
                                    })
                                    .catch(err => {
                                        this.activate_response = true
                                        this.activate_response_text = 'Ошибка активации' + err
                                    })
                                } else {
                                    this.activate_response_text = 'Ключ уже был активирован'
                                }
                            } else {
                                this.activate_response_text = 'Ключ от другого типа ПО'
                            }
                        })
                        .catch(err => {
                             this.activate_response = true
                            this.activate_response_text = 'Неверный ключ'
                        })
                }
            }
        },
        components: {
            SimpleKeyboardAct
        }
    }
</script>
<style scoped>
</style>