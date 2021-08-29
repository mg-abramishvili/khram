<template>
    <div class="type-5">
        <div class="subheader">
                    <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">{{ page.title }}</h1>
                </div>
        <div class="videoalbum-detail" style="margin-top: 4vh">
            <video :src="page.video" id="videoElement" @playing="played" autoplay controls disablePictureInPicture controlsList="nodownload"></video>
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