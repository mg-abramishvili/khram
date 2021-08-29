<template>
    <div class="wrapper">

        <ActivationPanel v-if="nta === 'y'" />

        <template v-if="settings.theme === 'khram'">
            <KhramLayout />
        </template>

    </div>
</template>

<script>
    import ActivationPanel from './ActivationPanel.vue';
    import KhramLayout from './components/khram/layout';

    export default {
        data() {
            return {
                settings: {},
                nta: '',
            }
        },
        created() {
            require('@/../../public/css/activation.css');

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                    this.nta = json.nta

                    if(this.settings.theme === 'khram') {
                        if(this.$route.name !== 'khram_Home') {
                            this.$router.push({name: 'khram_Home'})
                        }
                    }

                });
        },
        mounted() {
            this._keyListener = function(e) {
                if (e.key === 'q' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault();
                    window.location.href = '/login'
                }
            };
            document.addEventListener('keydown', this._keyListener.bind(this));
        },
        beforeMount() {
            //document.oncontextmenu = new Function("return false;");
        },
        components: {
            ActivationPanel,
            KhramLayout
        }
    }
</script>