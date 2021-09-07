<template>
    <div>
        <div class="container container-index" style="position: relative; height: 100vh; background: transparent;">
            <div class="subheader">
            <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">Новости</h1>
        </div>
            <div v-if="news.length" class="news-list sortable">
                <hooper :settings="newsHooper">
                    <slide v-for="newsItem in news" :key="newsItem.id">
                        <a @click="GoToNewsItem(newsItem.id)" class="index-button index-button-full">

                                <div v-if="newsItem.image" class="user-pages-item-image" v-bind:style="{ 'background-image': 'url(' + newsItem.image + ')' }"></div>
                                <span v-if="newsItem.image" class="t6-p">
                                    <small style="font-size: 1vw; color: #fff; display:block; margin-bottom: 1vh; margin-top: 1vh">{{ newsItem.created_at | moment }}</small>
                                    {{ newsItem.title }}
                                </span>
                                
                                <div v-if="!newsItem.image" class="index-button-icon">
                                    <img src="/img/icons/002-newspaper.svg">
                                </div>
                                <span v-if="!newsItem.image">
                                    <small style="font-size: 1vw; color: #fff; display:block; margin-bottom: 1vh; margin-top: 1vh">{{ newsItem.created_at | moment }}</small>
                                    {{ newsItem.title }}
                                </span>

                        </a>
                    </slide>
                </hooper>

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
                news: [],
                moment: moment,
                newsHooper: {
                    itemsToShow: 1,
                    centerMode: true,
                },
                slider_prev_next: false,
            }
        },
        created() {
            fetch(`/api/front/newsAll`)
                .then(response => response.json())
                .then(json => {
                    this.news = json;
                    if (json.length > 3) {
                        this.slider_prev_next = true
                    } else {
                        this.slider_prev_next = false
                    }
                });
        },
        methods: {
            GoToNewsItem(id) {
                this.$router.push({name: 'khram_NewsItem', params: {id: id}})
            },
        },
        filters: {
            moment: function (date) {
                return moment(date).format('DD.MM.YYYY');
            }
        },
        components: {
            Hooper,
            Slide
        },
    }
</script>
