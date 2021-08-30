<template>
    <div class="header">
        <div v-if="$route.name === 'khram_Home'" class="header-logo">
            <router-link :to="{name: 'khram_Home'}">
                <img :src="settings.logo">
                <span v-if="settings.title" v-html="settings.title.replace('*','<br>')"></span>
            </router-link>
        </div>
        <div v-else class="header-logo header-logo-mini">
            <router-link :to="{name: 'khram_Home'}">
                <img :src="settings.logo">
                <span v-if="settings.title" v-html="settings.title.replace('*','<br>')"></span>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                settings: {},
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
        },
        methods: {
            GoToVideoalbums() {
                this.$router.push({name: 'khram_Videoalbums'})
                //this.$refs.MuzeiIndexAllSwiper.$swiper.slideTo(1, false)
            },
        },
        components: {
        }
    }
</script>