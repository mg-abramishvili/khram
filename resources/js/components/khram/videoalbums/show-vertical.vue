<template>
    <div>
        <div class="subheader">
            <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">{{ videoalbumItem.title }}</h1>
        </div>

        <div class="videoalbum-detail" style="position: relative; height: 100vh; background: transparent; margin-top: 4vh;">
            <video :src="videoalbumItem.gallery" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
        </div>

        <div class="subback">
            <router-link :to="{name: 'khram_Home'}">
                <i style="font-style: normal; color: #fff">←</i> Главная
            </router-link>
            <router-link :to="{name: 'khram_Videoalbums'}" class="gal-button" style="margin-left: 1vh;">
                <i style="font-style: normal; color: #fff">←</i> Видеогалерея
            </router-link>
        </div>
        
    </div>
</template>

<script>
    export default {
        name: 'khram_VideoalbumItem',
        data() {
            return {
                videoalbumItem: {},
            }
        },
        created() {
            fetch(`/api/front/videoalbum/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.videoalbumItem = json;
                });
        },
        components: {
        }
    }
</script>