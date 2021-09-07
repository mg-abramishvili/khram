<template>
    <div>
        <div class="container" style="position: relative; height: 100vh; background: transparent;">
            
            <div class="subheader">
                <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">Фотогалерея</h1>
            </div>

            <div v-if="photoalbums.length" class="gallery">
                <div class="gallery-list">
                    <hooper :settings="photoalbumsHooper">
                        <slide v-for="photoalbum in photoalbums" :key="photoalbum.id" class="gallery-list-item">
                            <a @click="GoToPhotoalbum(photoalbum.id)">
                                <div v-for="cover in photoalbum.gallery.slice(0, 1)" :key="cover.id" class="gallery-list-item-pic" v-bind:style="{ 'background-image': 'url(' + cover + ')' }"></div>
                                <h2>{{ photoalbum.title }}</h2>
                            </a>
                        </slide>
                    </hooper>

                </div>
            </div>
            <div v-else>
                Фотогалерея пуста
            </div>
        </div>

        <div class="subback">
            <router-link :to="{name: 'khram_Home'}">
                <i style="font-style: normal; color: #fff">←</i> Главная
            </router-link>
        </div>

    </div>
</template>

<script>
    import { Hooper, Slide } from 'hooper';
    import 'hooper/dist/hooper.css';

    export default {
        data() {
            return {
                photoalbums: [],
                photoalbumsHooper: {
                    itemsToShow: 1,
                    centerMode: true,
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/photoalbums`)
                .then(response => response.json())
                .then(json => {
                    this.photoalbums = json;
                    this.loading = false
                    if (json.length > 6) {
                        this.slider_prev_next = true
                    } else {
                        this.slider_prev_next = false
                    }
                });
        },
        methods: {
            GoToPhotoalbum(id) {
                this.$router.push({name: 'khram_PhotoalbumItem', params: {id: id}})
            },
        },
        components: {
            Hooper,
            Slide
        },
    }
</script>