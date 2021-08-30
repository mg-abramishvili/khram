<template>
    <div>
        <div v-show="$route.name === 'khram_Home'" style="background: url(/img/khram/bg.png) 50% 50% / cover; height: 100vh;"></div>
        <div v-show="$route.name !== 'khram_Home'" style="background: url(/img/khram/bgp.png) 50% 50% / cover; height: 100vh;"></div>
        
        <div class="container" style="margin-top: -100vh;">
            <HeaderVertical/>
            <div class="row">
                <keep-alive :exclude="/khram_VideoalbumItem/">
                    <router-view :key="$route.path"></router-view>         
                </keep-alive>
            </div>
        </div>

    </div>

</template>

<script>
    import HeaderVertical from './partials/header-vertical.vue'

    export default {
        data() {
            return {
                settings: {},
                reset_routes: true,
                reset_video: true,
            }
        },
        created() {
            require('@/../../public/css/bootstrap.min.css');
            require('@/../../public/css/style-khram-vertical.css');

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json
                });
        },
        components: {
            HeaderVertical
        },
    }
</script>