<template>
    <div>
        <div class="container" style="position: relative; height: 100vh; background: transparent;">
            <div class="subheader">
            <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">{{ newsItem.title }}</h1>
        </div>
            <div class="news-item">
                <div class="row">
                    <div v-if="newsItem.image" class="col-5">
                        <div class="news-item-img" v-bind:style="{ 'background-image': 'url(' + newsItem.image + ')' }"></div>
                    </div>

                    <div v-if="newsItem.image" class="col-7">
                        <div class="news-item-text"  style="height: 88vh; padding: 4vh">
                            <span>{{moment(newsItem.created_at).format('D MMMM YYYY')}}</span>
                            <div v-html="newsItem.text"></div>
                        </div>
                    </div>
                    <div v-else class="col-12">
                        <div class="news-item-text" style="height: 88vh; padding: 4vh">
                            <span>{{moment(newsItem.created_at).format('D MMMM YYYY')}}</span>
                            <div v-html="newsItem.text"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="subback">
            <router-link :to="{name: 'khram_Home'}">
                <i style="font-style: normal; color: #fff">←</i> Главная
            </router-link>
            <router-link :to="{name: 'khram_News'}" class="gal-button" style="margin-left: 1vh;">
                <i style="font-style: normal; color: #fff">←</i> Новости
            </router-link>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                newsItem: {},
                moment: moment
            }
        },
        created() {
            fetch(`/api/front/newsitem/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.newsItem = json;
                });
        },
        components: {
        }
    }
</script>