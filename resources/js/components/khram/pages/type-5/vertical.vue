<template>
    <div class="type-5">
        <div class="subheader">
            <h1 class="h1-page">{{ page.title }}</h1>
        </div>

        <div class="videoalbum-detail" style="margin-top: 4vh">
            <video :src="page.video" id="videoElement" @playing="played" autoplay controls disablePictureInPicture controlsList="nodownload" style="width: auto; height: auto; max-width: 100%; max-height: 80vh; margin: 0 auto;"></video>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                page: {},
                paused: null
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                });
        },
        mounted() {
            this.$watch(
            "$parent.$parent.reset_video",
            (new_value, old_value) => {
                //console.log(old_value + '->' + new_value)
                if(old_value=== false && new_value === true) {
                    this.resetVideo()
                }
            }
            );
        },
        computed: {
            playing() { return !this.paused; }
        },
        methods: {
            played() {
                this.$parent.$parent.reset_video = false
            },
            resetVideo() {
                if (document.getElementById("videoElement")) {
                    var video = document.getElementById("videoElement")
                    video.load();
                    video.play();
                }
            },
        },
        components: {
        }
    }
</script>